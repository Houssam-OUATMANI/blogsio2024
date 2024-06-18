<?php
function admin_seeder()
{
    require_once "connexion.php";
    $pdo = get_pdo();

    $query = "INSERT INTO b2024sio.users(firstname, lastname, email, password, role) VALUES (?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $success = $stmt->execute([
        "admin",
        "admin",
        "admin@mon-blog.fr",
        password_hash("0123456789", PASSWORD_DEFAULT),
        "ADMIN"
    ]);
    if ($success) {
        echo "Admin ajouté avec succées";
    }
    else {
        echo "Erreur admin seeder";
    }
}

admin_seeder();