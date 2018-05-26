<?php

namespace backend\modules\admin\models\form;

use Yii;
use backend\modules\admin\models\User;
use backend\modules\admin\models\Assignment;
use common\models\UserExtend;
use yii\base\Model;
use yii\base\Exception;

/**
 * Signup form
 */
class Signup extends Model
{
    public $id          = false;
    public $section     = 0;
    public $avatar      = 0;
    public $isNewRecord = true;
    public $username;
    public $email;
    public $password_hash;
    public $status;
    public $nick_name;
    public $real_name;
    public $gender;
    public $birthday;
    public $tempFileUrl;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'nick_name', 'real_name', 'section', 'gender', 'birthday', 'avatar'], 'filter', 'filter' => 'trim'],
            [['username', 'nick_name', 'real_name', 'birthday'], 'required', 'message' => "{attribute}不能为空"],
            ['username', 'unique', 'targetClass' => 'backend\modules\admin\models\User', 'message' => '当前用户已存在'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'backend\modules\admin\models\User', 'message' => '当前Email已被注册'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
            [['status', 'section', 'avatar'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'username'  => '用户名',
            'nick_name' => '昵称',
            'real_name' => '真实姓名',
            'section'   => '部门',
            'gender'    => '性别',
            'birthday'  => '生日',
            'avatar'    => '头像',
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool the saved model or null if saving fails
     */
    public function signup() {
        $tran = yii::$app->db->beginTransaction();
        try {
            if (!$this->validate()) {
                throw new Exception(current($this->getFirstErrors()));
            }

            //用户账号信息
            $user           = new User();
            $user->username = $this->username;
            $user->email    = $this->email;
            $user->setPassword($this->password_hash);
            $user->generateAuthKey();

            if (!$user->save()) {
                throw new Exception(current($user->getFirstErrors()));
            }

            //用户基础信息
            $userExtend            = new UserExtend();
            $userExtend->user_id   = $user->id;
            $userExtend->real_name = $this->real_name;
            $userExtend->nick_name = $this->nick_name;
            $userExtend->section   = $this->section;
            $userExtend->gender    = $this->gender;
            $userExtend->birthday  = $this->birthday;
            $userExtend->avatar    = $this->avatar;

            if (!$userExtend->save()) {
                $userExtend->getFirstErrors();
                throw new Exception(current($userExtend->getFirstErrors()));
            }

            //添加用户基础权限
            $authAssignment = new Assignment($user->id);

            $item             = array('普通用户');
            $assignmentResult = $authAssignment->assign($item);

            if (!$assignmentResult) {
                throw new Exception('初始化用户权限失败');
            }

            $tran->commit();
            $result = true;
        } catch (Exception $e) {
            $tran->rollBack();
            $result = false;
        }

        return $result;
    }
}
