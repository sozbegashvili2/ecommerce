<?php
namespace app\controllers;
use app\Request;
use app\Router;

class HomeController
{
public function index(\app\Router $router){
return $router->getViewContent('index');
}

}