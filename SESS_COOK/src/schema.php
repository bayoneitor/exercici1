<?php

function schemaGenerator(PDO $db)
{
    $command = '
            CREATE TABLE IF NOT EXISTS users(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username VARCHAR(100) NOT NULL,
            password VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL
        )';
    try {
        $db->exec($command);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function insertSchema(PDO $db, array $dato)
{
    if (is_array($dato)) {
        foreach ($dato as $key => $value) {
            if ($key == 'username') {
                $user = $value;
            } else if ($key == 'password') {
                $password = $value;
            } else if ($key == 'email') {
                $email = $value;
            }
        }
        $sql = "INSERT INTO users (username, password, email) values ('$user', '$password', '$email')";

        try {

            $db->exec($sql);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
function selectSchema(PDO $db, array $dato)
{
    if (is_array($dato)) {
        foreach ($dato as $key => $value) {
            if ($key == 'username') {
                $user = $value;
            } else if ($key == 'password') {
                $password = $value;
            }
        }
        try {
            $stmt = $db->prepare("SELECT email FROM users WHERE username = :user AND password = :pwd LIMIT 1;");
            $stmt->execute([':user' => $user, ':pwd' => $password]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row[0]['email'];
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
