<?php

class Db {
    private $dbhost = "192.168.1.158";
    private $dbName  = "root";
    private $dbPass  = "root_password";
    private $dbData  = "CareerLink";

    public function __construct (){
        try{
            $conn = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbData, $this->dbName,$this->dbPass);

            echo 'anouar conction is good' ;

        }catch(PDOException $e){
            die('anwar connection is not good'.$e->getMessage());

        }
    }
}






