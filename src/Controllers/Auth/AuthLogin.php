<?php
namespace App\Controllers\Auth;
session_start();


use App\Classes\Candidat;
use App\Classes\User;
use App\Config\Database;
use PDO;


ob_start();
class AuthLogin {

    
      public function login($email, $password){
        $user = new User($id,'' ,$email,$password,'');
        $UserDIR = $user->chekerLogin();

        

        if($UserDIR instanceof User){
            $this->createUserSession($UserDIR);
            $this->redirecte($UserDIR);
            print_r($UserDIR);
        }else{
            echo 'This user is not found';
        }
    }



    public function redirecte($UserDIR){
        if($UserDIR->getrolle() == "Administrateur"){
             header("Location: ../admin/admin.php");

        }else if ($UserDIR->getrolle() == "Recruteur") {
            header("Location: ../recruiter/recruiter.php");

         }else if($UserDIR->getrolle() == "Candidat"){
                header("Location: ../candidate/candidate.php");
         }
         
    }
        

    public function createUserSession($UserDIR){
        $_SESSION['User'] = [
            'name' => $UserDIR->getName(),
            'email' => $UserDIR->getEmail(),
            'rolle' => $UserDIR->getrolle(), 
            'id' => $UserDIR->getId(), 
        ];
        print_r($_SESSION['User']);
    }


   
    }


 

    
   
    


    


?>

