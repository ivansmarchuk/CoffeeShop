<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 22:48
 */

namespace app\models;


class User extends AppModel
{
    public $attributes = [
     'login' => '',
     'password' => '',
     'name' => '',
     'email' => '',
     'address' => '',
     'role' => 'user',
    ];
}