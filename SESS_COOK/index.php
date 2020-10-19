<?php
ini_set('display_errors', 'On');
//configuracion entrono
define('APP', __DIR__);
require APP . '/src/route.php';
//sessions && cookie
session_start();
if (isset($_SESSION["username"]) || isset($_SESSION["email"])) {
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
} else if (isset($_COOKIE["username"]) || isset($_COOKIE["password"])) {
    header('Location: /login.php');
}

//sistema de enrutamiento
$controller = getRoute();

//rederigiar a ruta adecuada
require APP . '/controllers/' . $controller . '.php';
//require controlador








// session_start();
// include 'config.php';
// require __DIR__ . '/src/connect.php';
// require __DIR__ . '/src/schema.php';

// // connecta db i crea taula si no existeix
// $db = connectSqlite('appsess');
// schemaGenerator($db);
// //
// require 'home.php';
