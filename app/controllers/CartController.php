<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 08.05.2018
 */

namespace app\controllers;


use app\models\Cart;
use RedBeanPHP\R;

class CartController extends AppController
{
    public function addAction(){
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        //für verschiedene Variationen der Inhalts zuständig
        //$mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        $mod = null;
        if($id){
            $product = R::findOne('product', 'id = ?', [$id]);
            if(!$product){
                return false;
            }
            //TODO Möglichkeit verschiedene Variationen der Inhalts zu realisieren(250g, 500g, 1000g)
//            if($mod_id){
//
//            }
        }
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function showAction(){
        $this->loadView('cart_modal');
    }

    /**
     * removes the selected items from the shopping cart
     */
    public function deleteAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if(isset($_SESSION['cart'][$id])){
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }

    /**
     * clear all products from cart with press on button reset
     */
    public function clearAction(){
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        $this->loadView('cart_modal');
    }

}