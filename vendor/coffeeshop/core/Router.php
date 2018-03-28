<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 01:01
 */

namespace coffeeshop;


class Router
{

    protected static $routes = [];
    protected static $route = [];


    public static function add($reqexp, $route = [])
    {
        self::$routes[$reqexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * @param $url with matchRoute : if true from matchRoute - get controller, else 404
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Method $controller::$action is not found", 404);
                }

            } else {
                throw new \Exception("Conntroller $controller is not found", 404);
            }

        } else {
            throw new \Exception("Page not found", 404);
        }

    }

    /**
     * @param $url
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }


    /**
     * converts from camel-case, or camel to CamelCase format
     * @return CamelCase format
     */
    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));

    }

    /**
     * @return camelCase format
     */
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }


    protected static function removeQueryString($url){
        if($url){
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }
            else{
                return '';
            }
        }
    }
}