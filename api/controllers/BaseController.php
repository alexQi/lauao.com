<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017/9/13
 * Time: 上午9:30
 */
namespace api\controllers;

use yii;
use yii\web\Response;
use yii\rest\Controller;
use yii\filters\ContentNegotiator;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;

class BaseController extends Controller
{
    public $queryParams = [];
    public $response    = ['state'=>0];

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,

            ],
        ];
//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                QueryParamAuth::className(),
//            ],
//        ];
        return $behaviors;
    }

    public function init()
    {
        header("Content-type: text/html; charset=utf-8");
        parent::init();
        $this->queryParams = yii::$app->request->queryParams;
    }
}