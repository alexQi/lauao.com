<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidConfigException;
use common\models\User;
use common\models\UserExtend;
/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = false;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            [['password'], 'validatePassword'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => '账号',
            'password' => '密码',
            'rememberMe' => '记住我',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                return $this->addError($attribute, '账号或密码不正确');
            }
            if ($user->getAttribute('status')==User::STATUS_DELETED) {
                return $this->addError($attribute, '账号已被删除或禁用');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            if (Yii::$app->user->isGuest==false)
            {
                $UserExtendModel = UserExtend::find()->where(['user_id'=>Yii::$app->user->identity->getId()])->one();
                if ($UserExtendModel)
                {
                    $UserExtendModel->last_login_ip   = ip2long(Yii::$app->getRequest()->getUserIP());
                    $UserExtendModel->last_login_time = time();
                    $UserExtendModel->save(false);

                    return true;
                }else{
                    throw new InvalidConfigException('用户数据异常');
                }
            }
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
