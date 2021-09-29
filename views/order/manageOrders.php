<h1>Manejo de pedidos</h1>


<?php if(isset($orders) && $orders != false): ?>

<table class="user-orders">
    <tr>
        <th>N de pedido</th>
        <th>Monto</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while($order = $orders->fetch_object()) : ?>
    <tr>
        <td>
            <a href="<?=base_url?>/order/details&id=<?= $order->Id ?>"><?= $order->Id ?></a>
        </td>
        <td>
            <?= $order->Cost ?>
        </td>
        <td>
            <?= $order->OrderDate ?>
        </td>
        <td>     
            <?=Utils::getOrderStateName($order->OrderStateId); ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php else : ?>

    <div class="message">
        <h3>No hay pedidos</h3>
    </div>

<?php endif ?>