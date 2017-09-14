<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%apply_record}}".
 *
 * @property integer $id
 * @property string $apply_name
 * @property integer $gender
 * @property integer $phone
 * @property string $self_desc
 * @property string $self_picture
 * @property string $self_media
 * @property string $recommend
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class ApplyRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%apply_record}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apply_name', 'gender', 'phone', 'self_desc', 'self_picture', 'self_media', 'created_at', 'updated_at'], 'required'],
            [['gender', 'phone', 'status', 'created_at', 'updated_at'], 'integer'],
            [['apply_name'], 'string', 'max' => 20],
            [['self_desc', 'self_picture', 'self_media'], 'string', 'max' => 255],
            [['recommend','weichat_uid'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'apply_name' => '申请人',
            'gender' => '性别',
            'phone' => '电话号码',
            'self_desc' => '自我介绍',
            'self_picture' => '照片',
            'self_media' => '语音',
            'recommend' => '推荐单位',
            'weichat_uid' => '微信ID',
            'status' => '状态 1待审核 2已通过',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
