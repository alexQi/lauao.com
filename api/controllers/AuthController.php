<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017/9/13
 * Time: 下午2:27
 */
namespace api\controllers;

use OAuth2\Storage\Pdo;
use yii\base\Exception;

class AuthController extends BaseController
{
    public function actionToken()
    {
        $storage = new Pdo(array('dsn' => $dsn, 'username' => $username, 'password' => $password));
    }
}