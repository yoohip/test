<?php
/**
 * Author: yoohip
 * Email: yoohip@163.com
 * Date: 2021/12/12
 * Time: 15:59
 */

namespace yoohip;

class HandleString
{

    // 常用字符
    public static $chars = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        "S", "T", "U", "V", "W", "X", "Y", "Z"
    );

    // 特殊字符
    public static $special = array(
        "!", "@", "#", "$", "?", "|", "{", "/", ":", ";",
        "%", "^", "&", "*", "(", ")", "-", "_", "[", "]",
        "}", "<", ">", "~", "+", "=", ",", "."
    );

    // 数字
    public static $number = array(
        "1", "2", "3", "4", "5", "6", "7", "8", "9", "0"
    );

    /**
     * 获取随机字符串
     * @param int $length | 长度
     * @param bool $isSpecial | 特殊字符
     * @param bool $isNumber | 数字
     * @param bool $isEncryption | md5加密
     * @return string
     */
    public static function getRandomStr(int $length = 6, bool $isSpecial=false, bool $isNumber=false, bool $isEncryption=false)
    {

        if ($isSpecial && $isNumber) {

            $new_chars = array_merge(self::$chars, self::$special);
            $new_chars = array_merge($new_chars, self::$number);

        } else if ($isSpecial&& !$isNumber) {

            $new_chars = array_merge(self::$chars, self::$special);

        }else if (!$isSpecial&& $isNumber) {
            $new_chars = array_merge(self::$chars, self::$number);
        } else {
            $new_chars = self::$chars;
        }

        // 统计数组个数
        $charsLen = count($new_chars) - 1;

        //打乱数组顺序
        shuffle($new_chars);

        $str = '';
        for($i=0; $i<$length; $i++){
            $str .= $new_chars[mt_rand(0, $charsLen)];
        }

        // 是否需要加密
        if($isEncryption){
            $str = md5($str);
        }
        return $str;
    }

    /**
     * 获取随机指定长度数字
     * @param int $length
     * @return string
     */
    public static function getRandomNumbers(int $length = 6)
    {
        // 统计数组个数
        $charsLen = count(self::$number) - 1;

        //打乱数组顺序
        shuffle(self::$number);

        $str = '';
        for($i=0; $i<$length; $i++){
            $str .= self::$number[mt_rand(0, $charsLen)];
        }

        return $str;
    }
}
