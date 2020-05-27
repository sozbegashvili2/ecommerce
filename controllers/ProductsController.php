<?php
namespace app\controllers;
class ProductsController
{
    public function products(\app\Router $router){
        return $router->getViewContent('products');
    }

}