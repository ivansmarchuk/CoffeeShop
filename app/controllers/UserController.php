<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 22:46
 */

namespace app\controllers;


use app\models\User;

class UserController extends AppController
{
    /**
     * action for form validation and add user in db
     */
    public function signupAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if ($user->save('user')) {
                    $_SESSION['success'] = 'Sie wurden erfolgreich registriert...';
                } else {
                    $_SESSION['error'] = 'Fehler';
                }
            }
            redirect();
        }
        $this->setMeta('Registrieren');

    }

    public function loginAction()
    {

    }

    public function logoutAction()
    {

    }

}