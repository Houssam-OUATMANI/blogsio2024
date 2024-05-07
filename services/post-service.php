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

    $thumbnail = $data["thumbnail"];
    $upload_directory = dirname(__DIR__) ."/public/posts";
    $thumbnail_name = uniqid() . basename($thumbnail["name"] );
    var_dump($thumbnail_name);
    move_uploaded_file($thumbnail["tmp_name"], "$upload_directory/$thumbnail_name");
    var_dump($thumbnail);



}

?>