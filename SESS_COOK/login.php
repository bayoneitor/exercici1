<?php
ini_set('display_errors', 'On');
session_start();

//Primero miramos que no este la session definida
if (!isset($_SESSION["email"]) && !isset($_SESSION["username"])) {
    //Miramos si pueden entrar por cookies
    if (isset($_COOKIE["username"]) || isset($_COOKIE["password"])) {
        $cookie = true;
        $user = $_COOKIE["username"];
        $pwd = $_COOKIE["password"];
    } else {
        $cookie = false;
    }
    //Miramos que haya entrado por formulario o por cookie
    if (
        isset($_POST['login-button']) || isset($_POST['register-button']) || $cookie == true
    ) {
        //Miramos si entrar por el boton register
        if (isset($_POST['register-button'])) {
            // Miramos que ninguno este vacio
            if (
                filter_input(INPUT_POST, 'inputUser') != null &&
                filter_input(INPUT_POST, 'inputEmail') != null &&
                filter_input(INPUT_POST, 'inputPassword') != null
            ) {
                require_once 'src/connect.php';
                $db = connectSqlite('appsess');
                if ($db) {
                    require_once 'src/schema.php';

                    $user = filter_input(INPUT_POST, 'inputUser', FILTER_SANITIZE_SPECIAL_CHARS);
                    $email = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_SPECIAL_CHARS);
                    $pwd = filter_input(INPUT_POST, 'inputPassword', FILTER_SANITIZE_SPECIAL_CHARS);

                    insertSchema($db, ['username' => $user, 'email' => $email, 'password' => $pwd]);

                    header('Location: /login#?success');
                } else {
                    //Error conexion BD
                    header('Location: /register#?error=db');
                }
            } else {
                //error vacio
                header('Location: /register#?error=emptyfields');
            }

            //Miramos si viene por login y si viene por cookie le damos otros parametros arriba
        } else if (isset($_POST['login-button']) || $cookie == true) {
            // Miramos que ninguno este vacio
            if (
                filter_input(INPUT_POST, 'inputUser') != null ||
                filter_input(INPUT_POST, 'inputEmail') != null || $cookie == true
            ) {
                require_once 'src/connect.php';
                $db = connectSqlite('appsess');
                if ($db) {
                    if ($cookie == false) {
                        $user = filter_input(INPUT_POST, 'inputUser', FILTER_SANITIZE_SPECIAL_CHARS);
                        $pwd = filter_input(INPUT_POST, 'inputPassword', FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                    require_once 'src/schema.php';

                    //Selecciona el email
                    $email = selectSchema($db, ['username' => $user, 'password' => $pwd]);
                    if (isset($email)) {
                        $_SESSION["email"] = $email;
                        $_SESSION["username"] = $user;
                        if ($cookie == false) {
                            //Si la cookie no esta definida, la definimos
                            setcookie("username", $user, time() + 60 * 60 * 24 * 30, "/");
                            setcookie("password", $pwd, time() + 60 * 60 * 24 * 30, "/");
                        }
                        header('Location: /');
                    } else {
                        header('Location: /login#?error=notExists');
                    }
                } else {
                    //Error conexion BD
                    header('Location: /login#?error=db');
                }
            } else {
                //Elementos vacios
                header('Location: /login#?error=emptyfields');
            }
        } else {
            header('Location: /');
        }
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
