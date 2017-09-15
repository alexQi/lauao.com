<?php

namespace backend\components;

use Yii;
use yii\helpers\Url;

class AdminLog
{
    public static function write($event)
    {
        if ($event->name=='afterUpdate'){
            // 具体要记录什么东西，自己来优化$description
            if(!empty($event->changedAttributes)) {
                $desc = '';
                foreach($event->changedAttributes as $name => $value) {
                    if ($value==$event->sender->getAttribute($name)){
                        continue;
                    }
                    $desc .= $name . ' 为 ' . $event->sender->getAttribute($name) . '  [ 原始数据: ' . $value . ' ],';
                }
                $desc = substr($desc, 0, -1);
                $pk = $event->sender->primaryKey()[0];
                $description = Yii::$app->user->identity->username . '修改了 ' . $pk.'='.$event->sender->getAttribute($pk). ' 的 ' . $desc;
            }
            $operationType = 'update';
        }elseif($event->name=='afterDelete'){
            $pk = $event->sender->primaryKey()[0];
            $description = Yii::$app->user->identity->username . '删除了 ' . $pk.'='.$event->sender->getAttribute($pk). ' 的记录';
            $operationType = 'delete';
        }elseif ($event->name=='afterInsert'){
            if ($event->sender::tableName()=='{{%admin_log}}'){
                return false;
            }
            $pk = $event->sender->primaryKey()[0];
            $description = Yii::$app->user->identity->username . '创建了 ' . $pk.'='.$event->sender->getAttribute($pk). ' 的记录';
            $operationType = 'create';
        }

        $tableName = $event->sender::tableName();

        //存储日志入库
        $route = Url::to();
        $userId = Yii::$app->user->id;
        $data = [
            'route'          => $route,
            'table_name'     => $tableName,
            'operation_type' => $operationType,
            'description'    => $description,
            'created_at'     => time(),
            'user_id'        => $userId
        ];

        $model = new \app\models\AdminLog();
        $model->setAttributes($data);
        if ($model->save()){
            return true;
        }else{
            return false;
        }
    }
}