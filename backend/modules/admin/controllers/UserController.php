<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\modules\admin\models\form\Login;
use backend\modules\admin\models\form\PasswordResetRequest;
use backend\modules\admin\models\form\ResetPassword;
use backend\modules\admin\models\form\Signup;
use backend\modules\admin\models\form\ChangePassword;
use backend\modules\admin\models\Assignment;
use backend\modules\admin\models\AuthAssignment;
use backend\modules\admin\models\User;
use common\models\UserExtend;
use backend\modules\admin\models\searchs\User as UserSearch;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\base\UserException;
use yii\mail\BaseMailer;
use yii\helpers\Url;


/**
 * User controller
 */
class UserController extends Controller {
    private $_oldMailPath;

    public $userClassName;
    public $idField       = 'id';
    public $usernameField = 'username';
    public $fullnameField;
    public $searchClass;
    public $extraColumns  = [];

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete'   => ['post'],
                    'logout'   => ['post'],
                    'activate' => ['post'],

                    'assign' => ['post'],
                    'revoke' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        if ($this->userClassName === null) {
            //            $this->userClassName = Yii::$app->getUser()->identityClass;
            $this->userClassName = $this->userClassName ? : 'backend\modules\admin\models\User';
        }
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            if (Yii::$app->has('mailer') && ($mailer = Yii::$app->getMailer()) instanceof BaseMailer) {
                /* @var $mailer BaseMailer */
                $this->_oldMailPath = $mailer->getViewPath();
                $mailer->setViewPath('@backend/modules/admin/mail');
            }
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function afterAction($action, $result) {
        if ($this->_oldMailPath !== null) {
            Yii::$app->getMailer()->setViewPath($this->_oldMailPath);
        }
        return parent::afterAction($action, $result);
    }

    /**
     * Lists all User models.
     *
     * @return mixed
     */
    public function actionIndex() {
        $searchModel  = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing ApiBase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model       = $this->findModel($id);
        $extendModel = $this->findExtendModel($id);
        $oldPassword = $model->password_hash;
        if ($model->load(Yii::$app->request->post()) && $extendModel->load(Yii::$app->request->post())) {

            if ($model->password_hash != '') {
                $model->setPassword($model->password_hash);
                $model->generateAuthKey();
            } else {
                $model->password_hash = $oldPassword;
            }

            if ($model->save() && $extendModel->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->password_hash = '';
            return $this->render('update', [
                'model'       => $model,
                'extendModel' => $extendModel
            ]);
        }
    }

    /**
     * Displays a single User model.
     *
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {

        $assModel = $this->findAssModel($id);
        return $this->render('view', [
            'model'         => $this->findModel($id),
            'assModel'      => $assModel,
            'idField'       => $this->idField,
            'usernameField' => $this->usernameField,
            'fullnameField' => $this->fullnameField,
        ]);
    }

    /**
     * Assign items
     *
     * @param string $id
     * @return array
     */
    public function actionAssign($id) {
        $items                           = Yii::$app->getRequest()->post('items', []);
        $model                           = new Assignment($id);
        $success                         = $model->assign($items);
        Yii::$app->getResponse()->format = 'json';
        return array_merge($model->getItems(), ['success' => $success]);
    }

    /**
     * Assign items
     *
     * @param string $id
     * @return array
     */
    public function actionRevoke($id) {
        $items                           = Yii::$app->getRequest()->post('items', []);
        $model                           = new Assignment($id);
        $success                         = $model->revoke($items);
        Yii::$app->getResponse()->format = 'json';
        return array_merge($model->getItems(), ['success' => $success]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($id != 1) {
            //清除用户基础信息
            $userExtend = UserExtend::find()->where(['user_id' => $id])->one();
            if ($userExtend) {
                $userExtend->delete();
            }
            //清除用户权限授权记录
            AuthAssignment::deleteAll(['user_id' => $id]);
            $this->findModel($id)->delete();
        }


        return $this->redirect(['index']);
    }

    /**
     * Login
     *
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->getUser()->logout();

        return $this->goHome();
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionSignup() {
        $model       = new Signup();
        $extendModel = &$model;
        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($model->signup()) {
                return $this->redirect(['index']);
            }
        }
        $model->status       = 10;
        $extendModel->gender = 1;
        return $this->render('signup', [
            'model'       => $model,
            'extendModel' => $extendModel
        ]);
    }

    /**
     * Request reset password
     *
     * @return string
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequest();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Reset password
     *
     * @return string
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPassword($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Reset password
     *
     * @return string
     */
    public function actionChangePassword() {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goBack();
        }

        return $this->renderAjax('change-password', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws UserException
     */
    public function actionActivate($id) {
        /* @var $user User */
        $user = $this->findModel($id);
        if ($user->status == User::STATUS_INACTIVE) {
            $user->status = User::STATUS_ACTIVE;
        } else {
            if ($id == 1) {
                return $this->redirect(['index']);
            }
            $user->status = User::STATUS_INACTIVE;
        }
        if (!$user->save()) {
            $errors = $user->firstErrors;
            throw new UserException(reset($errors));
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     * @throws NotFoundHttpException
     */
    protected function findExtendModel($id) {
        if (($model = UserExtend::find()->where(['user_id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Assignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param  integer $id
     * @return Assignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findAssModel($id) {
        /* @var $class User */
        $class = $this->userClassName;
        if (($user = $class::findIdentity($id)) !== null) {
            return new Assignment($id, $user);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
