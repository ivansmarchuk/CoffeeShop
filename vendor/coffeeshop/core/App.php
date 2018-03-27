<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 27.03.2018
 * Time: 23:07
 */

namespace coffeeshop;


class App
{
    public static $app;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();

        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();
    }

    /**
     * get parameters from config files
     */
    protected function getParams()
    {
        $params = require_once CONF . '/params.php';
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}