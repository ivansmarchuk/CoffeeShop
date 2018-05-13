<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 12.05.2018
 */

namespace app\controllers\admin;


use RedBeanPHP\R;

class MainController extends AppController
{
    /**
     * Uses for the render the admin index page
     */
    public function indexAction()
    {
        $countNewOrders = R::count('order', "status = '0'");
        $countUsers = R::count('user');
        $countProducts = R::count('product');
        $countCategories = R::count('category');
        $this->setMeta('Admin Panel');

        $this->set(compact('countNewOrders', 'countCategories', 'countProducts', 'countUsers'));
    }
}