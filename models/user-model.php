<?php
require_once "../database/connexion.php";


function get_user_by_email(string $email) {
        $pdo = get_pdo();
        $query = "SELECT * FROM b2024sio.users WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch();
}


function store_user(array $data) {
    $firstname =  $data['firstname'];
    $lastname =  $data['lastname'];
    $email =  $data['email'];
    $password =  $data['password'];

    $pdo = get_pdo();
    $query = "INSERT INTO b2024sio.users (firstname, lastname, email, password) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute( [$firstname, $lastname, $email, $password]);

}

function get_user_info() {
    //session_start();
    $pdo = get_pdo();
    $id = $_SESSION["user"]["id"];
    $query = "SELECT * FROM b2024sio.users WHERE id = $id";
    $stmt = $pdo->query($query);
    return $stmt->fetch();
}