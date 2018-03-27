<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 27.03.2018
 * Time: 23:15
 */

namespace coffeeshop;


class Registry{
    use TSingletone;

    protected static $properties = [];

    /**
     * @param array $properties
     */
    public function setProperty($name, $value){
        self::$properties[$name] = $value;
    }

    /**
     * @return array
     */
    public function getProperty($name){
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }



    /**
     * @return array
     */
    public function getProperties(){
        return self::$properties;
    }

}