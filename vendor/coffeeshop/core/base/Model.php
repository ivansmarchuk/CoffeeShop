<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 15:47
 */

namespace coffeeshop\base;


use coffeeshop\Db;
use Valitron\Validator;


abstract class Model {

    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        Db::instance();
    }

    /** load data from register form
     * @param $data  all data from register form
     */
    public function load($data){
        foreach ($this->attributes as $name => $value){
            if(isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    /**
     * function for valitate form input data using valitron
     * @param $data
     */
    public function validate($data){
        Validator::lang('de');
        $v = new Validator($data);
        $v->rules($this->rules);
        if ($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    /**
     * For handllig validation errors -> get this error for user on template
     */
    public function getErrors(){
        $errors = '<ul>';
        foreach ($this->errors as $error){
            foreach ($error as $item){
                $errors .="<li>$item</li>";
            }
        }
        $errors .='</ul>';
        $_SESSION['error'] = $errors;
    }
}