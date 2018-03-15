<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-8-10
 * Time: 上午9:20
 */

if ($_GET['flag']=='alex'){
    echo phpinfo();
}else{
    header("Location:www.oliu.online");
}