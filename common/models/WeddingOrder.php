<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%wedding_order}}".
 *
 * @property int $order_id 订单ID
 * @property string $order_sn 订单SN
 * @property string $order_source 订单来源
 * @property string $customer_name 客户姓名
 * @property int $customer_mobile 客户手机号
 * @property int $wedding_date 婚庆日期
 * @property string $wedding_address 婚庆地址
 * @property int $project_process 项目进度
 * @property string $remark 备注
 * @property int $user_id 创建用户
 * @property int $created_at 下单时间
 * @property int $updated_at 更新时间
 */
class WeddingOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wedding_order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_sn', 'order_source', 'customer_name', 'customer_mobile', 'wedding_date', 'wedding_address', 'project_process', 'remark', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['customer_mobile', 'project_process', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['order_sn'], 'string', 'max' => 50],
            [['order_source', 'wedding_address'], 'string', 'max' => 200],
            [['customer_name'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 255],
            [['wedding_date'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => '订单ID',
            'order_sn' => '订单SN',
            'order_source' => '策划师+推荐人+店名',
            'customer_name' => '客户姓名',
            'customer_mobile' => '客户手机号',
            'wedding_date' => '婚庆日期',
            'wedding_address' => '婚庆地址',
            'project_process' => '项目进度',
            'remark' => '备注',
            'user_id' => '创建用户',
            'created_at' => '下单时间',
            'updated_at' => '更新时间',
        ];
    }
}
