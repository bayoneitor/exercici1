<?php
include 'src/templates/header.tpl.php';
?>

<form class="form-signin" action="login.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
    <label for="inputUser" class="sr-only">Usuario</label>
    <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Usuario" required autofocus>

    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Recordarme
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login-button">Iniciar Sesión</button>
</form>

<?php
include 'src/templates/footer.tpl.php';
