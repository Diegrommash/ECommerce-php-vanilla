<?php

class user
{
    private $id;
    private $userName;
    private $userLastName;
    private $email;
    private $password;
    private $rol;
    private $image;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getUserName(){
        return $this->userName;
    }
    function getUserLastName(){
        return $this->userLastName;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
    function getRol(){
        return $this->rol;
    }
    function getImage(){
        return $this->image;
    }

    function setId($id){
        $this->id = $id;
    }
    function setUserName($userName){
        $this->userName = $this->db->real_escape_string($userName);
    }
    function setUserLastName($userLastName){
       $this->userLastName = $this->db->real_escape_string($userLastName);
    }
    function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }
    function setPassWord($password){
        $this->password = $this->db->real_escape_string($password);
    }
    function setRol($rol){
        $this->rol = $rol;
    }
    function setImage($image){
        $this->image = $image;
    }

    function save(){
        $passwordHash = password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 4]);
        
        $query = "INSERT INTO Users VALUES (null, '{$this->userName}', '{$this->userLastName}', '{$this->email}', '{$passwordHash}', 'user', null)";
        $save = $this->db->query($query);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;

        $sql = "SELECT * FROM Users WHERE Email = '{$email}'";
        $login = $this->db->query($sql);

        if($login && $login->num_rows == 1){
            $user = $login->fetch_object();

            $verify = password_verify($password, $user->Password);

            if($verify){
                $result = $user;
            }
        }
        return $result;
    }
    
    
}
