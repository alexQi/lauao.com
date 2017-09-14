<?php


namespace console\controllers;

use common\components\BeanstalkController;
use yii\helpers\Console;

class WorkerController extends BeanstalkController
{
    // Those are the default values you can override

    const DELAY_PRIORITY = "1000"; //Default priority
    const DELAY_TIME = 5; //Default delay time

    // Used for Decaying. When DELAY_MAX reached job is deleted or delayed with
    const DELAY_MAX = 3;

    public function listenTubes(){
        return ["oliuSaveData"];
    }

    public function actionOliuSaveData($job){
        $sentData = $job->getData();
        try{
            exec($sentData,$info);
            foreach ($info as $row){
                fwrite(STDOUT, Console::ansiFormat("- $row"."\n", [Console::FG_GREEN]));
            }
//            return self::RELEASE;
            return self::DELETE;
        }
        catch(\Exception $e)
        {
            fwrite(STDERR, Console::ansiFormat($e."\n", [Console::FG_RED]));
            return self::BURY;
        }
    }
}