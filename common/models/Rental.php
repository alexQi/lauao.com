<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;


class Rental extends \yii\db\ActiveRecord {



    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%rental}}';
    }


}
