<?php
namespace App\Config;

use PDO;
use PDOException;

class Database{
   private $conn;
   public function connection(){
      
      try{
         $this->conn = new PDO("mysql:host=172.16.11.162;dbname=CareerLink",'root' , 'anwar36flow');
         return $this->conn;
      }catch(PDOException $e){
         die('Connection failed: ' . $e->getMessage());  // Correct method name
      }
   }
}


?>