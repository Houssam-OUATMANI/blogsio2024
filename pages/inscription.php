<?php require_once "../partials/header.php"; ?>
<?php require_once "../components/input.php" ;?>
<h1 class="text-4xl text-center">Page d'inscription</h1>

<?php
$http_method = $_SERVER["REQUEST_METHOD"];

if($http_method === "POST") {
    require_once "../services/auth-service.php";
    handle_inscription();
}
?>



<form class="w-2/3 mx-auto" action="" method="POST">
    <?php html_input("text", "Ton prénom", "prénom", "firstname", $_SESSION["old"]["firstname"] ?? ''); ?>
    <?php html_input("text", "Ton nom", "nom", "lastname",  $_SESSION["old"]["lastname"] ?? ''); ?>
    <?php html_input("email", "Ton email", "email", "email",  $_SESSION["old"]["email"] ?? ''); ?>
    <?php html_input("password", "Ton mot de passe", "mot de passe", "password", ''); ?>
    <button class="btn btn-secondary">Inscription</button>
</form>

<?php
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require_once "../partials/footer.php";
?>

