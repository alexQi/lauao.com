<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%wedding_item_order}}".
 *
 * @property int $item_order_id 子部门订单ID
 * @property int $order_id 订单ID
 * @property int $section_id 部门ID
 * @property int $combo_id 套餐ID
 * @property string $custom 定制
 * @property string $deal_price 成交价格
 * @property int $status 状态
 * @property string $principal 负责人
 * @property int $user_id 创建用户
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class WeddingItemOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wedding_item_order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'section_id', 'combo_id', 'custom', 'deal_price', 'status', 'principal', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['order_id', 'section_id', 'combo_id', 'status', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['deal_price'], 'number'],
            [['custom'], 'string', 'max' => 200],
            [['principal'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_order_id' => '子部门订单ID',
            'order_id' => '订单ID',
            'section_id' => '部门ID',
            'combo_id' => '套餐ID',
            'custom' => '定制',
            'deal_price' => '成交价格',
            'status' => '状态',
            'principal' => '负责人',
            'user_id' => '创建用户',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
