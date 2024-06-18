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
    $thumbnail_url = "public/posts/$thumbnail_name";
     move_uploaded_file($thumbnail["tmp_name"], "$upload_directory/$thumbnail_name");

    $data["thumbnail"] = $thumbnail_url;
    $data["user_id"] = $_SESSION["user"]["id"];

    $success = store_post($data);

    if($success) {
        $_SESSION["success"] = "L'article à bien été publié";
        header("Location:/blog");
    }
    else {
        $_SESSION["error"] = "Une erreur est surevenu";
        header("Location:$uri");
    }
    exit();

}



function  handle_delete_post(int $id)
{
    $uri = $_SERVER["REQUEST_URI"];
    require_once dirname(__DIR__) . "/models/post-model.php";
    $success = delete_post_by_id($id);

    if(!$success) {
        $_SESSION["error"] = "Une erreur est surevenu";
        header("Location:$uri");
        exit();
    }

    $_SESSION["success"] = "La publication à bien été supprimée";
    header("Location:$uri");
    exit();

}


function  handle_update_post()
{
    $uri = $_SERVER["REQUEST_URI"];
    require_once dirname(__DIR__) . "/models/post-model.php";

    $post_id = $_POST['post_id'];
    $data = [
        "title" => $_POST['title'],
        "content" => $_POST['content']
    ];

    // ** Trouver l'article à Metrre à jour ?
    $post = get_post_by_id($post_id);

    // ** Si on la pas trouvée : Traitement 404
    if(!$post) {
        header("Location:/blog/pages/404.php");
        exit();
    }

    // ** Verifier si on à une image ?
    $thumbnail = $_FILES['thumbnail'];
    // ** Si Ok Traitement:
    if(!empty($thumbnail['name'])) {
        $absolute_path = dirname(__DIR__) . '/' . $post['thumbnail'];
        // ** Supprimer l'ancienne image
        unlink($absolute_path);

        // ** Enregistrer la nouvelle
        // ** Enregistrer le chemin dans la bdd
        $upload_directory = dirname(__DIR__) ."/public/posts";
        $thumbnail_name = uniqid() . basename($thumbnail["name"] );
        $thumbnail_url = "public/posts/$thumbnail_name";
        move_uploaded_file($thumbnail["tmp_name"], "$upload_directory/$thumbnail_name");
        $data["thumbnail"] = $thumbnail_url;
    }

   $success =  update_post_by_id($post_id, $data);
    if(!$success) {
        $_SESSION["error"] = "Une erreur est surevenu";
        header("Location:$uri");
        exit();
    }

    $_SESSION["success"] = "La publication à bien été Mise à jour";
    header("Location:/blog/pages/mes-publications.php");
    exit();

}

?>