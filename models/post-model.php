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


function get_posts(int $page  = 1, int $limit = 10)
{
    $offset = $limit * ($page - 1);
    $pdo = get_pdo();
    $query ="SELECT  
                u.id AS user_id,
                p.id AS post_id,
                u.firstname,
                u.lastname,
                title,
                p.created_at,
                user_id,
                thumbnail 
            FROM b2024sio.posts AS p
            JOIN b2024sio.users AS u  on p.user_id = u.id
            ORDER BY p.created_at DESC 
            LIMIT :limit OFFSET :offset
    ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("limit", $limit, PDO::PARAM_INT);
    $stmt->bindParam("offset", $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}


function get_post_by_id(int $post_id)
{
    $pdo = get_pdo();
    $query = "SELECT * FROM b2024sio.posts WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$post_id]);
    return $stmt->fetch();

}

function total_posts()
{
    $pdo = get_pdo();
        $query = "SELECT COUNT(*) AS count FROM b2024sio.posts";
        $stmt = $pdo->query($query);
        return $stmt->fetch();
}