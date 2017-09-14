<?php
namespace frontend\modules\site\controllers;


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
        return $this->render('index',[
            'advertList' => $advertList,
            'activityInfo' => $activityInfo,
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
