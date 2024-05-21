<div class="navbar bg-base-100">
    <div class="flex-1">
        <a href="index.php" class="btn btn-ghost text-xl">Mon blog </a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal items-center px-1">
           <?php if(isset($_SESSION["connected"]) && $_SESSION["connected"] === true) :?>

               <li><a href="pages/publications/ajouter.php">Publier</a></li>
                <li  class="badge badge-secondary badge-outline">
                    <?= $_SESSION["user"]["firstname"] ?>  <?= $_SESSION["user"]["lastname"] ?>
                </li>
            <?php endif; ?>
            <li>

                <details>
                    <summary>
                        Mon compte
                    </summary>
                    <ul class="p-2 bg-base-100 rounded-t-none">
                        <?php if(!isset($_SESSION["connected"])) :?>
                            <li><a href="pages/inscription.php">Inscription</a></li>
                            <li><a href="pages/connexion.php">Connexion</a></li>
                        <?php else : ?>

                            <li><a href="pages/profile.php">Profile</a></li>
                            <form action="" method="POST">
                                <button class="btn btn-warning" type="submit">Deconnexion</button>
                            </form>
                        <?php endif; ?>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</div>