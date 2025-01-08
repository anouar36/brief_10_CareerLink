<?php
namespace App\Classes;


use App\Config\Database ;
use App\Classes\User;
use PDO;

class Admin {
    private $id;
  

    public function __construct($id) {
        $this->id=$id;
        $db = new Database();
        $this->conn = $db->connection();
    }

    public function getId(){
        return $this->id;
    }  

    public function checkIdAdmin() {
        $userId = new User();
        $idUser = $userId->getId();
        $sql = "SELECT * FROM Admin WHERE id_user = :idUser";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        } else {
            return   new Admin($row['id']) ;
        }
    }


}



