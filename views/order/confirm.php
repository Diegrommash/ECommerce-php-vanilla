<h1>Pedido confirmado</h1>

<?php if(isset($_SESSION['order']) && $_SESSION['order'] == 'complete'): ?>
    <p>El pedido esta confirmado, ahora paga mugriento!!!.</p>    
<?php elseif(isset($_SESSION['order']) && $_SESSION['order'] != 'complete'): ?>
    <p>Tu pedido no se pudo confirmar.</p>
<?php endif;?>

<h2>Datos del pedido</h2>
<div class="confirm-orderDates">
    <div>
        Numero de pedido:
    </div>
    <div>
        Monto total:
    </div>
    <div>
        Productos:
    </div>
</div>
<table class="cart-table">
    <tr>
        <th>imagen</th>
        <th>nombre</th>
        <th>precio</th>
        <th>unidades</th>
    </tr>
    
    <!--<?php 
        foreach($_SESSION['cart'] as $index => $element):
        $product = $element['product'];
    ?>-->

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
        <td>
            <?=$element['quantity']?>
        </td>
    </tr>
    <?php endforeach; ?>
    
</table>