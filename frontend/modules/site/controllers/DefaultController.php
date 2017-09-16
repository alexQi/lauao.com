<?php
namespace frontend\modules\site\controllers;


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
        var_dump(yii::$app->request->get('code'));die();
        return $this->render('index',[
            'advertList' => $advertList,
            'activityInfo' => $activityInfo,
            'serverTime' => $serverTime,
            'activity' => $activity
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
