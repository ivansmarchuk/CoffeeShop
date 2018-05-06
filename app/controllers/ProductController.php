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
    public function viewAction(){
        $alias = $this->route['alias'];
        $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);
        if(!$product){
            throw new \Exception('Seite wurde nicht gefunden', 404);
        }

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product'));
    }
}