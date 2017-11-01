<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017/11/1
 * Time: 22:32
 */
return [
    'class' => 'common\components\yii2beanstalk\Beanstalk',
    'host'=> "127.0.0.1", // default host
    'port'=>11300, //default port
    'connectTimeout'=> 1,
    'sleep' => false, // or int for usleep after every job
];