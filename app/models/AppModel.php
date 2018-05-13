<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 16:10
 */

namespace app\models;


use coffeeshop\base\Model;
use RedBeanPHP\R;

class AppModel extends Model
{

    public static function createAlias($table, $field, $str, $id){
        $str = self::str2url($str);

        $res = R::findOne($table, "$field = ?", [$str]);

        if($res){
            $str = "{$str}-{$id}";
            $res = R::count($table, "$field = ?", [$str]);
            if($res){
                $str = self::createAlias($table, $field, $str, $id);
            }
        }
        return $str;
    }

    /**
     * converts all words for style, that is needed for alias
     * @param $str name for database
     * @return null|string|string[] new string in format for alias column in database
     */
    public static function str2url($str) {
        // in lowercase
        $str = strtolower($str);
        // substitutes all unnecessary us on "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        //delete initial and final '-'
        $str = trim($str, "-");
        return $str;
    }

}