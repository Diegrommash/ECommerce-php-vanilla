<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos gilipollas!</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>user/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" required/>
    
    <label for="lastname">Apellido</label>
    <input type="text" name="lastname" required/>
    
    <label for="email">Email</label>
    <input type="email" name="email" required/>
    
    <label for="password">Password</label>
    <input type="password" name="password" required/>
    
    <input type="submit" value="Registrarse">
    
</form>
