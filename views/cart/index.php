<h1>Carrito de compras</h1>

<?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1): ?>
<table class="cart-table">
    <tr>
        <th>imagen</th>
        <th>nombre</th>
        <th>precio</th>
        <th>unidades</th>
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
        <td>
            <?=$element['quantity']?>
        </td>
    </tr>
    <?php endforeach; ?>
    

</table>
<?php endif; ?>