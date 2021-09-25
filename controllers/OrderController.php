<?php
require_once 'models/order.php';
require_once 'models/orders2products.php';

class orderController{
    
    public function index(){
        
        require_once 'views/order/index.php';
    }
    
    public function add(){
        if(isset($_SESSION['identity'])){
            $userId = $_SESSION['identity']->Id;
            $province = isset($_POST['province']) ? $_POST['province'] : false;
            $location = isset($_POST['location']) ? $_POST['location'] : false;
            $direction = isset($_POST['direction']) ? $_POST['direction'] : false;

            $cartStats = Utils::cartStats();
            $cost = $cartStats['total'];

            if($province && $location && $direction){
                $order = new Order();
                $order->setUserId($userId);
                $order->setProvince($province);
                $order->setLocation($location);
                $order->setDirection($direction);
                $order->setCost($cost);

                $orderId = $order->save();
                
                $orders2products = new Orders2Products();
                
                $orders2productsSave = $orders2products->save($orderId);

                if(is_numeric($orderId) && $orders2productsSave){
                    $_SESSION['order'] = 'complete';
                }else{
                    $_SESSION['order'] = 'failed';
                }
                
            }else{
                $_SESSION['order'] = 'failed';
            }
            Header('Location:'.base_url.'order/confirm');
        }else{
            Header('Location:'.base_url);
        }
    }

    public function confirm(){
        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $orderObject = new Order();
            $orderObject->setUserId($identity->Id);

            $order = $orderObject->getLastByUser();
            $orderProducts = $orderObject->getProductsByOrder($order->Id);

            /*var_dump($order);
            echo '<br>';
            var_dump($orderProducts);
            echo '<br>';
            die();*/

        }       
        require_once 'views/order/confirm.php';
    }

    public function myOrders(){

        require_once 'views/order/myOrders.php';
    }

}

