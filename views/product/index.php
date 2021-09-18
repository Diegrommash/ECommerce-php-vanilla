<h1>Gestionar Productos</h1>

<a href="<?=base_url?>product/create" class="button button-small">
    crear producto
</a>

<?php $message = Utils::sessionProduct(); ?>

<strong class=<?=$message->getClassAlert()?>><?= $message->getMessage()?></strong>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($product = $products->fetch_object()): ?>
    <tr>
        <td>
            <?= $product->Id; ?>
        </td>
        <td>
            <?= $product->ProductName; ?>
        </td>
        <td>
            <?= $product->Price; ?>
        </td>
        <td>
            <?= $product->Stock; ?>
        </td>
        <td>
            <a href="<?=base_url?>product/edit&id=<?=$product->Id?>" class="button button-small">Editar</a>
            <a href="<?=base_url?>product/delete&id=<?=$product->Id?>" class="button button-small">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>