<?php
namespace App\Controllers\Auth;

use App\Config\Database;
use PDO;
class authoffer{


    private $nom;
    private $email;
    private $skills;
    private $conn;



    public function __construct(){
        $db = new Database();
       $this->conn = $db->connection();
    }

    public function displayOffer(){
        $sql = "SELECT * FROM `offres` ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
        if($result){
            return $result;

            // $offers = [];
            // foreach ($result as  $row) {
                
            //     $offers[] = new Offer();
            // }

            // return $offers;
        }else{
            echo'nothiks to desplay';
        }
    }

    

}

?>