<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 22:48
 */

namespace app\models;


use RedBeanPHP\R;

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
    /**
     * @var array $rules for module valitron
     */
    public $rules = [
      'required' =>[
          ['login'],
          ['password'],
          ['name'],
          ['email'],
          ['address'],
      ],
        'email' => [
            ['email'],
        ],

        'lengthMin' =>[
            ['password', 6],
        ]

    ];

    /**
     * search in DB the user if user has been registered
     */
    public function checkUnique(){
        $user = R::findOne('user', 'login = ? OR email = ?',
            [$this->attributes['login'], $this->attributes['email']]);
        if($user){
            if($user->login == $this->attributes['login']){
                $this->errors['unique'][] = 'Das angegebene Konto ist bereits vorhanden';
            }
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'Das angegebene E-Mail ist bereits vorhanden';
            }
            return false;
        }
        return true;
    }

}