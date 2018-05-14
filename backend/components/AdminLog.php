<?php

namespace backend\components;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class AdminLog
 *
 * @package backend\components
 */
class AdminLog {
    /**
     * @param $event ActiveRecord
     * @return bool
     */
    public static function write($event) {
//        var_dump($event);die();
        $raw_data     = [];
        $current_data = [];
        switch ($event->name) {
            case 'afterUpdate':
                if (!empty($event->changedAttributes)) {
                    foreach ($event->changedAttributes as $name => $value) {
                        if ($value == $event->sender->getAttribute($name)) {
                            continue;
                        }
                        $raw_data[$name]     = $event->sender->getAttribute($name);
                        $current_data[$name] = $value;
                    }
                    if (empty($raw_data)) {
                        return true;
                    }
                    $operationType = 'update';
                } else {
                    return true;
                }
                break;
            case 'afterDelete':
                $raw_data = $event->sender->attributes;
                $operationType = 'delete';
                break;
            case 'afterInsert':
                if ($event->sender::tableName() == '{{%admin_log}}') {
                    return false;
                }
                $raw_data = $event->sender->attributes;
                $operationType = 'create';
                break;
            default:
                return false;
        }

        $tableName = $event->sender::tableName();
        preg_match('/[a-z_]+/', $tableName, $tableNameArr);
        $tableName = reset($tableNameArr);
        //存储日志入库
        $data = [
            'module'         => Yii::$app->controller->module->id,
            'controller'     => Yii::$app->controller->id,
            'action'         => Yii::$app->controller->action->id,
            'table_name'     => $tableName,
            'primary_key'    => $event->sender->getAttribute($event->sender->primaryKey()[0]),
            'operation_type' => $operationType,
            'raw_data'       => json_encode($raw_data),
            'current_data'   => empty($current_data) ? '' : json_encode($current_data),
            'user_id'        => Yii::$app->user->id,
            'created_at'     => time()
        ];

        $model = new \backend\models\AdminLog();
        $model->setAttributes($data);
        $model->save();

        if ($model->save()) {
            return true;
        } else {
            return false;
        }
    }
}