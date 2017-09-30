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
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $is_postal
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
            [['order_id', 'combo', 'num', 'total_money', 'channel', 'name', 'phone', 'address', 'status', 'create_time', 'pay_time'], 'required'],
            [['combo', 'num', 'pay_method', 'status', 'create_time', 'pay_time'], 'integer'],
            [['total_money'], 'number'],
            [['order_id', 'channel', 'name', 'phone', 'address'], 'string', 'max' => 255],
            [['is_postal'], 'string', 'max' => 1],
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
            'name' => 'Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'is_postal' => '邮费 1 包邮 2 需付邮费15',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'pay_time' => 'Pay Time',
        ];
    }
}
