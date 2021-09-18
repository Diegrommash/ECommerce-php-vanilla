            <div id="contenido">
                <!-- Barra lateral -->
                <aside id="lateral">
                    <div id="login" class="block_aside">

                        <?php if(!isset($_SESSION['identity'])): ?>
                            <form action="<?=base_url?>user/login" method="POST">
                                <label for="email">email</label>
                                <input type="email" name="email">
                                <label for="password">password</label>
                                <input type="password" name="password">
                                <input type="submit" value="enviar">
                            </form>
                            
                        <?php else: ?>                        
                            <?= $_SESSION['identity']->UserName ?> <?= $_SESSION['identity']->UserLastName ?></h3>                    
                        <?php endif;  ?>
                        
                        <ul>
                            <?php if(isset($_SESSION['admin'])): ?>
                                <li><a href="<?=base_url?>category/index">gestionar categorias</a></li>
                                <li><a href="<?=base_url?>product/manageProducts">gestionar productos</a></li>
                                <li><a href="<?=base_url?>orders/manageOrders">gestionar pedidos</a></li>                               
                            <?php endif; ?>
                            
                            <?php if(isset($_SESSION['identity'])): ?>
                                <li><a href="#">mis pedidos</a></li>  
                                <li><a href="<?=base_url?>user/logout">cerrar sesion</a></li>
                            <?php else: ?>
                                <li><a href="<?=base_url?>user/register">registrate aqui</a></li>
                            <?php endif; ?>                           
                        </ul>
                                                                    
                    </div>
                </aside>

                <!-- Contenido central -->
                <div id="central">

                    
                