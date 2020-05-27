<?php
namespace app\controllers;
class WishlistController
{
    public function wishlist(\app\Router $router){
        return $router->renderView('wishlist');
    }

}