
<?php
require_once "../partials/header.php";
require_once "../middlewares/guest-middleware.php";
guest_middleware();

?>
<?php require_once "../components/input.php" ;

$token = $_GET['token'];
$email = $_GET['email'];
?>



<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once  "../services/password-service.php";
    handle_reset_password();
}

?>

<h1 class="text-4xl text-center">Reset de Mot de passe oublie ?</h1>


<form class="w-2/3 mx-auto" action="" method="POST">
    <input type="hidden" name="token" value="<?=$token?>">
    <?php html_input("email", "Ton email", "email", "email",  $email); ?>
    <?php html_input("password", "Ton nouveau mot de passe ", "Ton nouveau mot de passe", "password",  $_SESSION["old"]["email"] ?? ''); ?>
    <button class="btn btn-secondary">Valider</button>
</form>



<?php
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require_once "../partials/footer.php";
?>

