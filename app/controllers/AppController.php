<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 14:12
 */

namespace app\controllers;


use app\models\AppModel;
use coffeeshop\App;
use coffeeshop\base\Controller;
use coffeeshop\Cache;
use RedBeanPHP\R;


class AppController extends Controller
{
    public function __construct($route)
    {

        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('cats', self::cacheCategory());
    }

    /**
     * Save the category for menu in cashe
     * @return array array of categories from data base for creating tne menu
     */
    public static  function cacheCategory(){
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        if(!$cats){
            $cats = R::getAssoc("SELECT * FROM country");
            $cache->set('cats', $cats);
        }
        return $cats;
    }
}
