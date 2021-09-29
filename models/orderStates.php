<?php

class OrderStates{

    private $id;
    private $stateName;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setStateName($stateName){
        $this->stateName = $this->db->real_escape_string($stateName);
    }

    public function getId(){
        return $this->id;
    }
    public function getStateName(){
        return $this->stateName;
    }

    public function getAll(){
        $query = "SELECT * FROM OrderStates ORDER BY Id;";
        $orderStates = $this->db->query($query);

        return $orderStates;
    }

    public function getOne(){
        $query = "SELECT * FROM OrderStates WHERE Id = $this->id;";
        $orderState = $this->db->query($query);
        
        return $orderState->fetch_object();
    }
}


