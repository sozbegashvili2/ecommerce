<?php
namespace app\controllers;
class CartController
{
    public function cart(\app\Router $router){
        return $router->getViewContent('cart');
    }

}