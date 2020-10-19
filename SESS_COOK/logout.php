<?php
// Iniciar session y mantener session
session_start();
// Eliminar elementos de la variable session
session_unset();
// Destruye la variable de session y la cookie
session_destroy();
// Redirige a index.php

//Eliminar cookie
setcookie("username", $user, time() - 1, "/");
setcookie("password", $pwd, time() - 1, "/");

header('Location:index.php');
