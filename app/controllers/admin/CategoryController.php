<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 13.05.2018
 */

namespace app\controllers\admin;


use app\models\AppModel;
use app\models\Category;
use coffeeshop\App;
use RedBeanPHP\R;

class CategoryController extends AppController
{
    /**
     * main page for menu kategory in adminpanel
     */
    public function indexAction()
    {
        $this->setMeta("Kategoriesübersicht");
    }

    /**
     * delete category from admin panel
     * @throws \Exception
     */
    public function deleteAction()
    {
        $id = $this->getRequestID();
        $children = R::count('category', 'parent_id = ?', [$id]);
        $errors = '';
        if ($children) {
            $errors .= '<li>Die Entfernung ist nicht möglich, es gibt Unterkategorien in der Kategorie</li>';
        }
        $products = R::count('product', 'category_id = ?', [$id]);
        if ($products) {
            $errors .= '<li>Die Entfernung ist nicht möglich, es gibt Produkte in der Kategorie</li>';
        }
        if ($errors) {
            $_SESSION['error'] = "<ul>$errors</ul>";
            redirect();
        }
        $category = R::load('category', $id);
        R::trash($category);
        $_SESSION['success'] = 'Kategorie wurde entfernt.';
        redirect();
    }

    /**
     * add new category from admin panel
     */
    public function addAction()
    {
        if (!empty($_POST)) {
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if (!$category->validate($data)) {
                $category->getErrors();
                redirect();
            }
            if ($id = $category->save('category')) {

                //   $alias = AppModel::createAlias('category', 'alias', $data['title'], $id);
                $cat = R::load('category', $id);
                // in lowercase
                $str = strtolower($cat->title);
                // substitutes all unnecessary us on "-"
                $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
                //delete initial and final '-'
                $str = trim($str, "-");

                $cat->alias = $str;
                R::store($cat);
                $_SESSION['success'] = 'Kategorie wurde hinzugefügt';
            }
            redirect();
        }
        $this->setMeta('Neue Kategorie');
    }

    /**
     * edits category on admin page
     * @throws \Exception
     */
    public function editAction()
    {
        if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if (!$category->validate($data)) {
                $category->getErrors();
                redirect();
            }
            if ($category->update('category', $id)) {
                // in lowercase
                $category = R::load('category', $id);
                $str = strtolower($category->title);
                // substitutes all unnecessary us on "-"
                $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
                //delete initial and final '-'
                $str = trim($str, "-");
                $category->alias = $str;
                R::store($category);
                $_SESSION['success'] = 'Änderung wurde gespeichert';
            }
            redirect();
        }
        $id = $this->getRequestID();
        $category = R::load('category', $id);
        App::$app->setProperty('parent_id', $category->parent_id);
        $this->setMeta("Kategorie Änderung {$category->title}");
        $this->set(compact('category'));
    }


}