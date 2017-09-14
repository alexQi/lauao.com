<?php
namespace backend\modules\site\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use common\models\LoginForm;

/**
 * Site controller
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','flush-cache'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Yii::$app->db->createCommand('show processlist');
        $mysqlStatus = $query->queryAll();

        $mysqlInfo = new ArrayDataProvider(
            [
                'allModels'  => $mysqlStatus,
                'sort'       => [
                    'attributes' => ['Id', 'User', 'Time', 'State', 'State'],
                ],
                'pagination' => ['pageSize' => 5],
            ]
        );
        $mysqlInfoPage = new Pagination(["totalCount" => count($mysqlStatus),"defaultPageSize" => 5]);

        $queue = yii::$app->beanstalk;
        $tubes = $queue->listTubes() ? $queue->listTubes() : array();
        $list  = [];
        foreach ($tubes as $key=>$val)
        {
            $list[] = $queue->statsTube($val);
        }

        $dataProvider = new ArrayDataProvider(
            [
                'allModels'  => $list,
                'sort'       => [
                    'attributes' => ['name', 'total-jobs', 'current-jobs-buried', 'current-jobs-delayed'],
                ],
                'pagination' => ['pageSize' => 15],
            ]
        );

        return $this->render('index',[
            'mysqlInfo'    => $mysqlInfo,
            'mysqlInfoPage' => $mysqlInfoPage,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionFlushCache(){
        Yii::$app->cache->flush();
        return $this->goHome();
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        if (Yii::$app->user->logout())
        {
            return $this->redirect(Url::to(['login']));
        }

    }
}
