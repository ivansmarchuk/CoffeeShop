<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 12.05.2018
 */

namespace app\controllers\admin;


use app\models\AppModel;
use app\models\User;
use coffeeshop\base\Controller;

class AppController extends Controller
{
    public $layout = 'admin';

    public function __construct($route){
        parent::__construct($route);
        if(!User::isAdmin() && $route['action'] != 'login-admin'){
            redirect(ADMIN . '/user/login-admin'); // UserController::loginAdminAction
        }
        new AppModel();
    }

    /**
     * @param bool $get
     * @param string $id
     * @return int|null|string
     * @throws \Exception
     */
    public function getRequestID($get = true, $id = 'id'){
        if($get){
            $data = $_GET;
        }else{
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if(!$id){
            throw new \Exception('Seite nicht gefunden!', 404);
        }
        return $id;
    }
}