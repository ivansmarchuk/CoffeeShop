<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 11.05.2018
 */

namespace app\controllers;


use coffeeshop\App;
use coffeeshop\libs\Pagination;
use RedBeanPHP\R;

class NewproductsController extends AppController
{
    /**
     * shows new products on the website
     * @throws \Exception
     */
    public function viewAction()
    {
        // $alias = $this->route['alias'];
        $new_product= R::find('product', 'ORDER BY id DESC');


        if (!$new_product) {
            throw new \Exception('Datei nicht gefunden', 404);
        }
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('product', "ORDER BY id DESC");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = R::find('product', "ORDER BY id DESC LIMIT $start, $perpage");
        $this->set(compact('products','pagination', 'total'));
    }
}