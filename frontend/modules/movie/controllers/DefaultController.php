<?php
namespace frontend\modules\movie\controllers;

use common\models\Pay\ApiService;
use common\models\Orders;
use common\models\Pay\Wechat;
use common\models\ActivityBase;
use common\models\VideoCategory;
use common\models\VideoMember;
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
            return $this->redirect(['index']);
        }else{
            $memberList = VideoMember::find()->orderBy(['sort'=>SORT_ASC])->asArray()->all();
            $cateList = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
            return $this->render('mobile/about',[
                'memberList' => $memberList,
                'cateList' => $cateList,

            ]);
        }
    }

    /*
     * 注册页面
     *
     * */
    public function actionSignup(){

        return $this->render('signup');


    }


}
