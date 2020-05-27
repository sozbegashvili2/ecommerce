<?php
namespace app\controllers;
use app\Request;
use app\Router;

class LoginController
{
    public function login(\app\Router $router){
        return $router->renderView('login');
    }
    public function postLogin(Router $router,Request $request) {
        $errors = [];
        $data = $request->getBody();
        foreach ($data as $key => $value) {
            if ($value === '') $errors[$key] = 'Please fill all fields';
        }
        return $router->renderView('login',[
            'errors' => $errors,
            'data' => $data,
            'router'=> $router]);
    }
}