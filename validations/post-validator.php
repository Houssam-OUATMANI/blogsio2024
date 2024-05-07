<?php


function post_validator() {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $thumbnail = $_FILES["thumbnail"];




    if(strlen($title) < 10) {
        $_SESSION["errors"]["title"] = "Le champs titre doit contenir au minimum 10 caracteres";
    }
    if(strlen($content) < 20) {
        $_SESSION["errors"]["content"] = "Le champs contenu  doit contenir au minimum 20 caracteres";
    }
    if(empty($thumbnail["name"])) {
        $_SESSION["errors"]["thumbnail"] = "Le champs miniature est obligatoire";
    }
    if (isset($_SESSION["errors"])) {
        $_SESSION["old"]["title"] = $title;
        $_SESSION["old"]["content"] = $content;
        return null;
    }

    return [
        "title" => htmlspecialchars($title),
        "content" => $content,
        "thumbnail" => $thumbnail

    ];

}