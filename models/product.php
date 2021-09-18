<?php 

class product{
    private $id;
    private $categoryId;
    private $productName;
    private $description;
    private $price;
    private $stock;
    private $offer;
    private $productDate;
    private $img;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function getCategoryId(){
        return $this->categoryId;
    }
    public function getProductName(){
        return $this->productName;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getOffer(){
        return $this->offer;
    }
    public function getProductDate(){
        return $this->productDate;
    }
    public function getImg(){
        return $this->img;
    }

    public function setId($id){
       $this->id = $id;
    }
    public function setCategoryId($categoryId){
        $this->categoryId = $this->db->real_escape_string( $categoryId);
    }
    public function setProductName($productName){
        $this->productName = $this->db->real_escape_string($productName);
    }
    public function setDescription($description){
        $this->description = $this->db->real_escape_string($description);
    }
    public function setPrice($price){
        $this->price = $this->db->real_escape_string($price);
    }
    public function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }
    public function setOffer($offer){
        $this->offer = $this->db->real_escape_string($offer);
    }
    public function setProductDate($productDate){
        $this->productDate = $this->db->real_escape_string($productDate);
    }
    public function setImg($img){
        $this->img = $img;
    }

    public function getAll(){
        $query = 'SELECT * FROM products ORDER BY ProductName';
        $products = $this->db->query($query);
        return $products;
    }

    public function getOne(){
        $query = "SELECT * FROM products WHERE id = '{$this->id}';";
        $product = $this->db->query($query);

        $result = false;
        if ($product) {
            $result = $product->fetch_object();
        }
        return $result;
    }

    public function getProductsByCategoryId($id){
        $query = "SELECT * FROM Products WHERE CategoryId = $id";
        $products = $this->db->query($query);

        return $products;
    }

    public function getRandom($limit){
        $query = "SELECT * FROM products ORDER BY RAND() LIMIT $limit";
        $rand = $this->db->query($query);

        return $rand;
    }

    public function save(){
        $query = "INSERT INTO products VALUES(null, '{$this->getCategoryId()}', '{$this->getProductName()}', '{$this->getDescription()}', '{$this->getPrice()}', '{$this->getStock()}', '{$this->getOffer()}', CURDATE(), '{$this->getImg()}');"; 
        $save = $this->db->query($query);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $query = "DELETE FROM products WHERE id={$this->getId()}";
        $delete = $this->db->query($query);

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

    public function edit(){
        $query = "UPDATE products SET CategoryId = '{$this->getCategoryId()}', ProductName = '{$this->getProductName()}', Description = '{$this->getDescription()}', Price = '{$this->getPrice()}', Stock = '{$this->getStock()}', Offer = '{$this->getOffer()}'"; 
        if($this->getImg() != null){
            $query .= ", Img = '{$this->getImg()}'";
        }
        $query .= " WHERE Id = '{$this->getId()}';";
        /*var_dump($query);
        die();*/
        $edit = $this->db->query($query);

        $result = false;
        if($edit){
            $result = true;
        }
        return $result;
    }
    

}