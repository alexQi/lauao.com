<?php
namespace frontend\modules\site\controllers;

use common\models\Pay\ApiService;
use common\models\Orders;
use common\models\Pay\Wechat;
use common\models\ActivityBase;
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
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $advertList   = ApplyUserService::getAdvertList();
        $activity     = ActivityBase::find()->where(['status'=>2])->asArray()->one();
        $activityInfo = ApplyUserService::getActivityInfo($activity);
        $serverTime   = time();

	    return $this->render('index',[
            'advertList' => $advertList,
            'activityInfo' => $activityInfo,
            'serverTime' => $serverTime,
            'activity' => $activity,
        ]);
    }

    public function actionJoin()
    {
        return $this->render('join');
    }

    public function actionAbout()
    {
        $advertList   = ApplyUserService::getAdvertList(2);
        $activity     = ActivityBase::find()->where(['status'=>2])->asArray()->one();
        return $this->render('about',[
            'advertList' => $advertList,
            'activity' => $activity
        ]);
    }

    //螃蟹购买页面
    public function actionCrab()
    {
        $wechat = new Wechat([
            'appId'=>yii::$app->params['c_wechat_appid'],
            'appSecret'=>yii::$app->params['c_wechat_secret'],
            'token'=>yii::$app->params['c_wechat_token'],
        ]);
        $jsApiConfig = $wechat->jsApiConfig();

        return $this->render('crab',[
            'jsApiConfig' => $jsApiConfig,
        ]);
    }

    public function actionToPay()
    {
        $id = yii::$app->request->get('id');

        if (empty($id)) {
            throw new ForbiddenHttpException("未能获取订单数据");
        }
        $orderInfo = Orders::findOne($id);

        if (empty($orderInfo))
        {
            throw new ForbiddenHttpException("未能获取订单数据");
        }

        if ($orderInfo['status'] != 1)
        {
            throw new ForbiddenHttpException("订单状态不正确");
        }

        $api = new ApiService();
        if ($jsApiParameters = $api->wxpayCreateOrder($orderInfo)){
            return $this->render('do-wechat',['payConfig'=>$jsApiParameters]);
        }else{
            throw new ForbiddenHttpException('生成微信订单失败');
        }
    }

    /**
     * 支付回调通知
     * @param string $type   支付方式
     * @param string $plat   设备类型
     * @param string $flag   支付类型  付款|充值
     */
    public function actionNotify(){
        $api    = new ApiService();

        $wechat = \Yii::$app->wechat;
        $notify_data = $wechat->notifyData();
        if (!$notify_data) {
            die($wechat->notifyMsg(false));
        }

        $api->wxpayNotify($notify_data);
        die($wechat->notifyMsg(true));
    }
}
