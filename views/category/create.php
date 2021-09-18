<h1>Crear categorias</h1>

<form action="<?=base_url?>category/save" method='POST'>
    <label for="CategoryName">nombre</label>
    <input type="text" name="CategoryName" required>

    <input type="submit" value="guardar">
</form>