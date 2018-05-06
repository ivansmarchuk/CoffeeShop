<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 05.05.2018
 */

namespace app\controllers;


use RedBeanPHP\R;

class ProductController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);

        $country = R::findOne('country', "id = ?", [$product->country_id]);

        if (!$product) {
            throw new \Exception('Seite wurde nicht gefunden', 404);
        }
        $related = R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$product->id]);
        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'country', 'related'));

    }


}