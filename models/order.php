<?php

class Order{

    private $id;
    private $userId;
    private $province;
    private $location;
    private $direction;
    private $cost;
    private $orderState;
    private $orderDate;
    private $orderTime;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setUserId($userId){
        $this->userId = $userId;
    }
    public function setProvince($province){
        $this->province = $this->db->real_escape_string($province);
    }
    public function setLocation($location){
        $this->location = $this->db->real_escape_string($location);
    }
    public function setDirection($direction){
        $this->direction = $this->db->real_escape_string($direction);
    }
    public function setCost($cost){
        $this->cost = $this->db->real_escape_string($cost);
    }
    public function setOrderState($orderState){
        $this->orderState = $this->db->real_escape_string($orderState);
    }
    public function setOrderDate($orderDate){
        $this->orderDate = $this->db->real_escape_string($orderDate);
    }
    public function setOrderTime($orderTime){
        $this->orderTime = $this->db->real_escape_string($orderTime);
    }

    public function getId(){
        return $this->id;
    }
    public function getUserId(){
        return $this->userId;
    }
    public function getProvince(){
        return $this->province;
    }
    public function getLocation(){
        return $this->location;
    }
    public function getDirection(){
        return $this->direction;
    }
    public function getCost(){
        return $this->cost;
    }
    public function getOrderState(){
        return $this->orderState;
    }
    public function getOrderDate(){
        return $this->orderDate;
    }
    public function getOrderTime(){
        return $this->orderTime;
    }

    public function save(){
        $query = "INSERT INTO Orders VALUES(null, {$this->userId}, '{$this->province}', '{$this->location}', '{$this->direction}', {$this->cost}, 'confirm', CURDATE(), CURTIME());";
        $save = $this->db->query($query);

        $result = false;
		if($save){
            $query = "SELECT LAST_INSERT_ID() AS 'order' FROM Orders;";
            $queryOrderId = $this->db->query($query);
            $orderId = $queryOrderId->fetch_object()->order;

			$result = $orderId;
		}
		return $result;
    }

    public function edit(){
        $query = "UPDATE Orders SET OrderState = '{$this->orserState}' WHERE Id = $this->id";
        $save = $this->db->query($query);

        $result = false;
		if($save){
			$result = true;
		}
		return $result;
    }

    public function getAll(){
        $query = "SELECT * FROM Orders ORDER BY DESC;";
        $queryOrders = $this->db->query($query);

        return $queryOrders;
    }

    public function getOne(){
        $query = "SELECT * FROM Orders WHERE Id = {$this->id};";
        $queryOrder = $this->db->query($query);
        $order = $queryOrder->fetch_object();
        return $order;
    }

    public function getLastByUser(){
        $query = "SELECT * FROM Orders WHERE UserId = {$this->userId} ORDER BY Id DESC LIMIT 1;";
        $queryOrder = $this->db->query($query);
        $order = $queryOrder->fetch_object();

        /*var_dump($query);
        echo '<br>';
        echo '-----------------';
        echo '<br>';
        var_dump($queryOrder);
        echo '<br>';
        echo '-----------------';
        echo '<br>';
        var_dump($order);
        echo '<br>';
        echo '-----------------';
        echo '<br>';
        echo $this->db->error;
        echo '<br>';
        echo '-----------------';
        echo '<br>';
        die();*/

        return $order;
    }

    public function getAllByUser(){
        $query = "SELECT * FROM Orders WHERE UserId = {$this->userId} ORDER BY Id;";
        $queryOrder = $this->db->query($query);

        return $queryOrder;
    }

    public function getProductsByOrder($id){
        $query = "SELECT p.*, op.Quantity FROM Products p"
                    ." INNER JOIN Orders2Products op ON p.Id = op.ProductId"
                    ." WHERE op.OrderId = {$id};";
        $queryProducts = $this->db->query($query);

        /*var_dump($query);
        echo '<br>';
        echo '-----------------';
        echo '<br>';
        var_dump($queryProducts);
        echo '<br>';
        echo '-----------------';
        echo '<br>';
        echo $this->db->error;
        die();*/

        return $queryProducts;
    }

    
}