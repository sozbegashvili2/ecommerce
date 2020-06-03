<?php
namespace app\controllers;
use app\Request;

class FiltProductsController
{
    public function filt(\app\Router $router,Request $request){
        $filter = $request->getBody() ?? false;
            if (isset($filter['page'])) {
                $page = $filter['page'];
            }
            else
            {
                $page = 1;
            }
            $resultPerPage = 8;
            $currentPage = ($page-1)*$resultPerPage;
        if($filter) {
            if(isset($filter['product'])) {
                $stm = $router->database->pdo->prepare("SELECT * FROM products p WHERE p.categoryId IN (SELECT c.id from category c where c.categoryName = :ide)");
                $stm->bindValue(':ide',$filter['product']);
                $stm->execute();
                $result = $stm->rowCount();
                $numberOfPages = ceil($result/$resultPerPage);
                 $stm = $router->database->pdo->prepare("SELECT p.id,p.productName,p.productPrice,p.productQuantity,SUBSTR(p.productDesc, 1, 99) as productDes,p.productImg FROM products p WHERE p.categoryId IN (SELECT c.id from category c where c.categoryName = :ide) LIMIT $currentPage,$resultPerPage");
                $stm->bindValue(':ide',$filter['product']);
                 $stm->execute();
                 $res = $stm->fetchAll();
            }
            else if (isset($filter['brand'])) {
                $stm = $router->database->pdo->prepare("SELECT * FROM products p WHERE p.brandId in (SELECT b.id from brands b WHERE b.brandName = :brd)");
                $stm->bindValue(':brd',$filter['brand']);
                $stm->execute();
                $result = $stm->rowCount();
                $numberOfPages = ceil($result/$resultPerPage);
                $stm = $router->database->pdo->prepare("SELECT p.id,p.productName,p.productPrice,p.productQuantity,SUBSTR(p.productDesc, 1, 99) as productDes,p.productImg FROM products p WHERE p.brandId in (SELECT b.id from brands b WHERE b.brandName = :brd) LIMIT $currentPage,$resultPerPage");
                $stm->bindValue(':brd',$filter['brand']);
                $stm->execute();
                $res = $stm->fetchAll();
            }
        }
        return $router->renderView('filtered-products',[
            'result' => $res,
            'numberOfPages' => $numberOfPages,
            'page' => $page
        ]);
    }

}