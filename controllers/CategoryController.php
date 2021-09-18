<?php
require_once 'models/category.php';
require_once 'models/product.php';

class categoryController{
    
    public function index(){
        Utils::isAdmin();
        $category = new category();
        $categories = $category->getAll();

        require_once 'views/category/index.php';
    }

    public function create(){
        Utils::isAdmin();
        require_once 'views/category/create.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST) && isset($_POST['CategoryName'])){
            $category = new category();
            $category->setName($_POST['CategoryName']);
            $save = $category->save();

        }

        header('location:'.base_url.'category/index');
    }

    public function productsByCategory(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $cat = new Category();
            $cat->setId($id);
            $category = $cat->getOne();

            $product = new Product();
            $products = $product->getProductsByCategoryId($id);


        }
        require_once 'views/category/viewCategory.php';
    }
    
}

