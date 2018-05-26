<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_extend}}".
 *
 * @property integer $user_extend_id
 * @property integer $user_id
 * @property string $real_name
 * @property string $nick_name
 * @property integer $section
 * @property integer $gender
 * @property string $birthday
 * @property string $avatar
 * @property integer $last_login_ip
 * @property integer $last_login_time
 */
class UserExtend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_extend}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'real_name', 'nick_name', 'section', 'gender', 'birthday'], 'required'],
            [['user_id', 'section', 'gender', 'last_login_ip', 'last_login_time'], 'integer'],
            [['real_name', 'nick_name', 'birthday'], 'string', 'max' => 255],
            [['avatar'], 'string', 'max' => 100],
            [['avatar'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_extend_id' => 'User Extend ID',
            'user_id' => 'User ID',
            'real_name' => '姓名',
            'nick_name' => '昵称',
            'section' => '部门',
            'gender' => '性别',
            'birthday' => '生日',
            'avatar' => '头像',
            'last_login_ip' => '上次登陆IP',
            'last_login_time' => '上次登陆时间',
        ];
    }
}
