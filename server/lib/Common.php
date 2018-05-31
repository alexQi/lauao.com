<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2018/5/29
 * Time: 14:55
 */
namespace Common;

use Exception;
/**
 * Class Common
 *
 * @package Common
 */
class Common{

    /**
     * @param $url
     * @param null $params
     * @param string $type
     * @param string $header
     * @return bool|mixed
     * @throws Exception
     */
    public static function httpRequest($url, $params = [], $type = 'get',$header=[])
    {
        $curl = curl_init();
        if ($header){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        }else{
            curl_setopt($curl, CURLOPT_HEADER, false);
        }
        is_array($params) && $params = http_build_query($params);
        switch ($type) {
            case 'get':
                !empty($params) && $url .= (stripos($url, '?') === false ? '?' : '&') . $params;
                break;
            case 'post':
                curl_setopt($curl, CURLOPT_POST, true);
                if (!$params) {
                    throw new Exception("Post data can not be empty.");
                }
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
                break;
            case 'raw':
                curl_setopt($curl, CURLOPT_POST, true);
                if (is_array($params)) {
                    throw new Exception("Post data can not be empty.");
                }
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
                break;
            default:
                throw new Exception("Invalid http type '{$type}.' called.");
        }
        if (stripos($url, "https://") !== false) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1); // 微信官方屏蔽了ssl2和ssl3, 启用更高级的ssl
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $content = curl_exec($curl);
        $status = curl_getinfo($curl);
        curl_close($curl);
        if (isset($status['http_code']) && intval($status['http_code']) == 200) {
            return $content;
        }
        return false;
    }
}