<h1>Mis pedidos</h1>

<?php if(isset($orders) && $orders != false)  : ?>

<table class="user-orders">
    <tr>
        <th>N de pedido</th>
        <th>Monto</th>
        <th>Fecha</th>
    </tr>
    <?php while($order = $orders->fetch_object()) : ?>
    <tr>
        <td>
            <?= $order->Id ?>
        </td>
        <td>
            <?= $order->Cost ?>
        </td>
        <td>
            <?= $order->OrderDate ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php else : ?>

    <div class="message">
        <h3>No hay pedidos para mostrar</h3>
    </div>

<?php endif ?>