<?php

namespace backend\modules\message\controllers;

use Yii;
use app\models\MessageGroupSearch;
use app\models\UserSearch;
use common\models\MessageGroup;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageGroupController implements the CRUD actions for MessageGroup model.
 */
class MessageGroupController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MessageGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageGroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MessageGroup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MessageGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $mailList = UserSearch::getUserMail();

        //缓存用户数据
        $cache = Yii::$app->cache;
        $cache->set('mailList_'.yii::$app->user->identity->id, $mailList, 60*60);

        $model = new MessageGroup();

        return $this->render('create', [
            'model' => $model,
            'mailList' => $mailList
        ]);

    }

    /**
     * Updates an existing MessageGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->members = json_decode($model->members);

        $result    = UserSearch::getUserMail();
        $avaliable = array_flip($result['avaliable']);

        foreach($model->members as $member)
        {
            if (isset($avaliable[$member]))
            {
                unset($avaliable[$member]);
            }
        }

        $mailList['avaliable'] = array_flip($avaliable);
        $mailList['assigned']  = $model->members;

        //缓存用户数据
        $cache = Yii::$app->cache;
        $cache->set('mailList_'.yii::$app->user->identity->id, $mailList, 60*60);

        return $this->render('update', [
            'model' => $model,
            'mailList' => $mailList
        ]);
    }

    /**
     * Deletes an existing MessageGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MessageGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MessageGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MessageGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
