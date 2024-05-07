<?php


function connexion_validator() {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(strlen($password) < 8) {
        $_SESSION["errors"]["password"] = "Le champs mot de passe doit contenir au minimum 8 caracteres";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errors"]["email"] = "Le champs email doit etre un email valide";
    }

    if ($_SESSION["errors"]) {
        $_SESSION["old"]["email"] = $email;
        return null;
    }

    return [
        "email" => $email,
        "password" => $password
    ];
}