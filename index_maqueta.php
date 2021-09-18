<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tienda de articulos para jugar rol</title>
        <link rel="stylesheet" href="assets/css/styles/styles.css"/>
    </head>
    <body>
        <div id="container">        <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/dado.jpg" alt="logo"/>
                    <a href="index.php">
                        Giladas de rol
                    </a>
                </div>
            </header>

            <!-- Menu -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Dados</a>
                    </li>
                    <li>
                        <a href="#">Manuales</a>
                    </li>
                    <li>
                        <a href="#">Miniaturas</a>
                    </li>
                </ul>

            </nav>

            <div id="contenido">
                <!-- Barra lateral -->
                <aside id="lateral">
                    <div id="login" class="block_aside">
                        <form action="#" method="post">
                            <label for="email">email</label>
                            <input type="email" name="email">
                            <label for="password">password</label>
                            <input type="password" name="password">
                            <input type="submit" value="enviar">
                        </form>
                        <a href="#">mis pedidos</a>
                        <a href="#">gestionar pedidos</a>
                        <a href="#">gestionar categorias</a>
                    </div>
                </aside>

                <!-- Contenido central -->
                <div id="central">

                    <div class="product">
                        <img src="assets/img/dado01.jpg" alt="dado"/>
                        <h2>Dado 01</h2>
                        <p>10 patacones</p>
                        <a href="#">Comprar</a>
                    </div>  

                    <div class="product">
                        <img src="assets/img/dado02.jpg" alt="dado"/>
                        <h2>Dado 02</h2>
                        <p>10 patacones</p>
                        <a href="#">Comprar</a>
                    </div>

                    <div class="product">
                        <img src="assets/img/dado03.jpg" alt="dado"/>
                        <h2>Dado 03</h2>
                        <p>10 patacones</p>
                        <a href="#">Comprar</a>
                    </div>

                </div>

            </div>
            <!-- Pie de pagina -->
            <footer id="footer">
                <p>Desarrolado por Diegomer &COPY; <?= date('Y') ?> </p>
            </footer>
        </div>
    </body>
</html>
