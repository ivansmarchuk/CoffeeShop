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


    /**
     * authorizes users on the site. All information except the password is taken from the database.
     * @param bool $isAdmin for adminPanel(future task)
     * @return bool is authorized
     */
    public function login($isAdmin = false){
        $login  = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password  = !empty(trim($_POST['login'])) ? trim($_POST['password']) : null;
        if($login && $password){
            if($isAdmin){
                $user = R::findOne('user', "login = ? AND role = 'admin'", [$login]);

            }else{
                $user = R::findOne('user', "login = ? ", [$login]);
            }
            if ($user){
                if(password_verify($password, $user->password)){
                    foreach ($user as $k => $v){
                        if($k != 'password')  $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }
}