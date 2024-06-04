
<?php
require_once "../../partials/header.php";
require_once "../../middlewares/auth-middleware.php";
auth_middleware();
require_once "../../models/post-model.php";

$id = $_GET['id'];
$post = get_post_by_id($id);

if(!$post) {
    $_SESSION['error'] = "La publication n'est plus disponible";
    header("Location:/blog/pages/404.php");
    exit();
}

?>
<?php require_once "../../components/input.php" ;?>

<h1 class="text-4xl text-center">Editer un article <?=$id?> </h1>

<?php
$http_method = $_SERVER["REQUEST_METHOD"];
/*
if($http_method === "POST") {
    require_once "../../services/post-service.php";
    handle_store_post();

}
*/
?>



<form class="w-2/3 mx-auto" action="" method="POST" enctype="multipart/form-data">
    <?php html_input("text", "Titre", "Titre de l'article", "title",  $post["title"] ?? ''); ?>
    <?php html_input("file", "Miniature", "Miniature", "thumbnail", ''); ?>
    <?php html_input("textarea", "Contenu", "Contenu", "content",  $post["content"] ?? ''); ?>
    <button class="btn btn-secondary">Editer</button>
</form>


<script>
    const simplemde = new SimpleMDE({ element: document.querySelector("textarea") });
</script>

<?php
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require_once "../../partials/footer.php";
?>

