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
}