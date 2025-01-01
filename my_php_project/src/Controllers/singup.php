<?php
require __DIR__ . '/../Config/dbConction.php';

class SignUp extends Db {
 protected function setUser($name, $email, $password){
    $stmt =$this -> connect()->qurye('SELECT * FROM users WHERE id = ? OR email = ?.' );
    if(!$stmt->execute(arra($email))){
        $stmt=null;
        header("location:../singUp.php?error=stemtfailed");
        exit();
    }
    $resultcheck;
    if($stmt->rowCount()>0){
        $resultcheck =false;

    }else{
        $resultcheck =true;

    }
    return $resultcheck;
 }
}
?>