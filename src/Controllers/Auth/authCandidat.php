<?php
namespace App\Controllers\Auth;

use App\Config\Database;
use PDO;
class authCandidat{


    private $nom;
    private $email;
    private $skills;
    private $conn;



    public function __construct(){
        $db = new Database();
       $this->conn = $db->connection();
    }

    public function displayRow(){
        $sql = "SELECT users.name , users.email , candidats.skills, candidats.deplome, users.role
                FROM users
                 INNER JOIN candidats 
                  ON users.id=candidats.user_id;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($result){
            return $result;

        }else{
            echo'nothiks to desplay';
        }
    }

    

}

?>