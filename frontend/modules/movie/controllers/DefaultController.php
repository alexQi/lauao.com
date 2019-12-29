<?php
namespace frontend\modules\movie\controllers;

use common\models\Pay\ApiService;
use common\models\Orders;
use common\models\Pay\Wechat;
use common\models\ActivityBase;
use common\models\VideoCategory;
use common\models\VideoMember;
use frontend\models\WechatJSSKD;
use frontend\models\VideoService;
use Yii;
use frontend\controllers\BaseController;
use frontend\models\ApplyUserService;
use yii\web\ForbiddenHttpException;

/**
 * Site controller
 */
class DefaultController extends BaseController
{
    public $layout = false;
    public $enableCsrfValidation = false;
    /**
     * Displays homepage.
     *
     * @return mixed
     */

    /**
     * Notes:新首頁
     * User: 44844
     * Date: 2019/10/12
     * Time: 22:38
     * @return string
     * @throws
     */
    public function actionIndexs()
    {
        return $this->render('indexs');
    }



    public function actionIndex()
    {
        if ($this->isMobile){
            $viewName = 'mobile/index';
            $cateList = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
            $videoList = VideoService::getVideoList(999999);
            return $this->render($viewName,[
                'videoList' => $videoList,
                'cateList' => $cateList,
            ]);
        }else{
            $cateList = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
            $videoList = VideoService::getVideoList(9);//Po add
            $memberList = VideoMember::find()->asArray()->all();
            $viewName = "index";
            return $this->render($viewName,[
                'cateList' => $cateList,
                'memberList' => $memberList,
                'videoList' => $videoList
            ]);
        }

    }

    public function actionDiscover()
    {
        $isNew = Yii::$app->request->get('isNew') ? 1 : 0;
        $video_cate_id = Yii::$app->request->get('video_cate_id') ? Yii::$app->request->get('video_cate_id') :false;
        $cateList  = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
        $videoList = VideoService::getVideoList(12);

        return $this->render('discover',[
            'cateList'  => $cateList,
            'videoList' => $videoList,
            'isNew'     => $isNew,
            'video_cate_id'  => $video_cate_id
        ]);
    }

    public function actionDetail()
    {
        if (!yii::$app->request->get('video_id')){
            return $this->redirect('default/discover');
        }
        $videoDetail = VideoService::getVideoInfo(yii::$app->request->get('video_id'));
        if (!$videoDetail){
            return $this->redirect('default/discover');
        }
        $cateList  = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
        return $this->render('detail',[
            'cateList'  => $cateList,
            'videoDetail' => $videoDetail
        ]);
    }

    public function actionAbout(){
        if (!$this->isMobile){
            $isNew = Yii::$app->request->get('isNew') ? 1 : 0;
            $video_cate_id = Yii::$app->request->get('video_cate_id') ? Yii::$app->request->get('video_cate_id') :false;
            $cateList  = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
            $videoList = VideoService::getVideoList(12);

            return $this->render('about',[
                'cateList'  => $cateList,
                'videoList' => $videoList,
                'isNew'     => $isNew,
                'video_cate_id'  => $video_cate_id
            ]);



        }else{
            $memberList = VideoMember::find()->orderBy(['sort'=>SORT_ASC])->asArray()->all();
            $cateList = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
            return $this->render('mobile/about',[
                'memberList' => $memberList,
                'cateList' => $cateList,

            ]);
        }
    }

    public function actionNewabout()
    {
        $appid ='wxcb2711060169adca' ;
        $secret ='d8ebc47e79dffcaf97280b24e60ba66f';
        $jssdk = new WechatJSSKD($appid, $secret);
        $signPackage = $jssdk->GetSignPackage();

        //echo '<pre>';
        //print_r($signPackage);
        //if ($this->isMobile) {
            //var_dump()
            //var_dump($wechat->getAccessToken());
            return $this->render('mobile/newabout',['data'=>$signPackage]

            );
        //}

    }


    public function actionGreenwoodabout()
    {
        $appid ='wxcb2711060169adca' ;
        $secret ='d8ebc47e79dffcaf97280b24e60ba66f';
        $jssdk = new WechatJSSKD($appid, $secret);
        $signPackage = $jssdk->GetSignPackage();

        return $this->render('mobile/greenwoodabout',['data'=>$signPackage]

        );
        //}

    }

    /*
     * 注册页面
     *
     * */
    public function actionSignup(){

        return $this->render('signup');


    }


    /*
    * 注册页面
    *
    * */
    public function actionRental(){

        $isNew = Yii::$app->request->get('isNew') ? 1 : 0;
        $video_cate_id = Yii::$app->request->get('video_cate_id') ? Yii::$app->request->get('video_cate_id') :false;
        $cateList  = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
        $videoList = VideoService::getVideoList(12);

        return $this->render('rental',[
            'cateList'  => $cateList,
            'videoList' => $videoList,
            'isNew'     => $isNew,
            'video_cate_id'  => $video_cate_id
        ]);



    }


    public function actionHapyear()
    {
        //return parent::actions(); // TODO: Change the autogenerated stub

        return $this->render('mobile/hapyear');
    }






}
