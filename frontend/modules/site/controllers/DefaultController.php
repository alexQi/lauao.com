<?php
namespace frontend\modules\site\controllers;


use common\components\Common;
use common\models\ActivityBase;
use Yii;
use frontend\controllers\BaseController;
use frontend\models\ApplyUserService;

/**
 * Site controller
 */
class DefaultController extends BaseController
{
    public $layout = false;
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $advertList   = ApplyUserService::getAdvertList();
        $activityInfo = ApplyUserService::getActivityInfo();
        $serverTime   = time();
        $activity     = ActivityBase::find()->where(['status'=>2])->asArray()->one();

        $getWechatTokenUrl = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.yii::$app->params['wechat_appid'].'&secret='.yii::$app->params['wechat_secret'].'&code='.yii::$app->request->get('code').'&grant_type=authorization_code';
        $wechatToken = Common::httpRequest($getWechatTokenUrl);
        $wechatToken = json_decode($wechatToken,true);

        var_dump($wechatToken);die();
        return $this->render('index',[
            'advertList' => $advertList,
            'activityInfo' => $activityInfo,
            'serverTime' => $serverTime,
            'activity' => $activity,
            'wechatToken' => $wechatToken
        ]);
    }

    public function actionJoin()
    {
        return $this->render('join');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
