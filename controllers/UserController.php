<?php
require_once 'models/user.php';

class userController{
    
    public function index(){
        echo"Controlador user, Action index";
    }
    
    public function register(){
        require_once 'views/user/register.php';
    }
    
    public function save(){
        if(isset($_POST)){

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($name && $lastname && $email && $password){
                $user = new user();
                $user->setUserName($name);
                $user->setUserLastName($lastname);
                $user->setEmail($email);
                $user->setPassword($password);
                
                $save = $user->save();
                if($save){
                    $_SESSION['register'] = 'complete';
                }else{
                    $_SESSION['register'] = 'failed';
                }
            }
            else{
                $_SESSION['register'] = 'failed'; 
            }
        }else{
            $_SESSION['register'] = 'failed';
        }
        header('Location:'.base_url.'user/register');
    }

    public function login(){
        if(isset($_POST)){
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassWord($_POST['password']);

            $identity = $user->login();

            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if($identity->Rol == 'admin'){
                    $_SESSION['admin'] = true;
                }

            }else{
                $_SESSION['error_login'] = 'identificacion fallida';
            }
        }
        header('Location:'.base_url);
    }

    public function logout(){

        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        header('location:'.base_url);
    }

}
