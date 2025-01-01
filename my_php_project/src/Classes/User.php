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

}

?>