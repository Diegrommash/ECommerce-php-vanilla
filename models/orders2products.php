<?php

class Orders2Products{
    private $id;
    private $orderId;
    private $productId;
    private $quantity;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setOrderId($orderId){
        $this->orderId = $orderId;
    }
    public function setProductId($productId){
        $this->productId = $productId;
    }
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
        
    public function getId(){
        return $this->id;
    }
    public function getOrderId(){
        return $this->orderId;
    }
    public function getProductId(){
        return $this->productId;
    }
    public function getQuantity(){
        return $this->quantity;
    }

    public function save($orderId){
       
        foreach($_SESSION['cart'] as $element){
            $productId = $element['product']->Id;
            $quantity = $element['quantity'];

            $query = "INSERT INTO Orders2Products VALUES (null, {$orderId}, {$productId}, {$quantity});";
            $save = $this->db->query($query);

        }
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    
}