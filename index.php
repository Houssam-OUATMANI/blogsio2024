<?php require_once  "partials/header.php";
    require_once "models/post-model.php";


    var_dump(session_id());
    $count = total_posts()["count"];
    $limit = $_GET["limit"] ?? 10;
    $total_pages = ceil($count/ $limit);
    $page = $_GET["page"] ?? 1;
    $posts = get_posts($page, $limit);
?>

    <form action="" class="my-10">
        <input type="hidden" name="page" value="1">
        <select class="select select-bordered w-full max-w-xs" name="limit">
            <option disabled selected>Nombre de publication par page</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
        </select>
        <button type="submit">Limiter</button>
    </form>



<main class="container mx-auto flex justify-center flex-wrap items-center gap-5 my-20">

    <?php foreach ($posts as $post) :?>
        <div class="card w-96 bg-base-100 shadow-xl">
            <figure><img src="<?= $post['thumbnail']?>" alt="<?= $post['title']?>" /></figure>
            <div class="card-body">
                <h2 class="card-title"><?= $post['title']?></h2>
                <p>Auteur : <?= $post['firstname']?> <?= $post['lastname']?></p>
                <div class="card-actions justify-end">
                    <a class="btn btn-primary" href="pages/publications/lire.php?id=<?= $post['post_id']?>">Lire l'article</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</main>

    <div class="join">
        <?php for ($i = 1; $i <= $total_pages; $i++) :?>
            <a href="index.php?page=<?=$i?>&limit=<?=$limit?>"
               class="join-item btn <?= $page == $i ? 'btn-active' : '' ?>">
                <?=$i ?></a>
        <?php endfor ;?>

    </div>

<?php require_once "partials/footer.php";?>