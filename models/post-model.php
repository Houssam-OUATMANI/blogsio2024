<?php
require_once dirname(__DIR__) ."/database/connexion.php";
function store_post(array $data) {
        $pdo = get_pdo();
        $title = $data["title"];
        $content = $data["content"];
        $thumbnail = $data["thumbnail"];
        $user_id = $data["user_id"];

        $query = "INSERT INTO b2024sio.posts(title, content, user_id, thumbnail) VALUES (?, ? , ? , ?)";
        $stmt = $pdo->prepare($query);
        return $stmt->execute([$title, $content, $user_id, $thumbnail]);
}
