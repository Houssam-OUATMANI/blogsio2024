<?php require_once "../partials/header.php"; ?>
<?php require_once "../components/input.php" ;?>
<h1 class="text-4xl text-center">Page d'inscription</h1>

<form class="w-2/3 mx-auto" action="" method="POST">
    <?php html_input("text", "Ton prénom", "prénom", "firstname"); ?>
    <?php html_input("text", "Ton nom", "nom", "lastname"); ?>
    <?php html_input("email", "Ton email", "email", "email"); ?>
    <?php html_input("password", "Ton mot de passe", "mot de passe", "password"); ?>
    <button class="btn btn-secondary">Inscription</button>
</form>

<?php require_once "../partials/footer.php"; ?>

