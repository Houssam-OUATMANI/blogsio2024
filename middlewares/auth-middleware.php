<?php

function auth_middleware(): void
{
    if (!isset($_SESSION['connected'])) {
        header("Location:/blog/pages/connexion.php");
        exit();
    }
}