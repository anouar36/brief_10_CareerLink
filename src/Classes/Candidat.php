<?php
 session_start();


 if (isset($_SESSION['User'])) {
   echo "<pre>";
   print_r($_SESSION['User']['id']); // 
   echo "</pre>";
 } else {
   echo "no data";
 }

class Candidat {
    private $id
    private $skills ;
    private $deplome ;
    private $user_id ;

    public function __costructe($id, $skills, $deplome, $user_id){
        $this->id->$id;
        $this->skills->$skills;
        $this->deplome->$deplome;
        $this->user_id ->$user_id ;
    }

    public function getId(){ return $this->id; }
    public function getSkills(){ return $this->skills; }
    public function getDeplome(){ return $this->Deplome; }
    public function getUser_id(){ return $this->user_id; }



    public function checkIdOfTheCandidt(){
        sql 'SELECT candidats.skills ,candidats.id,candidats.deplome, candidats.user_id FROM users INNER JOIN candidats on users.id = candidats.user_id WHERE users.id=:id;';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$id){
            return null;
        }else{

            return   new Candidat($row['candidats.id'], $row['candidats.skills'], $row['candidats.deplome'], $row['candidats.user_id']) ;
        }
} 
}
?>