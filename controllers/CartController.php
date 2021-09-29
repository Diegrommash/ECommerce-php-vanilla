<?php

class CartController{

    public function index(){

        if(isset($_SESSION['cart']) && $_SESSION['cart'] >= 1){
            $cart = $_SESSION['cart'];
        }else{
            $cart = array();
        }

        require_once 'views/cart/index.php';
    }

    public function add(){
        if($_GET['id']){
            $product_id = $_GET['id'];
        }else{
            Header('Location:'.base_url);
        }
    

        if(isset($_SESSION['cart'])){
            $productExits = false;
            foreach($_SESSION['cart'] as $index => $element){
                if($element['product']->Id == $product_id){
                    $_SESSION['cart'][$index]['quantity']++;
                    $productExits = true;
                }
            }          
        }

        if(!isset($productExits) || $productExits == false){
            $pro = new Product();
            $pro->setId($product_id);
            $product = $pro->getOne();

            if(is_object($product)){
                $_SESSION['cart'][] = array(
                    'product' => $product,
                    'quantity' => 1
                );
            }
        }
        Header('Location:'.base_url.'/cart/index');
    }

    public function delete(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['cart'][$index]);
        }
        Header('Location:'.base_url.'/cart/index');
    }

    public function deleteAll(){
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            unset($_SESSION['cart']);      
        }
        Header('Location:'.base_url.'/cart/index');
    }

    public function up(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['cart'][$index]['quantity']++;
        }
        Header('Location:'.base_url.'/cart/index');
    }

public function down(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['cart'][$index]['quantity']--;

            if($_SESSION['cart'][$index]['quantity'] == 0){
				unset($_SESSION['cart'][$index]);
			}
        }
         Header('Location:'.base_url.'/cart/index');    
    }

}