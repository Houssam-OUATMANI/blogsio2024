
<?php
require_once "../partials/header.php";
require_once "../middlewares/guest-middleware.php";
guest_middleware();

?>
<?php require_once "../components/input.php" ;?>

<h1 class="text-4xl text-center">Page de connexion</h1>

<?php
$http_method = $_SERVER["REQUEST_METHOD"];

if($http_method === "POST") {
    require_once "../services/auth-service.php";
    handle_connexion();
}
?>



<form class="w-2/3 mx-auto" action="" method="POST">
    <?php html_input("email", "Ton email", "email", "email",  $_SESSION["old"]["email"] ?? ''); ?>
    <?php html_input("password", "Ton mot de passe", "mot de passe", "password", ''); ?>
    <button class="btn btn-secondary">Connexion</button>
</form>

<?php
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require_once "../partials/footer.php";
?>

