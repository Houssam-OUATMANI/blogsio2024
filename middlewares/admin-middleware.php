<?php

function admin_middleware()
{
    if($_SESSION['user']['role'] !== "ADMIN") {
        header("Location:/blog/");
        $_SESSION['error'] = "Action Interdite";
        exit();
    }
}