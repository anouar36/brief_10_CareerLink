<?php
namespace App\Classes;

use App\Config\Database;
use PDO;

class Candidat {
    private $id;
    private $skills ;
    private $deplome ;
    private $user_id ;
    private $conn;

    public function __construct($id, $skills, $deplome, $user_id){
        $this->id=$id;
        $this->skills=$skills;
        $this->deplome=$deplome;
        $this->user_id=$user_id ;

        $db = new Database();
        $this->conn = $db->connection();
    }

    public function getId(){ return $this->id; }
    public function getSkills(){ return $this->skills; }
    public function getDeplome(){ return $this->Deplome; }
    public function getUser_id(){ return $this->user_id; }



    public function checkIdOfTheCandidt($id){
        $sql = 'SELECT candidats.skills ,candidats.id,candidats.deplome, candidats.user_id FROM users INNER JOIN candidats on users.id = candidats.user_id WHERE users.id=:id;';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$id){
            return null;
        }else{
            return new Candidat($row['id'], $row['skills'], $row['deplome'], $row['user_id']);
        }
} 
}
?>