<?php
namespace App\Classes;

use App\Config\Database;
use PDO;

class User {
    private $name;
    private $email;
    private $password;
    private $rolle;
    private $id;
    private $conn;

    public function __construct($id, $name, $email, $password, $rolle) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->rolle = $rolle;

        $db = new Database();
        $this->conn = $db->connection();
    }

    public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setEmail($email) { $this->email = $email; }
    public function setrolle($rolle) { $this->rolle = $rolle; }
    public function setPassword($password) { $this->password = $password; }


    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getrolle() { return $this->rolle; }
    public function getPassword() { return $this->password; }


    public function chekerLogin() {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        } else {
            $this->setrolle($row["role"]);
            return   new User($row['id'], $row['name'], $row['email'], $row['password'], $row['role']) ;
        }

    }

    

       
    }

    


?>