<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 13.05.2018
 */

namespace app\controllers\admin;


use app\models\admin\Product;
use app\models\AppModel;
use coffeeshop\libs\Pagination;
use RedBeanPHP\R;

class ProductController extends AppController
{
    /**
     * for rendering a main product page in admin panel
     */
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 9;
        $count = R::count('product');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $products = R::getAll("SELECT product.*, category.title AS cat FROM product JOIN category ON category.id = product.category_id ORDER BY product.title LIMIT $start, $perpage");
        $this->setMeta('Product Liste');
        $this->set(compact('products', 'pagination', 'count'));
    }

    /**
     * adds new product into database
     */
    public function addAction()
    {
        if (!empty($_POST)) {
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? '1' : '0';
            $product->attributes['hit'] = $product->attributes['hit'] ? '1' : '0';

            if (!$product->validate($data)) {
                $product->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if ($id = $product->save('product')) {
                $p = R::load('product', $id);
                $str = strtolower($p->title);
                // substitutes all unnecessary us on "-"
                $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
                //delete initial and final '-'
                $str = trim($str, "-");
                debug($str);
                die;
                $p->alias = $str;
                R::store($p);

                $_SESSION['success'] = 'Waren wurde hinzugefügt';
            }
            redirect();
        }

        $this->setMeta('Neues Waren');
    }
}