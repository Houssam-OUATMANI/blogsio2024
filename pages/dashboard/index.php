<?php
require_once "../../partials/admin-header.php";
require_once "../../middlewares/auth-middleware.php";
require_once "../../middlewares/admin-middleware.php";
require_once "../../models/post-model.php";
require_once "../../models/user-model.php";

auth_middleware();
admin_middleware();


$posts = total_posts();
$post_of_today = get_total_posts_of_today();
$users= total_users();
?>



<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center">
        <h1 class="text-5xl text-center my-20">Tableau de bord</h1>
      <main class="flex - items-center gap-20 justify-center">


          <div class="card w-96 bg-neutral text-neutral-content">
              <div class="card-body items-center text-center">
                  <h2 class="card-title">Nombre d'utilisateurs</h2>
                  <p class="text-9xl"><?= $users['count'] ?></p>
              </div>
          </div>
          <div class="card w-96 bg-neutral text-neutral-content">
              <div class="card-body items-center text-center">
                  <h2 class="card-title">Nombre de publications</h2>
                  <p class="text-9xl"><?= $posts['count']?></p>
              </div>
          </div>

          <div class="card w-96 bg-neutral text-neutral-content">
              <div class="card-body items-center text-center">
                  <h2 class="card-title">Nombre de publications D'aujourd'hui</h2>
                  <p class="text-9xl"><?= $post_of_today['total_posts_of_today']?></p>
              </div>
          </div>
      </main>
        <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

    </div>
    <div class="drawer-side">
        <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
            <!-- Sidebar content here -->
            <li><a href="pages/dashboard">Tableau de bord</a></li>
            <li><a href="pages/dashboard/utilisateurs.php">Utilisateurs</a></li>
            <li><a href="pages/dashboard/publications.php">Publications</a></li>

        </ul>

    </div>
</div>

<!--
    Objectif:
    Récuperer les nombre total de publications, d'aujourd'hui
-->





<?php
require_once "../../partials/footer.php";
?>
