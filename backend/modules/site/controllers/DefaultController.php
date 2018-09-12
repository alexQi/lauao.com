<?php

namespace backend\modules\site\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use backend\models\LoginForm;

/**
 * Site controller
 */
class DefaultController extends Controller {
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow'   => true,
                    ],
                    [
                        'actions' => ['logout', 'index','git-log-detail', 'flush-cache'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
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
    public function actionIndex() {
        $query       = Yii::$app->db->createCommand('show processlist');
        $mysqlStatus = $query->queryAll();

        $mysqlInfo     = new ArrayDataProvider(
            [
                'allModels'  => $mysqlStatus,
                'sort'       => [
                    'attributes' => ['Id', 'User', 'Time', 'State', 'State'],
                ],
                'pagination' => ['pageSize' => 5],
            ]
        );
        $mysqlInfoPage = new Pagination(["totalCount" => count($mysqlStatus), "defaultPageSize" => 5]);

        $queue = yii::$app->beanstalk;
        $tubes = $queue->listTubes() ? $queue->listTubes() : array();
        $list  = [];
        foreach ($tubes as $key => $val) {
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

        exec('git log --pretty=format:"%h@@@%an@@@%ar@@@%s@@@%ad" --date=short -5', $gitLog);
        $gitLogList = [];
        foreach ($gitLog as $val) {
            $row        = explode('@@@', $val);
            $gitLogList[$row[4]][] = [
                'hash'   => $row[0],
                'author' => $row[1],
                'time'   => $row[2],
                'desc'   => $row[3],
                'date'   => $row[4]
            ];
        }
        $bgColor = [
            'bg-light-blue',
            'bg-aqua',
            'bg-green',
            'bg-yellow',
            'bg-red',
            'bg-navy',
            'bg-teal',
            'bg-purple',
            'bg-orange',
            'bg-maroon'
        ];
        return $this->render('index', [
            'mysqlInfo'     => $mysqlInfo,
            'mysqlInfoPage' => $mysqlInfoPage,
            'dataProvider'  => $dataProvider,
            'gitLogList'    => $gitLogList,
            'bgColor'       => $bgColor
        ]);
    }

    /**
     * @param $hashCode
     * @return string
     */
    public function actionGitLogDetail($hashCode){
        exec('git show --name-only '.$hashCode, $gitLogDetail);
        $info = '';
        foreach($gitLogDetail as $row){
            $info .= $row."\r\n";
        }
        return $this->renderAjax('git-log-detail',[
            "info"=>$info
        ]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionFlushCache() {
        Yii::$app->cache->flush();
        return $this->goHome();
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {

            $platform = Yii::$app->request->get('platform');

            $session = Yii::$app->session;
            $session->open();
            $session->remove('platform');
            if($platform=="CM")
            {
                $session->set('platform','CM');
            }
            $session->close();
            return $this->render('login', [
                'model' => $model,
                'platform'=>$platform
            ]);
        }
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout() {
        //don't clear session
        if (Yii::$app->user->logout(false)) {

            $session = Yii::$app->session;
            $session->open();
            $platform=$session->get("platform");
            Yii::$app->getSession()->destroy();//释放
            if($platform=="CM")
            {
                return $this->redirect(Url::to(['login','platform'=>'CM']));
            }
            else
            {
               return $this->redirect(Url::to(['login']));
            }

        }

    }
}
