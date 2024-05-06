<?php

function inscription_validator() {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(strlen($firstname) < 3) {
        $_SESSION["errors"]["firstname"] = "Le champs prénom doit contenir au minimum 3 caracteres";
    }
    if(strlen($lastname) < 3) {
        $_SESSION["errors"]["lastname"] = "Le champs nom de famille doit contenir au minimum 3 caracteres";
    }
    if(strlen($password) < 8) {
        $_SESSION["errors"]["password"] = "Le champs mot de passe doit contenir au minimum 8 caracteres";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errors"]["email"] = "Le champs email doit etre un email valide";
    }

    if ($_SESSION["errors"]) {
        $_SESSION["old"]["firstname"] = $firstname;
        $_SESSION["old"]["lastname"] = $lastname;
        $_SESSION["old"]["email"] = $email;
        return null;
    }

    return [
      "firstname" => htmlspecialchars($firstname),
      "lastname" => htmlspecialchars($lastname),
      "email" => $email,
      "password" => $password
    ];


}
