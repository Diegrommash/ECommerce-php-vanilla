<h1>Pedido confirmado</h1>

<?php 
    if (isset($_SESSION['order']) && $_SESSION['order'] == 'complete') :
    $cartStats = Utils::cartStats(); 
?>
    <p>El pedido esta confirmado, ahora paga mugriento!!!.</p>

    <div class="comfirm-title">
        <h2>Datos del pedido</h2>
    </div>
    <div class="confirm-orderDates">
        <div>
            Numero de pedido: <?= $order->Id?>
        </div>
        <div>
            Monto total: <?= $cartStats['total']?>
        </div>
        <div>
            Productos: <?= $cartStats['count']?>
        </div>
    </div>
    <?php if(isset($order)) : ?>

        <table class="cart-table">
            <tr>
                <th>imagen</th>
                <th>nombre</th>
                <th>precio</th>
                <th>unidades</th>
            </tr>

            <?php while ($product = $orderProducts->fetch_object()) : ?>
                <tr>
                    <td>
                        <?php if ($product->Img != null) : ?>
                            <img src="<?= base_url ?>upload/images/<?= $product->Img ?>" alt="<?= $product->Name ?>">
                        <?php else : ?>
                            <img src="<?= base_url ?>assets/img/noImage.png" alt="<?= $product->Name ?>">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= $product->ProductName ?>
                    </td>
                    <td>
                        <?= $product->Price ?>
                    </td>
                    <td>
                        <?= $product->Quantity ?>
                    </td>
                </tr>
            <?php endwhile; ?>

        </table>
   <!-- <?php endif; ?>-->
<?php elseif (isset($_SESSION['order']) && $_SESSION['order'] != 'complete') : ?>
    <p>Tu pedido no se pudo confirmar.</p>
<?php endif; ?>