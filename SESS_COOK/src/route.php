<?php

function getRoute(): string
{
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
