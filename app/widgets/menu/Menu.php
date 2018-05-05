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
    protected $table = 'category';
    protected $cashe = 3600;
    protected $casheKey = 'ishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        debug($this->table);
        $this->run();

    }

    /**
     * rewrites the options for the menu if the user has defined some options
     * @param $options user option for menu settings
     */
    protected function getOptions($options)
    {
        foreach ($options as $k => $v) {
            if(property_exists($this, $k)){
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
        if (!$this->menuHtml){
            $this->data = App::$app->getProperty('cats');
            if (!$this->data){
                $this->data =  R::getAssoc("SELECT * FROM {$this->table}");
            }

        }
        $this->output();
    }

    protected  function output(){
        echo $this->menuHtml;
    }

    

}