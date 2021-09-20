<?php
require_once 'models/product.php';

class CartController{

    public function Index(){
        if(isset($_SESSION['cart'])){
           $carrito = $_SESSION['cart'];
        }
        require_once 'views/cart/index.php';
    }

    public function Add(){
        if($_GET['id']){
            $idproduct = $_GET['id'];
        }else{
            header('Location:'.base_url);
        }

        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'];
        }

        foreach($_SESSION['cart'] as $index => $element){
            if($element->Id == $idproduct){
                $_SESSION['cart'][$index]['quantity']++;
            }

        }

        $product = new Product();
        $product->setId($idproduct);
        $product->getOne();

        if( is_object($product)){
            $_SESSION['cart'][] = array(
                'product'=> $product,
                'quantity'=> 1 
            );
        }

    }

    public function Delete(){

    }

    public function DeleteAll(){

    }

}