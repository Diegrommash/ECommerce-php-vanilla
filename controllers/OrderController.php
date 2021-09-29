<?php
require_once 'models/order.php';
require_once 'models/orders2products.php';
require_once 'models/orderStates.php';

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
            if(is_object($order)){
                $orderProducts = $orderObject->getProductsByOrder($order->Id);
            }else{
                $orderProducts = null;
            }
            
        }       
        require_once 'views/order/confirm.php';
    }

    public function myOrders(){
        Utils::isLogued();
        $identity_Id = $_SESSION['identity']->Id;
        $order = new Order();
        $order->setUserId($identity_Id);

        $orders = $order->getAllByUser();

        require_once 'views/order/myOrders.php';
    }

    public function details(){
        Utils::isLogued();
        $orderId = $_GET['id'];
        $orderObject = new Order();
        $orderObject->setId($orderId);

        $order = $orderObject->getOne();
        $orderProducts = $orderObject->getProductsByOrder($order->Id);

        if(isset($_SESSION['admin'])){
            $os = new OrderStates();
            $orderStates = $os->getAll();
        }

        require_once 'views/order/details.php';
    }

    public function manageOrders(){
        Utils::isAdmin();

        $order = new Order();
        $orders = $order->getAll();

        $orderStates = new OrderStates();
        $orderStates = $orderStates->getAll();

        require_once 'views/order/manageOrders.php';
    }

    public function editOrdersStates(){
        utils::isAdmin();
        if(isset($_GET['id']) && isset($_POST['orderStateId'])){
            $id = $_GET['id'];
            $orderStateId = $_POST['orderStateId'];

            $order = new Order();
            $order->setId($id);
            $order->setOrderStateId($orderStateId);
       
            $edit = $order->edit();

            if($edit){
                $_SESSION['orderEdit'] = 'complete';
            }else{
                $_SESSION['orderEdit'] = 'failed';
            }
        }else{
            $_SESSION['orderEdit'] = 'failed';
        }
        
        Header("Location:".base_url."order/manageOrders");
    }

}

