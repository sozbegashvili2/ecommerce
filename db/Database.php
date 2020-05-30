<?php
namespace app\db;

class Database
{
    /**
     * @var \PDO
     */
    public $pdo;

    public function __construct()
    {
        require_once __DIR__ . '/../config.php';

        $servername = $config['host'];
        $username = $config['username'];
        $password = $config['password'];
        $database = $config['database'];
        $this->pdo = new \PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
    }
    public function register($data) {
        $result = $this->check($data['email']);
        if (!$result){
            $password = password_hash($data['password'],PASSWORD_BCRYPT);
            $vkey = md5(time().$data['lastName']);
            $verified = 0;
            $stmt = $this->pdo->prepare("  INSERT INTO users (firstName, lastName, email,password,verKey,verified)
        VALUES (:firstname,:lastname,:email,:password,:verkey,:verified)");
            $stmt->bindValue(':firstname',$data['firstName']);
            $stmt->bindValue(':lastname',$data['lastName']);
            $stmt->bindValue(':email',$data['email']);
            $stmt->bindValue(':password',$password);
            $stmt->bindValue(':verkey',$vkey);
            $stmt->bindValue(':verified',$verified);
            $stmt->execute();
            return $vkey;
        }
        else return false;
    }
    public function check($email) {
        $statement = $this->pdo->prepare("SELECT * from users WHERE email = :email");
        $statement->bindValue(':email',$email);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }
    public function addProductToDatabase($data,$image) {
        try {
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $statement = $this->pdo->prepare("INSERT INTO 
products(productName,productPrice,productQuantity,productDesc,productImg,brandId,categoryId)
VALUES (:proname,:price,:quantity,:prodesc,:img,:brand,:category)");
            $statement->bindValue(':proname',$data['proname']);
            $statement->bindValue(':price',$data['proprice']);
            $statement->bindValue(':quantity',$data['proquantity']);
            $statement->bindValue(':prodesc',$data['descript']);
            $statement->bindValue(':img',$image);
            $statement->bindValue(':brand',$data['brand']);
            $statement->bindValue(':category',$data['category']);
            $statement->execute();
            echo "<script>alert('Product added succesfully')</script>";
            header('Location:/');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}