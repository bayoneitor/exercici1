<?php
require APP . '/src/render.php';

if (isset($_SESSION["username"])) {
    header('Location: /');
} else {
    echo render('login', ['title' => "Login", 'controller' => "$controller"]);
}
