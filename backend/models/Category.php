<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $cate_id
 * @property string $cate_name
 * @property string $create_time
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time'], 'safe'],
            [['cate_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cate_id' => \Yii::t('app', 'cate id'),
            'cate_name' => \Yii::t('app', 'cate name'),
            'create_time' => \Yii::t('app', 'create time'),
        ];
    }
}
