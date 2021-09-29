<?php

class OrderStatesController{

    public function GetOne(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $os = new product();
            $os->setId($id);

            $orderState = $os->getOne();

            /*require_once 'views/product/viewProduct.php';*/
        }else{
            header('location:'.base_url.'orders/manageOrders');
        }  
    }
}