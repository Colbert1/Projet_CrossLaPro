<?php
session_start();
require_once("bdd.php");
require("class/classCoureur.php");
require("class/classTour.php");
require("class/classCourse.php");
require("class/classUser.php");
require("class/classClassement.php");

if (isset($_POST['destroy'])) {
    session_destroy();
}
if (!isset($_SESSION['id'])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
