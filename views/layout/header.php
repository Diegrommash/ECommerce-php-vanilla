<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Tienda de articulos para jugar rol</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles/styles.css"/>
    </head>
    <body>
        <div id="container">        <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/dado.jpg" alt="logo"/>
                    <a href="index.php">
                        Giladas de rol
                    </a>
                </div>
            </header>

            <!-- Menu -->
            <?php $categories =  Utils::showCategoriesMenu() ?>
            <nav id="menu">
                <ul>
                    <?php while($category = $categories->fetch_object()): ?>
                        <li>
                            <a href="<?=base_url?>category/productsByCategory&id=<?=$category->Id?>"><?= $category->CategoryName ?></a>
                        </li>
                    <?php endwhile;?>
                </ul>
            </nav>


