<?php
require_once "../../partials/header.php";
require_once "../../models/post-model.php";
require_once "../../vendor/erusev/parsedown/Parsedown.php";

$id= intval($_GET["id"]);
$post = get_post_by_id($id);
if(!$post) {
    header("Location:/blog/pages/404.php");
    exit();
}

$parsedown = new Parsedown();
$content = $parsedown->parse($post["content"]);
?>


<main class="container mx-auto p-5 my-20">
    <?= $content ?>
</main>

<style>
    h1 {
        font-size: 3rem;
        text-align: center;
        margin: 3rem 0;
    }

    h2 {
        font-size: 1.5rem;
        text-align: center;
        margin: 3rem 0;
    }
    p {
        font-size: 1.1rem;
    }

    a {
        color: dodgerblue;
    }

</style>

<?php
require_once "../../partials/footer.php";
?>
