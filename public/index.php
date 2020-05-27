<?php
session_start();
require_once __DIR__.'/../vendor/autoload.php';
use app\{Router,Request};
use app\controllers\{VerificationController,FiltProductsController,ProductsController,CheckoutController,CartController,WishlistController,RegisterController,HomeController,AboutController,ContactController,LoginController};
$conn = new \app\db\Database();
$router = new Router(new Request(),$conn);
$router->get('/',[HomeController::class,'index']);
$router->get('/login',[LoginController::class,'login']);
$router->get('/register',[RegisterController::class,'register']);
$router->get('/wishlist',[WishlistController::class,'wishlist']);
$router->get('/cart',[CartController::class,'cart']);
$router->get('/checkout',[CheckoutController::class,'checkout']);
$router->get('/products',[ProductsController::class,'products']);
$router->get('/filtproducts',[FiltProductsController::class,'filt']);
$router->post('/register',[RegisterController::class,'postRegister']);
$router->get('/verification',[HomeController::class,'verification']);
$router->get('/verify',[VerificationController::class,'verify']);
$router->post('/login',[LoginController::class,'postLogin']);