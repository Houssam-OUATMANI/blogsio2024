<?php
require_once "../database/connexion.php";

function  store_token($data) {
    $pdo = get_pdo();
    $query = "INSERT INTO b2024sio.tokens( token, email, expires_at) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([$data['token'], $data['email'], $data['expires_at']]);
}
