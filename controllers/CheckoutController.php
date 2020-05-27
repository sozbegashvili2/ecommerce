<?php
namespace app\controllers;
class CheckoutController
{
    public function checkout(\app\Router $router){
        return $router->getViewContent('checkout');
    }

}