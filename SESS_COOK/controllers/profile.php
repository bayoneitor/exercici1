<?php
require APP . '/src/render.php';

if (isset($_SESSION["username"])) {
    echo render('home', ['title' => "My Profile", 'controller' => "$controller", 'username' => "$username", 'email' => "$email"]);
} else {
    header('Location: /');
}
