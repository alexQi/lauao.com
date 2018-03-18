<?php
namespace frontend\modules\movie\controllers;

use common\models\Pay\ApiService;
use common\models\Orders;
use common\models\Pay\Wechat;
use common\models\ActivityBase;
use common\models\VideoCategory;
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
        $cateList = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
	    return $this->render('index',[
            'cateList' => $cateList
        ]);
    }

    public function actionDiscover()
    {
        $isNew = Yii::$app->request->get('isNew') ? 1 : 0;
        $video_cate_id = Yii::$app->request->get('video_cate_id') ? Yii::$app->request->get('video_cate_id') :false;
        $cateList  = VideoCategory::find()->select(['id','cate_name'])->asArray()->all();
        $videoList = VideoService::getVideoList();

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
}
