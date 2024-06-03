
<?php
require_once "../partials/header.php";
require_once "../middlewares/guest-middleware.php";
guest_middleware();

?>
<?php require_once "../components/input.php" ;?>


<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        require_once  "../services/password-service.php";
        handle_forgot_password();
    }

?>

<h1 class="text-4xl text-center">Mot de passe oublie ?</h1>


<form class="w-2/3 mx-auto" action="" method="POST">
    <?php html_input("email", "Ton email", "email", "email",  $_SESSION["old"]["email"] ?? ''); ?>
    <button class="btn btn-secondary">Valider</button>
</form>



<?php
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require_once "../partials/footer.php";
?>

