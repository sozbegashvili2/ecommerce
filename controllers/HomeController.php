<?php
namespace app\controllers;
use app\Request;
use app\Router;

class HomeController
{
    public function index(\app\Router $router)
    {
        return $router->renderView('index');
    }

    public function verification(Router $router, Request $request)
    {
        return $router->renderContent('verification');
    }

    public function redirect(Router $router, Request $request)
    {
        return $router->renderContent('404');
    }

}