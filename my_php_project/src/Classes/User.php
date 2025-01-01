<?php
class Users {
    protected $name ;
    protected $email ;
    protected $password;
    protected $role;


    public function setName($name){
        $this->name=$name;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function setRool($role){
        $this->role=$role;
    }

    public function getName($name){
       return $this->name;
    }
    public function getEmail($email){
        return $this->email;
    }
    public function getPassword($password){
        return $this->password;
    }
    public function getRool($role){
        return $this->role;
    }

    public function __construct($name, $email, $password){
        $this->$name = $name ;
        $this->$password = $password ;
        $this->$email = $email ;
    }
    private function User(){
        if($this->emptyInput()== false){
            header("location:../singUp.php?error=emptyinput");
            exit();
        }
        if($this->invalidname()== false){
            header("location:../singUp.php?error=name");
            exit();
        }
        if($this->invalidpass()== false){
            header("location:../singUp.php?error=password");
            exit();
        }
    }

    private function emptyInput(){
        $result;
        if(empty($this->$name) || empty($this->$email) || empty($this->$password)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }



}

?>