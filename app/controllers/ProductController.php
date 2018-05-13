<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 05.05.2018
 */

namespace app\controllers;


use app\models\Breadcrumbs;
use app\models\Product;
use RedBeanPHP\R;

class ProductController extends AppController
{
    /**
     * shows product from database on the web site
     * @throws \Exception
     */
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);

        $country = R::findOne('country', "id = ?", [$product->country_id]);

        if (!$product) {
            throw new \Exception('Seite wurde nicht gefunden', 404);
        }

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);


        //selects from database related products for the product overview page
        $related = R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$product->id]);

        //the entry in the cookies of the recently product
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);

        //viewed products
        $r_viewed = $p_model->getRecentlyViewed();
        $recentlyViewed = null;
        if ($r_viewed){
            $recentlyViewed = R::find('product', 'id IN (' . R::genSlots($r_viewed) . ') LIMIT 4', $r_viewed);
        }



        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'country', 'related', 'recentlyViewed', 'breadcrumbs'));

    }


}