<?php

namespace App\Controllers\Auth;


use App\Classes\User;
use App\Config\Database;
use PDO;


ob_start();
class AuthLogin {


    public function login($email, $password){
        
        $user = new User('' ,$email,$password,'');

        $UserDIR = $user->chekerLogin();

        if($UserDIR==null){
            echo 'This user is not found';
           
        }else{
            if($user->getrolle() == "Administrateur"){
                header("Location: ../admin/admin.php");

            }else if ($user->getrolle() == "Recruteur") {
                header("Location: ../recruiter/recruiter.php");

            }else if($user->getrolle() == "Candidat"){
                header("Location: ../candidate/candidate.php");
            }
        }
        ob_end_flush();
    }
}

?>

