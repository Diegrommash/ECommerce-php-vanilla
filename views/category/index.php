<h1>Gestionar categorias</h1>

<a href="<?=base_url?>category/create" class="button button-small">
    crear categoria
</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
    <?php while($cat = $categories->fetch_object()): ?>
    <tr>
        <td>
            <?= $cat->Id; ?>
        </td>
        <td>
            <?= $cat->CategoryName; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>