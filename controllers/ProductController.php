<?php
require_once 'models/product.php';

class productController{
    
    //renderiso la vista
    public function index(){
        $product = new Product();
        $randomProducts = $product->getRandom(3);

        require_once 'views/product/FeaturedProduct.php';
    }

    public function manageProducts()
    {
        Utils::isAdmin();

        $product = new product();
        $products = $product->getAll();
        require_once 'views/product/index.php';
    }

    public function create(){
        Utils::isAdmin();
        $edit = false;
        require_once 'views/product/create.php';
    }

    function saveProduct($product){
        $save = $product->save();

        if($save){
            $_SESSION['saveProduct'] = 'complete';
        }else{
            $_SESSION['saveProduct'] = 'failed';
        }
    }
   

    function editProduct($product, $id){
        $product->setId($id);
        $edit = $product->edit();

        if($edit){
            $_SESSION['editProduct'] = 'complete';
        }else{
            $_SESSION['editProduct'] = 'failed';
        }     
    }
    

    public function save(){
        Utils::isAdmin();

        if(isset($_POST)){      
            $categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : false;
            $productName = isset($_POST['productName']) ? $_POST['productName'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $offer = isset($_POST['offer']) ? $_POST['offer'] : false;
            //$productDate = isset($_POST['productDate']) ? $_POST['productDate'] : false;
            //$img = isset($_POST['img']) ? $_POST['img'] : false;

            if($categoryId && $productName && $description && $price && $stock && $offer){
                $product = new product();
                $product->setCategoryId($categoryId);
                $product->setProductName($productName);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setOffer($offer);
                //$product->setProductDate($productDate);
                
                if(isset($_FILES['img'])){
                    $file = $_FILES['img'];
                    $fileName = $file['name'];
                    $mimeType = $file['type'];

                    if($mimeType == 'image/jpg' || $mimeType == 'image/jpeg' || $mimeType == 'image/png' || $mimeType == 'image/gif'){
                
                        if (!is_dir('uploads/images')) {
                            mkdir('upload/images', 0777, true);
                        }

                        move_uploaded_file($file['tmp_name'], 'upload/images/'.$fileName);
                        $product->setImg($fileName);
                    }
                }else{
                    $product->setImg(null);
                }
                
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->editProduct($product, $id);
                }else{
                    $this->saveProduct($product);
                }
            }
            else{
                $_SESSION['save'] = 'failed';
                
            }
            header('Location:'.base_url.'product/manageProducts');

        }
    }

    public function delete(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $product = new product();
            $product->setId($_GET['id']);

            $delete = $product->delete();

            if($delete){
                $_SESSION['deleteProduct'] = 'complete';
            }else{
                $_SESSION['deleteProduct'] = 'failed';
            }
        }else{
            $_SESSION['deleteProduct'] = 'failed';
        }
        header('location:'.base_url.'product/manageProducts');
    }

    public function edit(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product = new product();
            $product->setId($id);

            $edit = true;

            $productToEdit = $product->getOne();

            require_once 'views/product/create.php';
        }else{
            header('location:'.base_url.'product/manageProducts');
        }   

    }

    public function getOne(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $pro = new product();
            $pro->setId($id);

            $product = $pro->getOne();

            require_once 'views/product/viewProduct.php';
        }else{
            header('location:'.base_url.'product/manageProducts');
        }   
    }

}

