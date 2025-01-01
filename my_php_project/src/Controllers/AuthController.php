<?php
if(isset($_POST["submit"]))
{
    $name  = $_POST["name"];
    $email  = $_POST["email"];
    $password  = $_POST["password"];

    include __DIR__ . '/../Classes/User.php';
    include __DIR__ . '/../Classes/User.php';

    $User = new Users($name, $email, $password)




}

?>