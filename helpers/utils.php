<?php

class Message{
    private $message;
    private $classAlert;

    public function getMessage(){
        return $this->message;
    }
    public function setMessage($message){
        $this->message = $message;
    }

    public function getClassAlert(){
        return $this->classAlert;
    }
    public function setClassAlert($classAlert){
        $this->classAlert = $classAlert;
    }
}

class Utils{

    public static function deleteSession($name){
        
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header('location:'.base_url);
        }else{
            return true;
        }
    }

    public static function showCategoriesMenu(){
        require_once 'controllers/CategoryController.php';

        $category = new category();
        $categories = $category->GetAll();
        return $categories;
    }

    public static function sessionProduct(){
        $message = new Message();

       if(isset($_SESSION['saveProduct']) && $_SESSION['saveProduct'] == 'complete'){
            $message->setMessage("Producto ingresado con exito!");
            $message->setClassAlert("alert_green");
            Utils::deleteSession('saveProduct'); 
        }elseif(isset($_SESSION['saveProduct']) && $_SESSION['saveProduct'] != 'complete'){            
            $message->setMessage("Producto no creado");
            $message->setClassAlert("alert_red");
            Utils::deleteSession('saveProduct'); 
        }

        if(isset($_SESSION['editProduct']) && $_SESSION['editProduct'] == 'complete'){
            $message->setMessage("Producto editado con exito!");
            $message->setClassAlert("alert_green");
            Utils::deleteSession('editProduct'); 
        }elseif(isset($_SESSION['editProduct']) && $_SESSION['editProduct'] != 'complete'){            
            $message->setMessage("Producto no editado");
            $message->setClassAlert("alert_red");
            Utils::deleteSession('editProduct'); 
        }

        if(isset($_SESSION['deleteProduct']) && $_SESSION['deleteProduct'] == 'complete'){
            $message->setMessage("Producto eliminado con exito!");
            $message->setClassAlert("alert_green");
            Utils::deleteSession('deleteProduct'); 
        }elseif(isset($_SESSION['deleteProduct']) && $_SESSION['deleteProduct'] != 'complete'){            
            $message->setMessage("Producto no eliminado");
            $message->setClassAlert("alert_red");
            Utils::deleteSession('deleteProduct'); 
        }

        if(isset($_SESSION['save']) && $_SESSION['save'] == 'failed'){
            $message->setMessage("Error en el envio de la info!");
            $message->setClassAlert("alert_red");
            Utils::deleteSession('save'); 
        }
        
       return $message;
    }

    public static function cartStats(){
        $cartStats = array(
            'total' => 0,
            'count' => 0
        );

        if(isset($_SESSION['cart'])){
            $cartStats['count'] = count($_SESSION['cart']);

            foreach($_SESSION['cart'] as $product){
                $cartStats['total'] += $product['product']->Price * $product['quantity'];
            }
        }
        
        return $cartStats;
    }
    
}