<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 13:56
 */

namespace app\controllers;


use coffeeshop\App;
use coffeeshop\base\Controller;
use coffeeshop\Cache;
use \RedBeanPHP\R as R;


class MainController extends AppController
{
    /**
     * main view render
     */
    public function indexAction()
    {

        $countries = R::findAll( 'country');
        $hits = R::find('product', "hit = '1' AND status = '1'");

        $this->setMeta(App::$app->getProperty('shop_name'), 'Beschreibung', 'Keys');
        //set new variable for visible in views
        $this->set(compact('countries', 'hits'));


    }
}