<?php

class category{
    private $id;
    private $name;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
 
    function setId($id){
        $this->id = $this->db->real_escape_string($id);
    }
    function setName($name){
        $this->name = $this->db->real_escape_string($name);
    }

    public function getAll(){
        $query = 'SELECT * FROM Categories;';
        $categories = $this->db->query($query);
        return $categories;
    }

    public function getOne(){
        $query = "SELECT * FROM Categories WHERE Id = {$this->getId()};";
        $category = $this->db->query($query);
        
        $result = false;
        if($category){
            $result = $category->fetch_object();
        }
        return $result;
    }



    public function save(){
        $query = "INSERT INTO Categories VALUES (null, '{$this->getName()}');";
        $save = $this->db->query($query);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

}