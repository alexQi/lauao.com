<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-7-11
 * Time: 下午2:46
 */
namespace restful\controllers;

use yii\web\Response;
use yii\rest\Controller;
//use yii\filters\auth\CompositeAuth;
//use yii\filters\auth\HttpBasicAuth;
//use yii\filters\auth\HttpBearerAuth;
//use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;

class BaseController extends Controller
{
//    public $serializer = [
//        'class' => 'yii\rest\Serializer',
//        'collectionEnvelope' => 'items',
//    ];

    public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,

            ],
        ];
        //需要在研究一哈
//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                HttpBasicAuth::className(),
//                HttpBearerAuth::className(),
//                QueryParamAuth::className(),
//            ],
//        ];
        return $behaviors;
    }
}
