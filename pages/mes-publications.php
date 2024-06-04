<?php
require_once "../partials/header.php";
require_once "../middlewares/auth-middleware.php";
require_once  "../models/post-model.php";
auth_middleware();

$id = $_SESSION['user']['id'];
$posts = get_posts_by_user_id($id);
?>


<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once  "../services/post-service.php";
    $id = $_POST['id'];
    handle_delete_post($id);
}
?>



<h1 class="text-4xl text-center">Tes publications</h1>
    <div class="overflow-x-auto my-20">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Miniature</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($posts as $post) :?>
            <tr>
                <td><?= $post["id"]?></td>
                <td><?= $post["title"]?></td>
                <td><img class="w-24" src="<?= $post["thumbnail"]?>" alt="Miniature"></td>
                <td><?= $post["created_at"]?></td>
                <td class="flex items-center gap-2">
                    <a href="pages/publications/lire.php?id=<?=$post['id']?>" class="btn btn-outline btn-info">Lire</a>
                    <a href="pages/publications/editer.php?id=<?=$post['id']?>" class="btn btn-outline btn-warning">Editer</a>
                    <form action="" METHOD="post">
                        <input type="hidden" name="id" value="<?=$post['id']?>">
                        <button class="btn btn-outline btn-error">Supprimer</button>
                    </form>

                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
<?php
require_once "../partials/footer.php";