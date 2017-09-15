<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017/9/15
 * Time: 下午2:34
 */
namespace common\models\service;

use common\models\ApplyRecord;
use common\models\ActivityBase;

class ApplyRecordService extends ApplyRecord
{
    public static function getAllApplyUserList()
    {
        $query = self::find();
        $query->select('ar.*,ab.title');
        $query->from(['ar'=>ApplyRecord::tableName()]);
        $query->leftJoin(['ab'=>ActivityBase::tableName()],'ar.activity_id=ab.id');
        $query->where(['ar.status'=>2]);
        return $query->asArray()->all();
    }
}