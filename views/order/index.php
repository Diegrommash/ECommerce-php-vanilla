<h1>Hacer el pedido</h1>

<?php if(isset($_SESSION['identity'])): ?>
<div class="makeToOrder-index">
    <!--<a href="<?=base_url?>cart/index" class="button , makeToOrder-button">volver al pedido</a>-->
    <h2>Direccion para el envio</h2>
    <form action="<?= base_url.'order/add'?>" method="POST">
        <label for="province">Provincia</label>
        <input type="text" name="province" placeholder="ingresar provincia" required>
        <label for="location">Ciudad</label>
        <input type="text" name="location" placeholder="ingresar ciudad" required>
        <label for="direction">Direccion</label>
        <input type="text" name="direction" placeholder="ingresar provincia" required>
        <input type="submit" value="confirmar perdido">
    </form>
</div>
<?php else: ?>
    <h2>Logiate si queres continuar con tu compra!</h2>
<?php endif;?>