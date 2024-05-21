<?php session_start(); ?>
<!doctype html>
<html lang="en" data-theme="cyberpunk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.5/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <title> <?= $title ??= "Mon blog"?></title>
    <base href="/blog/">
</head>
<body>
<main class="container mx-auto">
<?php require_once "navbar.php";

require_once dirname(__DIR__) . "/components/flash.php";

if (isset($_SESSION["error"])) {
    flash_message("error", "alert-error");
}

if (isset($_SESSION["success"])) {
    flash_message("success", "alert-success");
}



