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