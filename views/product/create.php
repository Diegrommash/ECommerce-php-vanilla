

<?php if($edit == true && isset($productToEdit) && is_object($productToEdit)): ?>
    <h1>Editar Producto <?=$productToEdit->ProductName; ?></h1>
    <?php $url_action = base_url.'product/save&id='.$productToEdit->Id; ?>
<?php else: ?>
    <h1>Crear Productos</h1>
    <?php $url_action = base_url.'product/save' ?>
<?php endif; ?>

<form action="<?=$url_action?>" method='POST' enctype="multipart/form-data">
    <?php $categories = Utils::showCategoriesMenu() ?>

    <label for="categoryId">Categoria</label>
    <select name="categoryId" required>
        <?php while($category = $categories->fetch_object()):?>
        <option value="<?=$category->Id; ?>"
            <?php echo(isset($productToEdit) && is_object($productToEdit) && $productToEdit->CategoryId == $category->Id ? 'Selected' : ''); ?>>
            <?=$category->CategoryName?>
        </option>
        <?php endwhile?>
    </select>
    
    <label for="productName">Nombre</label>
    <input type="text" name="productName" placeholder="Ingrese Nombre" value="<?= isset($productToEdit) && is_object($productToEdit) ? $productToEdit->ProductName : ''; ?>" required>

    <label for="description">Descripcion</label>
    <textarea type="text" name="description" placeholder="Ingrese Description" required><?= isset($productToEdit) && is_object($productToEdit) ? $productToEdit->Description : '';?> </textarea>
    
    <label for="price">Precio</label>
    <input type="number" name="price" placeholder="Ingrese Precio" value="<?=isset($productToEdit) && is_object($productToEdit) ? $productToEdit->Price : ''; ?>" required>

    <label for="stock">Stock</label>
    <input type="number" name="stock" placeholder="Ingrese Stock" value="<?= isset($productToEdit) && is_object($productToEdit) ? $productToEdit->Stock : ''; ?>" required>

    <label for="stock">Oferta</label>
    <input type="text" name="offer" placeholder="Ingrese Oferta" value="<?= isset($productToEdit) && is_object($productToEdit) ? $productToEdit->Offer : ''; ?>" required>

    <label for="img">Imagen</label>
    <?php if(isset($productToEdit) && is_object($productToEdit) && !empty($productToEdit->Img)): ?>
        <img class="thumb" src="<?=base_url?>upload/images/<?=$productToEdit->Img;?>">
    <?php endif; ?>
    <input type="file" name="img">

    <input type="submit" value="guardar">
</form>