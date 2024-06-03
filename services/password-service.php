<?php



function  handle_forgot_password() {
    session_start();
    require_once "../models/user-model.php";
    $email = $_POST["email"];
    // Appel a la bdd
    // Verifier si il uy a un utilisateur avec l'email
    $user = get_user_by_email($email);

    // Si NON affiche un message : Aucun compte associe a cet email
    if(!$user) {
        $_SESSION["error"] = "Aucun compte associe a cet email";
        header("Location:/blog/pages/connexion.php");
        exit();
    }
    else {
        // SI OUI
        // GENERER UN TOKEN
        // LE STOCKER DAN LA BDD
        // METTRE LA DATE D'EXIRATION
        // ENVOYER UN EMAIL
    }




    var_dump($user);
}