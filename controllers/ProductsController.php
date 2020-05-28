<?php
namespace app\controllers;
use app\Request;

class ProductsController
{
    public function products(\app\Router $router,Request $request){
        $id = $request->getBody() ?? false;
        if ($id) {
            try {
                $router->database->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $statement = $router->database->pdo->prepare("SELECT * FROM products WHERE id = :ide");
                $statement->bindParam(':ide',$id['id']);
                $statement->execute();
                $res = $statement->fetch();
                if ($res) {
                    return $router->renderView('products',[
                        'result' => $res
                    ]);
                }
                else
                {
                    return $router->renderView('products',[
                        'result' => false
                    ]);
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
            return $router->renderContent('404');
    }

}