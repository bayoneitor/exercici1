<?php
require APP . '/src/render.php';
$variables = ['title' => "My home", 'controller' => "$controller"];
if (isset($username)) {
    $variables += ['username' => "$username", 'email' => "$email"];
}
echo render('home', $variables);
