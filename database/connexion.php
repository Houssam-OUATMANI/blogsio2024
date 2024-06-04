<?php

function get_pdo() : PDO {

    static $pdo = null;
    if($pdo === null) {
        $password = '';
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=b2024sio", "root", 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    return $pdo;
}