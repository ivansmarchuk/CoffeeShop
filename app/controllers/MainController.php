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

class MainController extends AppController {

    public function indexAction(){


        $posts = R::findAll('test');


        $this->setMeta(App::$app->getProperty('shop_name'), 'Beschreibung', 'Keys');

        $name = 'Ivan';
        $age =22;
        $names = ['And', 'Mike', 'Jane'];
        $cache = Cache::instance();
        //$cache->set('test', $names);
        //$cache->delete('test');
        $data = $cache->get('test');
        if(!$data){
            $cache->set('test', $names);
        }
        debug($data);
        $this->set(compact('name', 'age', 'posts'));
    }

}