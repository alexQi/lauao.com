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
}
