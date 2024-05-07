
<?php
require_once "../../partials/header.php";

?>
<?php require_once "../../components/input.php" ;?>

<h1 class="text-4xl text-center">Publier un article</h1>

<?php
$http_method = $_SERVER["REQUEST_METHOD"];

if($http_method === "POST") {
    //require_once "../../services/post-service.php";

}
?>



<form class="w-2/3 mx-auto" action="" method="POST">
    <?php html_input("text", "Titre", "Titre de l'article", "title",  $_SESSION["old"]["title"] ?? ''); ?>
    <?php html_input("file", "Miniature", "Miniature", "thumbnail", ''); ?>
    <?php html_input("textarea", "Contenu", "Contenu", "content",  $_SESSION["old"]["content"] ?? ''); ?>

    <button class="btn btn-secondary">Ajouter</button>
</form>

<?php
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require_once "../../partials/footer.php";
?>
