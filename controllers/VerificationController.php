<?php
namespace app\controllers;
use app\Request;
use app\Router;

class VerificationController
{
public function verify(Router $router,Request $request) {
$data = $request->getBody();

    if(isset($data['vkey'])) {
        $stm = $router->database->pdo->prepare("SELECT verKey,verified FROM users WHERE verKey = :verkey");
        $stm->bindValue(':verkey',$data['vkey']);
        $stm->execute();
        $result = $stm->fetch();
        if ($result and $result['verified'] == 0) {
            $stm = $router->database->pdo->prepare("UPDATE users SET verified = 1 WHERE verKey = :verkey");
            $stm->bindValue(':verkey',$data['vkey']);
            $stm->execute();
          return $router->renderContent('verify');
        }

    }
}
}