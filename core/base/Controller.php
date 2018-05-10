<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 14:02
 */

namespace coffeeshop\base;


abstract class Controller
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    public function __construct($route){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function getView(){
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    /**
     * @param array $data
     */
    public function set($data)
    {
        $this->data = $data;
    }

    /**
     * @param array $meta
     */
    public function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;

    }

    /**
     * checks which request came in: asynchronous or not
     * @return bool true, false
     */
    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    /**
     * @param $view to be uploaded
     * @param array $vars
     */
    public function loadView($view, $vars = []){
        extract($vars);
        require APP . "/views/{$this->prefix}{$this->controller}/{$view}.php";
        die;
    }
}