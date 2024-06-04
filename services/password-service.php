<?php
require_once "../models/token-model.php";
require_once "../models/user-model.php";



function  handle_forgot_password() {

    $current_url = $_SERVER['REQUEST_URI'];
   // session_start();
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
         $token = bin2hex(random_bytes(32));
        // METTRE LA DATE D'EXIRATION
         $expires_at = date('Y-m-d H:i:s', strtotime('+30 minutes'));
         $data= [
             "token" => $token,
             "email" => $email,
             "expires_at" => $expires_at
          ];
        // LE STOCKER DAN LA BDD
         $success = store_token($data);
         if(!$success) {
             $_SESSION["error"] = "Une erreur est survenue";
             header("Location:$current_url");
             exit();
         }
         ini_set("sendmail_from", "no-reply@mon-blog.fr");
         ini_set("smtp_port", 1025);
        // ENVOYER UN EMAIL
        $subject = "Demande de Reset de mdp";
        $firstname = $user['firstname'];
        $message = "
            <h1>Demande de Reset de mdp</h1>
            <p>Bonjour $firstname </p>
            <a href='http://localhost/blog/pages/nouveau-mot-de-passe.php?token=$token&email=$email'>RESET</a>
        ";
        $headers= ['Content-type: text/html'];
        mail($email, $subject, $message, implode('', $headers ));
        $_SESSION['success'] = "Ue mail de Reset De MDP vien de vous etre envoyé";
        header("Location:$current_url");
        exit();
    }

}




function handle_reset_password()
{


    $email = $_POST['email'];
    $password = $_POST['password'];
    $token = $_POST['token'];
    $data = get_token($token);

    if(!$data || $data['is_used'] === 1 || $data['email'] !== $email ||  date('Y-m-d H:i:s') > $data['expires_at']) {
        $_SESSION['error'] = 'Jeton Invalide ou Lien expiré';
        header('Location:/blog');
        exit();
    }

    // Trouve le user de par l'email
    $user = get_user_by_email($email);
    if(!$user) {
            $_SESSION['error'] = 'Jeton Invalide ou Lien expiré';
            header('Location:/blog');
            exit();
    }
    // Hash le new MDP
    $hash = password_hash($password, PASSWORD_DEFAULT);
    // Mise à jour
    $success = update_password_by_email($email, $hash);
               set_token_to_is_used($token);
    if(!$success) {
            $_SESSION['error'] = 'Erreur interne';
            header('Location:/blog');
            exit();
    }

    $_SESSION['success'] = 'Votre mot de passe à bien été mis à jour';
    header('Location:/blog');
    exit();


}