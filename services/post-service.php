<?php

function handle_store_post() {
    $uri = $_SERVER["REQUEST_URI"];
    require_once  dirname(__DIR__) . "/validations/post-validator.php";
    require_once dirname(__DIR__) . "/models/post-model.php";
    $data = post_validator();

    if($data === null) {
        header("Location:$uri");
        exit();
    }
}

?>