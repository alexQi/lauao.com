<?php


namespace console\controllers;

use yii\console\Controller;
use common\models\service\ApplyRecordService;

class WorkerController extends Controller
{
    public function actionIndex()
    {
        $applyUserList = ApplyRecordService::getAllApplyUserList();
    }
}