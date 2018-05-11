<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 08.05.2018
 */

namespace app\models;


use coffeeshop\App;

class Breadcrumbs
{
    /**
     * generates a HMTL strings for navigated panes
     * @param $category_id category id from database
     * @param string $name currendly product name
     * @return string HTML string
     */
    public static function getBreadcrumbs($category_id, $name = ''){
        $cats = App::$app->getProperty('cats');
        $breadcrumbs_array = self::getParts($cats, $category_id);
        $breadcrumbs = "<li><a href='" . PATH . "'>Startseite</a></li>";
        if($breadcrumbs_array){
            foreach($breadcrumbs_array as $alias => $title){
                $breadcrumbs .= "<li><a href='" . PATH . "/category/{$alias}'>{$title}</a></li>";
            }
        }
        if($name){
            $breadcrumbs .= "<li><a>$name</a></li>";
        }
        return $breadcrumbs;
    }

    /**
     * Gets all elements from category table for creating navigated panels if categories have nested elements
     * @param $cats category from database
     * @param $id id catefory
     * @return array|bool array of all elements of category
     */
    public static function getParts($cats, $id){
        if(!$id) return false;
        $breadcrumbs = [];
        foreach($cats as $k => $v){
            if(isset($cats[$id])){
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            }else break;
        }
        return array_reverse($breadcrumbs, true);
    }
}