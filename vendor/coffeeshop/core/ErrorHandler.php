<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 27.03.2018
 */

namespace coffeeshop;


class ErrorHandler
{

    /**
     * ErrorHandler constructor.
     */
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    /**
     * Exception handler
     * @param $e Exception
     */
    public function exceptionHandler($e){
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    /**
     * @param string $message Error message
     * @param string $file the file where the error occurred
     * @param string $line the line where the error occurred
     */
    protected function logErrors($message = '', $file = '', $line = ''){
        error_log("[" . date('Y-m-d H:i:s') . "] Fehlertext:  {$message} | File: {$file} | Line: {$line} \n===================\n",
            3, ROOT . '/tmp/errors.log');

    }

    /**
     *displays error for user, in develop or product modes
     */
    protected function displayError($errno, $errstr, $errfile, $errline, $responce = 404){
        http_response_code($responce);
        if($responce == 404 && !DEBUG){
            require WWW . '/errors/404.php';
            die;
        }
        if (DEBUG){
            require WWW . '/errors/dev.php';
        }else{
            require WWW . '/errors/prod.php';

        }

    }
}