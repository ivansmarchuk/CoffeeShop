<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 27.03.2018
 * Time: 23:16
 */

namespace coffeeshop;


trait TSingletone{

    private static $instanse;
    public static function instance(){
        if (self::$instanse === null){
            self::$instanse = new self;
        }
        return self::$instanse;
    }
}