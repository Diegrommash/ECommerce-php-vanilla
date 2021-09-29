<h1>Carrito de compras</h1>

<?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1): ?>
<table class="cart-table">
    <tr>
        <th>imagen</th>
        <th>nombre</th>
        <th>precio</th>
        <th>unidades</th>
        <th>borrar</th>
    </tr>
    
    <?php 
        foreach($_SESSION['cart'] as $index => $element):
        $product = $element['product'];
    ?>
    <tr>
        <td>
            <?php if($product->Img != null): ?>
                <img src="<?=base_url?>upload/images/<?=$product->Img?>" alt="<?=$product->Name?>">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/noImage.png" alt="<?=$product->Name?>">
            <?php endif; ?>
        </td>
        <td>
            <?=$product->ProductName?>
        </td>
        <td>
            <?=$product->Price?>
        </td>
        <td class='quantity-up-down'>
            <span class="up-down-button">
                <a href="<?=base_url?>cart/down&index=<?=$index?>">-</a>
            </span>
            <span class="up-down-sp">
                <?=$element['quantity']?>
            </span>
            <span class="up-down-button">            
                <a href="<?=base_url?>cart/up&index=<?=$index?>">+</a>
            </span> 
        </td>
        <td>
            <span>
                <a href="<?=base_url?>cart/delete&index=<?=$index?>" class="delete-button-target">borrar</a>
            </span>
        </td>


    </tr>
    <?php endforeach; ?>
    
</table>
<?php endif; ?>

<div class="makeToOrder">
<?php
    if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0):
    $cartStats = Utils::cartStats() 
?>
    <a href="<?=base_url?>order/index" class="button , makeToOrder-button">Hacer el pedido</a>
    <span>
        Total: $ <?= $cartStats['total'] ?>         
    </span>
    <a href="<?=base_url?>cart/deleteAll" class="delete-a delete-button-all">borrar carrito</a>
<?php else:?>
    <h3>Sin productos</h3>
<?php endif;?>
</div>