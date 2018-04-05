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

    public function indexAction()
    {
        //$brands = R::find('brand', 'LIMIT 3');

        $this->setMeta(App::$app->getProperty('shop_name'), 'Beschreibung', 'Keys');
        $this->set(compact('user'));
    }
}