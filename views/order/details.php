<h1>Detalles del pedido</h1>

<div class="comfirm-title">
    <h2>Datos del envio</h2>
    <div class="confirm-orderDates">
        <div>
            Provincia: <?= $order->Province ?>
        </div>
        <div>
            Ciudad: <?= $order->Location ?>
        </div>
        <div>
            Direccion: <?= $order->Direction ?>
        </div>
    </div>
</div>


<div class="comfirm-title">
    <h2>Datos del pedido</h2>
    <div class="confirm-orderDates">
        <div>
            Numero de pedido: <?= $order->Id ?>
        </div>
        <div>
            Monto total: <?= $order->Cost ?>
        </div>
        <div>
            Cantidad de Productos: <?= $orderProducts->num_rows ?>
        </div>
        <div>
            Fecha: <?= date("d-m-Y", strtotime($order->OrderDate)) ?>
        </div>
    </div>
</div>

<div class="comfirm-title">
    <h2>Estado del pedido:</h2>
    <div class="confirm-orderDates">
        <?php if (isset($_SESSION['admin'])): ?>

            <div class="orderStates-admin">
                <form action="<?=base_url?>order/editOrdersStates&id=<?= $order->Id ?>" method="POST">
                    <select name="orderStateId">
                        <?php while ($state = $orderStates->fetch_object()) : ?>
                            <option value="<?= $state->Id ?>">
                                <?= Utils::getOrderStateName($state->Id) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <input type="submit" value="cambiar estado">
                </form>
            </div>

        <?php else : ?>
            Estado: <?= Utils::getOrderStateName($order->OrderStateId) ?>
        <?php endif; ?>
    </div>
</div>


<?php if (isset($order)) : ?>
    <h2>Resumen de productos</h2>
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
<?php endif; ?>