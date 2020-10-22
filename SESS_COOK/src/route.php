<?php

function getRoute(): string
{

    if (isset($_REQUEST['url'])) {
        $url = $_REQUEST['url'];
    } else {
        $url = 'home';
    }

    switch ($url) {
        case 'profile':
            return 'profile';
        case 'login':
            return 'login';
        case 'register':
            return 'register';
        case 'logout':
            return 'logout';
        case 'session':
            return 'session';
        case 'home':
            return 'home';
        default:
            return 'home';
    }
    // // ?? Si no esta definido coge el /
    // switch ($_SERVER['REQUEST_URI'] ?? '/') {
    //     case '/profile':
    //         return 'profile';
    //     case '/login':
    //         return 'login';
    //     case '/register':
    //         return 'register';
    //     case '/':
    //         return 'home';
    //     default:
    //         return 'home';
    // }
}
