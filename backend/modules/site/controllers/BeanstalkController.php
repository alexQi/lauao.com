<?php

namespace backend\modules\site\controllers;

use yii;
use common\components\yii2beanstalk\Beanstalk;
use yii\web\Controller;
use yii\helpers\Url;

class BeanstalkController extends Controller
{
    /**
     * @var $queue Beanstalk
     */
    private $queue;

    public function actions()
    {
        $this->queue = Yii::$app->beanstalk;
    }

    public function actionChannel($name)
    {

        $this->queue->useTube($name);
        $tube = $this->queue->statsTube($name);
        $lastBuried=$lastReady=$lastDelayed = [];
        $items = [];
        if((int)$tube["current-jobs-buried"]>0)
        {
            $lastBuried = $this->queue->peekBuried();
            for($i=0;$i<(int)$tube["current-jobs-buried"];$i++){
                $count = $i+1;
                $items[] = [
                    'label'=>'KICK JOB ('.$count.')',
                    'url'=>'javascript:void(0);',
                    'options'=>[
                        'class'=>'btn_kick',
                        'data-url' => Url::to(['kick','name'=>$name,'count'=>$count])
                    ],
                ];
                if($count>10){
                    break;
                }
            }
        }
        if((int)$tube["current-jobs-delayed"]>0)
        {
            $lastDelayed = $this->queue->peekDeplayed();
        }
        if((int)$tube["current-jobs-ready"]>0)
        {
            $lastReady = $this->queue->peekReady();
        }
        return $this->renderAjax('channel',[
            "queue"=>$tube,
            "lastBuried"=>$lastBuried,
            "lastDelayed"=>$lastDelayed,
            "lastReady"=>$lastReady,
            "items" => $items,
//            "job"=>$queue->peekBuried()
        ]);
    }

    /**
     * kick
     * @param $name
     * @param $count
     */
    public function actionKick($name,$count){
        $this->queue->useTube($name);
        $res = $this->queue->kick($count);
        exit(json_encode($res));
    }

    /**
     * delete Job
     * @param $name
     */
    public function actionDelJob($name){
        $this->queue->useTube($name);
        $task = $this->queue->peekBuried();
        $res = false;
        if($task){
            $res = $this->queue->delete($task);
        }
        exit(json_encode($res));
    }

    /**
     * delete Job
     * @param $name
     */
    public function actionDelBuried($name){
        $res = false;
        while(true)
        {
            $task = $this->queue->peekBuried($name);
            if($task) {
                $res = $this->queue->delete($task);
            }else{
                break;
            }
        }
        exit(json_encode($res));
    }

    /**
     * pause
     * @param $name
     */
    public function actionPause($name){
        $res = $this->queue->pause($name,300);
        exit(json_encode($res));
    }

    /**
     * resume
     * @param $name
     */
    public function actionResume($name){
        $res = $this->queue->resume($name);
        exit(json_encode($res));
    }
}