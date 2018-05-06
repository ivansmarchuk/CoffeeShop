<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 05.05.2018
 */

namespace app\widgets\menu;


use coffeeshop\App;
use coffeeshop\Cache;

class Menu
{

    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'list-group sidebar-list-check';
    protected $table = 'category';
    protected $cashe = 3600;
    protected $casheKey = 'ishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();

    }

    /**
     * rewrites the options for the menu if the user has defined some options
     * @param $options user option for menu settings
     */
    protected function getOptions($options)
    {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    /**
     * Function check the cache menu and set the menu from the cache if those exists
     */
    protected function run()
    {
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->casheKey);
        if (!$this->menuHtml) {
            $this->data = App::$app->getProperty('cats');
            if (!$this->data) {
                $this->data = $cats = R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if ($this->cashe){
                $cache->set($this->casheKey, $this->menuHtml, $this->cashe);
            }
        }
        $this->output();
    }

    protected function output()
    {
        $attrs = '';
        if (!empty($this->attrs)){
            foreach ($this->attrs as $k => $v){
                $attrs .= " $k = '$v' ";
            }
        }

        echo "<{$this->container} class = '{$this->class}' $attrs> ";
        echo $this->prepend;
            echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    /**
     * creates from simple array, that was retrieved from the database a tree for the menu creation
     * @return new array for menu
     */
    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    /**
     * Generates the thml from tree
     * @param $tree categories tree
     * @param string $tab divider if menu hasnot the structure like ul->li
     * @return string new string with menu
     */
    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;

    }

    /**
     * @param $category category from categories tree
     * @param $tab divider of elements
     * @param $id category id
     * @return string new thml code used templates
     */
    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();

    }

}