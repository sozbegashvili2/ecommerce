<?php
namespace app\controllers;

use app\Request;
use app\Router;

class RegisterController
{
    public function register(\app\Router $router) {
            return $router->renderView('register');
    }
    public function postRegister(Router $router,Request $request) {
        $data = $request->getBody();
        $errors = [];
        foreach ($data as $key => $value) {
            if($value == '') $errors[$key] = 'Please Fill This Field';
        }
        return $router->renderView('register',[
            'errors' => $errors,
            'data' => $data,
            'router'=> $router]);
    }
}
