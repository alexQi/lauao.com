<?php
namespace frontend\modules\site\controllers;

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
        $addressStr = $wechat->addressParameters();

        return $this->render('crab',[
            'jsApiConfig' => $jsApiConfig,
            'addressStr' => $addressStr
        ]);
    }

    public function actionToPay()
    {
//        $this->is_wechat =true;
        //用户登录检查
        if(empty(Yii::$app->user->identity->mem_id) ){
            //设置回跳页
            \yii\helpers\Url::remember();
            $this->redirect('/front/login')->send();
            exit;
        }
        $orderId = yii::$app->request->get('oid');
        $useFund = yii::$app->request->get('useFund')?yii::$app->request->get('useFund'):0;
        $rerfer  = yii::$app->request->get('rerfer')?yii::$app->request->get('rerfer'):0;

        if (empty($orderId)) {
            throw new ForbiddenHttpException("未能获取订单数据");
        }
        $orderInfo = MembersBuyersOrders::findOne($orderId);

        if (empty($orderInfo))
            throw new ForbiddenHttpException("未能获取订单数据");
        if ($orderInfo['state'] != 7)
            throw new ForbiddenHttpException("订单状态不正确");

        $fundInfo  = MemberFund::find()->where(['member_id'=>Yii::$app->user->identity->mem_id])->one();

        $this->title = '选择支付方式';
        $jsApiParameters = [];
        $this->view = 'mobile/';
        if (yii::$app->request->get('type')==1) {
            $PaymentRecord = PaymentRecord::find()->where(['oid'=>$orderInfo->id])->one();
            if ($PaymentRecord){
                $api = new ApiService();
                $orderInfo->paidPrice = $PaymentRecord->price;
                if ($jsApiParameters = $api->wxpayCreateOrder($orderInfo)){
                    return $this->render($this->view .'do-wechat',['payConfig'=>$jsApiParameters]);
                }else{
                    throw new ForbiddenHttpException('生成微信订单失败');
                }
            }else{
                throw new ForbiddenHttpException('未查找到缴费记录');
            }
        }

        $this->jump_decide = 'topay';
        return $this->render($this->view . 'topay', [
            'orderInfo' => $orderInfo,
            'jsApiParameters' => $jsApiParameters,
            'useFund' => $useFund,
            'fundInfo'=> $fundInfo,
            'rerfer'  => $rerfer
        ]);
    }

}
