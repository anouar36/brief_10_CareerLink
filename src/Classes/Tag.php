<?php
namespace App\Classes;


use App\Config\Database ;
use App\Classes\User;
use PDO;

class Tag {
    
       private  $nameTag;
       private  $conn;
  

    public function __construct($nameTag){
        $this->nameTag=$nameTag;
        
        $db = new Database();
        $this->conn = $db->connection();
    }
    public function getNameTag(){
         return $this->nameTag;
    }
    

    // public function checkIdAdmin() {
    //     $userId = new Admin();
    //     $idAdmin = $AdminId->getId();
    //     $sql = "SELECT * FROM Admin WHERE id_user = :idUser";

    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //     print_r($row);
    //     exit();
    // }


    public function insertTage($value){
        $sql = "INSERT INTO tags (tag_name) VALUES(:value)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':value',$value);
        $result = $stmt->execute();

        if($result== true){
         echo 'data is add successfully  ';
        }else{
         echo 'data is not add successfully ';
        }
    }

    public function showTag(){
        $sql = "SELECT * FROM tags";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
            $tages = [];
            foreach ($result as $row) {
            $tages[] = new Tag();
            }
            return $tages;
        }else{
             echo 'nothiks to desplay';
        }
    }
    public function modification($id, $nameTag){
        $sql = "UPDATE tags SET tag_name = '$nameTag' WHERE tags.id =$id;";
        $stmt = $this->conn->prepare($sql);
        $result =$stmt->execute();
    }

    public function afichgeOneTage($id){
        $sql = "SELECT tag_name FROM tags WHERE tags.id = $id;";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
            }
            return $tages;
    }
    public function Delete($idDel){
        $sql = "DELETE FROM tags WHERE tags.id =$idDel ";
        $stmt = $this->conn->prepare($sql);
        $result =$stmt->execute();
    }


    



}




