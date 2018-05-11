<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 11.05.2018
 */

namespace app\models;


class Order extends AppModel
{
    /**
     * saves in database orders
     * @param $data cart
     */
    public static function saveOrder($data){

    }

    public static function saveOrderProduct($order_id){

    }

    /**
     * sends email for admin and user
     * @param $order_id
     * @param $user_email
     */
    public static function mailOrder($order_id, $user_email){

    }
}