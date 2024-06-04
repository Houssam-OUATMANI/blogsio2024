<?php
require_once "../database/connexion.php";

function  store_token($data) {
    $pdo = get_pdo();
    $query = "INSERT INTO b2024sio.tokens( token, email, expires_at) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([$data['token'], $data['email'], $data['expires_at']]);
}



function get_token(string $token)
{
    $pdo = get_pdo();
    $query = "SELECT * FROM b2024sio.tokens WHERE token = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$token]);
    return $stmt->fetch();
}

function  set_token_to_is_used(string $token)
{
    $pdo = get_pdo();
    $query = "UPDATE b2024sio.tokens SET is_used = 1 WHERE token = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$token]);
}