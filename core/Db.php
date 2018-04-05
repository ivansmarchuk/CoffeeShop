<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 15:57
 */

namespace coffeeshop;


use \RedBeanPHP\R as R;


class Db
{

    use TSingletone;


    protected function __construct()
    {

        $db = require_once CONF . '/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['pass']);
        if (!R::testConnection()) {
            throw new \Exception("Connected to db is failed", 500);
        }
        R::freeze(true);
        if(DEBUG){
            R::debug(true, 1);
        }


    }

}