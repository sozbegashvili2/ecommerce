<?php
namespace app\controllers;
use app\Request;
use app\Router;

class CheckoutController
{
    public function checkout(\app\Router $router){
        return $router->renderView('checkout');
    }
    public function postCheckout(Router $router,Request $request) {
        $data = $request->getBody();
        unset($_SESSION['cart']);
        return header("Location:/");
    }

}