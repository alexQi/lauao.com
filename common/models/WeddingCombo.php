<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%wedding_combo}}".
 *
 * @property int $combo_id ID
 * @property int $section_id 部门ID
 * @property string $combo_name 套餐名
 * @property string $price 价格
 * @property int $user_id 创建用户
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class WeddingCombo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wedding_combo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_id', 'combo_name', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['section_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['combo_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'combo_id' => 'ID',
            'section_id' => '部门',
            'combo_name' => '套餐名',
            'price' => '价格',
            'user_id' => '创建用户',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
