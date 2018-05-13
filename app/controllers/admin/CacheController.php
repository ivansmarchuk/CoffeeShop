<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 13.05.2018
 */

namespace app\controllers\admin;


use coffeeshop\Cache;

class CacheController extends AppController
{
    /**
     * main page for view
     */
    public function indexAction(){
        $this->setMeta('Cache Entfernung');
    }

    /**
     * delete the cache from tmp
     */
    public function deleteAction(){
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch($key){
            case 'category':
                $cache->delete('cats');
                $cache->delete('coffeeshop_menu');
                break;
        }
        $_SESSION['success'] = 'ausgewähltes Cache wurde entfernt';
        redirect();
    }
}