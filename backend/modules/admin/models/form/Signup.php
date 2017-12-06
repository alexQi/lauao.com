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
    public $username;
    public $email;
    public $password;
    public $status;
    public $nickName;
    public $realName;
    public $section;
    public $gender;
    public $birthday;
    public $avatar;
    public $tempFileUrl;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','nickName','realName','section','gender','birthday','avatar'], 'filter', 'filter' => 'trim'],
            [['username','nickName','realName','section','birthday','avatar'], 'required','message' => "{attribute}不能为空"],
            ['username', 'unique', 'targetClass' => 'backend\modules\admin\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'backend\modules\admin\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['status','safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'nickName' => '昵称',
            'realName' => '真实姓名',
            'section' => '部门',
            'gender' => '性别',
            'birthday' => '生日',
            'avatar' => '头像',
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool the saved model or null if saving fails
     */
    public function signup()
    {
        $tran = yii::$app->db->beginTransaction();
        try
        {
            if (!$this->validate())
            {
                throw new Exception($this->errors);
            }

            //用户账号信息
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            if (!$user->save())
            {
                throw new Exception('新建用户失败');
            }

            //用户基础信息
            $userExtend = new UserExtend();
            $userExtend->user_id   = $user->id;
            $userExtend->real_name = $this->realName;
            $userExtend->nick_name = $this->nickName;
            $userExtend->section   = $this->section;
            $userExtend->gender    = $this->gender;
            $userExtend->birthday  = $this->birthday;
            $userExtend->avatar    = $this->avatar;

            if (!$userExtend->save())
            {
                throw new Exception('添加用户基础信息失败');
            }

            //添加用户基础权限
            $authAssignment = new Assignment($user->id);

            $item = array('普通用户');
            $assignmentResult = $authAssignment->assign($item);

            if (!$assignmentResult)
            {
                throw new Exception('初始化用户权限失败');
            }

            $tran->commit();
            $result = true;
        }catch (Exception $e)
        {
            $tran->rollBack();
            $result = false;
        }

        return $result;
    }
}
