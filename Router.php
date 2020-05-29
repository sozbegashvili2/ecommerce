<?php
namespace app;
use app\db\Database;

class Router
{
    private $getRoutes = [];
    private $postRoutes = [];
    public $database = null;
    public $request = null;
    public $layout = 'layout';
    public function __construct(Request $request,Database $database)
    {
        $this->request = $request;
        $this->database = $database;
    }

    public function get($path,$callback) {
        $this->getRoutes[$path] = $callback;
    }
    public function post($path,$callback) {
        $this->postRoutes[$path] = $callback;
    }

    public function __destruct()
    {
        $pathInfo = $this->request->getPath();;
        if ($this->request->getMethod() === 'GET') {
            $check = $this->getRoutes[$pathInfo] ?? false;
        }
        else
        {
            $check = $this->postRoutes[$pathInfo] ?? false;
        }
        if(!$check) {
            $content = '404 - Page not found';
        }
        else
        {

           if (is_string($check)) {
                $content = $this->getViewContent($check);
               require_once __DIR__.'/views/layout.php';
           }
           else
           {
              echo $content = call_user_func($check,$this,$this->request);
           }
        }

    }
    public function renderView(string $view, $params = [])
    {
        ob_start();
        $content = $this->getViewContent($view, $params);
        include_once __DIR__."/views/{$this->layout}.php";
        return ob_get_clean();
    }

    public function renderContent(string $content)
    {
        ob_start();
        include_once __DIR__."/views/{$content}.php";
        return ob_get_clean();
    }
    public function addToCart($btn) {
        $cart_item = array(
            'id' =>$btn['id'],
            'name'=>$btn['name'],
            'price' => $btn['price'],
            'quantity' => $btn['quantity'],
            'image' => $btn['image']
        );
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if (array_key_exists($btn['id'],$_SESSION['cart'])) {
            echo '<script>alert("The item is already in cart")</script>';
        }
        else {
            $_SESSION['cart'][$btn['id']] = $cart_item;
            echo '<script>alert("The item has added to cart")</script>';
        }
    }
    public function getViewContent($check,$params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once "views/$check.php";
        return ob_get_clean();
    }
}