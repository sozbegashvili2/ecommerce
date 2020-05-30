<?php
namespace app\controllers;
use app\Request;
use app\Router;

class AddProductController
{
public function addProduct(Router $router,Request $request) {
$data = $request->getBody() ?? [];
$file = $_FILES['fileToUpload'];
if ($file['size'] == 0) {
    $message = "No file was selected";
    return $router->renderView('add',[
        'message' => $message,
        'data' => $data
    ]);
}
else
    if ($data) {
        $target_dir = "C:/xampp/htdocs/project/public/img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $message = "file is not an image";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $message = "Too large file";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return header("Location:/404");
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $image = 'img/'.$_FILES['fileToUpload']['name'];
                return $router->database->addProductToDatabase($data,$image);
            } else {
                return header("Location:/404");
            }
        }
    }



}

}