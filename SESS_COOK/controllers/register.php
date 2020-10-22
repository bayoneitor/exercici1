<?php
require APP . '/src/render.php';
if (isset($_SESSION["username"])) {
    header('Location: ?url=home');
} else {
    echo render('register', ['title' => "Register", 'controller' => "$controller"]);
}
