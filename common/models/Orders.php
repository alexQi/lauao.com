<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property integer $id
 * @property string $order_id
 * @property integer $combo
 * @property integer $num
 * @property integer $pay_method
 * @property string $total_money
 * @property string $channel
 * @property string $address
 * @property integer $status
 * @property integer $create_time
 * @property integer $pay_time
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'combo', 'num', 'total_money', 'channel', 'address', 'status', 'create_time', 'pay_time'], 'required'],
            [['combo', 'num', 'pay_method', 'status', 'create_time', 'pay_time'], 'integer'],
            [['total_money'], 'number'],
            [['order_id', 'channel', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'combo' => '套餐。1 2 3',
            'num' => 'Num',
            'pay_method' => '支付方式 1 微信支付',
            'total_money' => 'Total Money',
            'channel' => 'Channel',
            'address' => 'Address',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'pay_time' => 'Pay Time',
        ];
    }
}
