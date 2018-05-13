<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 12.05.2018
 */

namespace app\controllers\admin;


use coffeeshop\libs\Pagination;
use RedBeanPHP\R;

class OrderController extends AppController
{
    /**
     * uses for view the order page on admin page
     */
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        $count = R::count('order');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $orders = R::getAll("SELECT `order`.`id`, `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_at`, `user`.`name`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
  JOIN `user` ON `order`.`user_id` = `user`.`id`
  JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
  GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT $start, $perpage");

        $this->setMeta('Bestellliste');
        $this->set(compact('orders', 'pagination', 'count'));
    }

    /**
     * uses for view all orders on admin page
     * @throws \Exception
     */
    public function viewAction()
    {
        $order_id = $this->getRequestID();
        $order = R::getRow("SELECT `order`.*, `user`.`name`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
  JOIN `user` ON `order`.`user_id` = `user`.`id`
  JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
  WHERE `order`.`id` = ?
  GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1", [$order_id]);
        if (!$order) {
            throw new \Exception('Seite nicht gefunden!', 404);
        }
        $order_products = R::findAll('order_product', "order_id = ?", [$order_id]);
        $this->setMeta("Bestellung №{$order_id}");
        $this->set(compact('order', 'order_products'));
    }

    /**
     * for changing a orders
     * @throws \Exception
     */
    public function changeAction()
    {
        $order_id = $this->getRequestID();
        $status = !empty($_GET['status']) ? '1' : '0';
        $order = R::load('order', $order_id);

        if (!$order) {
            throw new \Exception('Seite nicht gefunden!', 404);
        }
        $order->status = $status;
        $order->update_at = date("Y-m-d H:i:s");

        R::store($order);
        $_SESSION['success'] = 'Änderungen wurde gespeichert';
        redirect();
    }

    /**
     * deletes a order from database
     * @throws \Exception
     */
    public function deleteAction()
    {
        $order_id = $this->getRequestID();
        $order = R::load('order', $order_id);
        R::trash($order);
        $_SESSION['success'] = 'Bestellung wurde entfernt';
        redirect(ADMIN . '/order');
    }


}