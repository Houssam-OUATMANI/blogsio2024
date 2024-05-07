<?php
function guest_middleware(): void
{
    if(isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
        header("Location:/blog");
        exit();
    }
}