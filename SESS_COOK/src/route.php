<?php

function getRoute(): string
{

    // if (isset($_REQUEST['url'])) {
    //     $url = $_REQUEST['url'];
    // } else {
    //     $url = 'home';
    // }
    // ?? Si no esta definido coge el /
    switch ($_SERVER['REQUEST_URI'] ?? '/') {
        case '/profile':
            return 'profile';
        case '/login':
            return 'login';
        case '/register':
            return 'register';
        case '/':
            return 'home';
        default:
            return 'home';
    }
}
