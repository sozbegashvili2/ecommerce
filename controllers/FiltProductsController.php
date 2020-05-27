<?php
namespace app\controllers;
class FiltProductsController
{
    public function filt(\app\Router $router){
        return $router->renderView('filtered-products');
    }

}