<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 11.05.2018
 */

namespace app\controllers;


use app\models\Category;
use coffeeshop\App;
use coffeeshop\libs\Pagination;
use RedBeanPHP\R;

class DiscountController extends AppController
{
    /**
     * for generating discountpage on the web site
     * @throws \Exception
     */
    public function viewAction()
    {

        $discount_product = R::find('product', 'old_price <> 0');

        if (!$discount_product) {
            throw new \Exception('Datei nicht gefunden', 404);
        }
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('product', "old_price <> 0");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = R::find('product', "old_price <> 0 LIMIT $start, $perpage");
        $this->set(compact('products', 'pagination', 'total'));
    }
}