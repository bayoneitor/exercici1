<?php
require APP . '/src/render.php';
$variables = ['title' => "My home", 'controller' => "$controller"];
if (isset($username)) {
    $variables += ['username' => "$username", 'email' => "$email"];

    if (isset($_COOKIE["lastTime"])) {
        $lastTime = $_COOKIE["lastTime"];
        setcookie("lastTime", date('l jS \of F Y h:i:s A'), time() + 60 * 60 * 24 * 30, "/");
        $variables += ['lastTime' => "$lastTime"];
    }
}
echo render('home', $variables);
