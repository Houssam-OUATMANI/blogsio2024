<?php
require_once "../middlewares/auth-middleware.php";
require_once  "../partials/header.php";
auth_middleware();
require_once  "../models/user-model.php";
//$user = $_SESSION["user"];

$user = get_user_info();
?>


<div class="container mx-auto">
        <h1 class="text-center text-4xl my-20">Ton Profile</h1>

        <ul>
            <li>Nom: <?= $user["lastname"] ?> </li>
            <li>Prenom:  <?= $user["firstname"] ?>  </li>
            <li>Email:  <?= $user["email"] ?>  </li>
            <li>Role:  <?= $user["role"] ?>  </li>
            <li>Date d'inscription: <?= $user["created_at"] ?> </li>

        </ul>
</div>



<?php
require_once  "../partials/header.php";

?>