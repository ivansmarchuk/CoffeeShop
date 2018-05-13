<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 12.05.2018
 */

namespace app\controllers\admin;


use app\models\User;

class UserController extends AppController
{
    /**
     * use for view the ligin page on admin
     */
    public function loginAdminAction(){
        if(!empty($_POST)){
            $user = new User();
            if(!$user->login(true)){
                $_SESSION['error'] = 'Login/Passwort ist falsch';
            }
            if(User::isAdmin()){
                redirect(ADMIN);
            }else{
                redirect();
            }
        }
       $this->layout = 'login';
    }
}