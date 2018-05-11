<?php
/**
 * Created by PhpStorm.
 * User: Roberto
 * Date: 11.05.2018
 * Time: 20:11
 */

namespace app\controllers;


use app\models\Category;
use coffeeshop\App;
use coffeeshop\libs\Pagination;
use RedBeanPHP\R;

class DiscountController extends AppController
{
    public function viewAction()
    {
       // $alias = $this->route['alias'];
         $discount_product= R::find('product', 'old_price <> 0');
        debug($discount_product);

        if (!$discount_product) {
            throw new \Exception('Datei nicht gefunden', 404);
        }
       //$breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

//        $cat_model = new Category();
//        $ids = $cat_model->getIds($category->id);
///       $ids = !$ids ? $category->id : $ids . $category->id;
////
////        $products = R::find('product', "category_id IN ($ids) ");
//
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('product', "old_price <> 0");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = R::find('product', "old_price <> 0 LIMIT $start, $perpage");
        $this->set(compact('products','pagination', 'total'));
    }
}