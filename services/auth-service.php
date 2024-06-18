<?php
function handle_inscription() {
    $uri = $_SERVER["REQUEST_URI"];
    require_once "../validations/inscription-validator.php";
    require_once "../models/user-model.php";
    $data = inscription_validator();
    if($data === null) {
        header("Location:$uri");
        exit();
    }

    $user = get_user_by_email($data["email"]);
    if($user) {
        $_SESSION["error"] = "Cet email est déjà associé à un compte";
        header("Location:/blog/pages/inscription.php");
        exit();
    }

    else {
        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        $success = store_user($data);
        if ($success) {
            $_SESSION["success"] = "Inscription validée";
            header("Location:/blog/pages/connexion.php");
            exit();
        }
        else {
            $_SESSION["error"] = "Erreur lors de l'inscription";
            header("Location:/blog/pages/inscription.php");
            exit();
        }
    }




}



function handle_connexion() {
    $uri = $_SERVER["REQUEST_URI"];
    require_once "../validations/connexion-validator.php";
    require_once "../models/user-model.php";
    $data = connexion_validator();
    if($data === null) {
        header("Location:$uri");
        exit();
    }
    $user = get_user_by_email($data["email"]);

    if(!$user) {
        $_SESSION["error"] = "Cet email n'est associé à aucun un compte";
        header("Location:/blog/pages/connexion.php");
        exit();
    }
    if(!password_verify($data["password"], $user["password"])) {
        $_SESSION["error"] = "Le mot de passe est incorrecte";
        header("Location:/blog/pages/connexion.php");
        exit();
    }

    $_SESSION["user"] = $user;
    $_SESSION["connected"] = true;
    $_SESSION["success"] = "Tu es connecté";
    header("Location:/blog");
    exit();
}


function  handle_admin_connexion()
{
    $uri = $_SERVER["REQUEST_URI"];
    require_once "../validations/connexion-validator.php";
    require_once "../models/user-model.php";
    $data = connexion_validator();
    if($data === null) {
        header("Location:$uri");
        exit();
    }
    $user = get_user_by_email($data["email"]);

    if(!$user) {
        $_SESSION["error"] = "Cet email n'est associé à aucun un compte";
        header("Location:/blog/pages/admin-connexion.php");
        exit();
    }
    if(!password_verify($data["password"], $user["password"])) {
        $_SESSION["error"] = "Le mot de passe est incorrecte";
        header("Location:/blog/pages/admin-connexion.php");
        exit();
    }
    if($user['role'] !== "ADMIN") {
        $_SESSION["error"] = "Tu n'es pas admin, tu peux te connecter sur la page de connexion utilisateur";
        header("Location:/blog/pages/connexion.php");
        exit();
    }

    $_SESSION['user'] = $user;
    $_SESSION['connected'] = true;
    $_SESSION['success'] = "Bienvenue cher Admin";
    header('Location:/blog/pages/dashboard');
    exit();

}