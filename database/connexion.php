<?php

function get_pdo() : PDO {

    static $pdo = null;
    if($pdo === null) {
        $password = 'root';
        $pdo = new PDO("mysql:host=localhost;dbname=b2024sio", "root", $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    return $pdo;
}