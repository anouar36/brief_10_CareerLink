<?php
namespace App\Config;
require_once "../../vendor/autoload.php";
USE App\View;
USE Dotenv\Dotenv;

USE PDO;
USE PDOException;

class db{
   private $conn;

   public function conection(){
      $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
      $dotenv->load();
      try{
         $this->conn = new PDO("mysql:host=" . $_ENV['HOST'] . ";dbname=" . $_ENV['NAME_DATA'], $_ENV['USER_NAME'], $_ENV['PASSWORD']);
         echo('Connection successful');
      }catch(PDOException $e){
         die('Connection failed: ' . $e->getMessage());  // Correct method name
      }
   }
}


?>