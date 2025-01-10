<?php
namespace App\Controllers\Admin;

use App\Classes\Admin;
use App\Classes\Tag;
use App\Config\Database;
use PDO;

class TagController
{
    public function checkingTag($nameTag){  
        $insertTag = new Tag('');
        $result = $insertTag->insertTage($nameTag);

        if ($result == true) {
            header('Location:/src/Views/admin/viewsTag.php');
            return true;
        } else {
            echo ' Not Add Tage Successfully';
            return false;
        }
    }

    public function desplayTag(){
        $insertTag = new Tag('');
        $result = $insertTag->showTag();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }


    public function  checkeModife($id, $nameTag){
        $modife= new Tag('');
        $modife->modification($id, $nameTag); 
        $result =$modife->modification($id, $nameTag); 
    }

    public function dsplayinInputModifi($id){
        $modife= new Tag('');
         $result= $modife->afichgeOneTage($id);
         if($result){
            return  $result;
         }else{
            return false;
         }
    }

    public function checkDelet($idDel){
        $delet= new Tag('');
        $result= $delet->deletTag($idDel);

    }
}

?>