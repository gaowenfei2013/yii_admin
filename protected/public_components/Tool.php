<?php
/**
 * 常用工具类
 * Class Tool
 */

class Tool {
    /**
     * ip转换成正整数
     *
     * ip2long 有很多ip会转换成有负数的
     * @param $ip
     * @return number
     */
    static function ip2number($ip){
        return bindec(decbin(ip2long($ip)));
    }

    /**
     * 将整数转换成ip
     * @param int $ip_n
     * @return string
     */
    static function number2ip($ip_n){
        return long2ip($ip_n);
    }

    /**
     * 生成6位随机密码干扰字符串
     * @return string
     */
    static function salt(){
        return substr(uniqid(rand()), -6);
    }

    /**
     * 生成密文密码
     * @param $pwd 密码
     * @param $salt 干扰字符
     * @return string
     */
    static function pwdSalt($pwd, $salt){
        return md5(md5($pwd).$salt);
    }

    /**
     * 检查密码是否正确
     * @param $pwd 明文密码
     * @param $pwdSalt 加密后的密码
     * @param $salt 干扰字符
     * @return bool
     */
    static function pwdCheck($pwd, $pwdSalt, $salt){
        return self::pwdSalt($pwd,$salt)==$pwdSalt;
    }


}