<?php
namespace app\controllers;
class LoginController
{
    public function login(\app\Router $router){
        return $router->renderView('login');
    }

}