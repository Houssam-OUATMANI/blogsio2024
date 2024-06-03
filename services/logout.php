<?php
session_start();
$_SESSION["user"] = null;
$_SESSION["connected"] = null;
$_SESSION["success"] = "Tu es deconnecter";

header("Location:/blog");


/*
 *
 *   session start
 *   [
 *      34124713956742985 => [
 *              user = $user,
 *              connceted = true
*            ],
 *      435698653498657 => [
 *
 *            ]
 *      439865734896748956 => [
 *
 *            ]
 *   ]
 *
 *
 *
 */