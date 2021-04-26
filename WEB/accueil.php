<?php
session_start();
require_once("bdd.php");
require("class/classUser.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
</head>

<body>
    <p>Vous êtes connectés</p>
    <p>Où souhaitez-vous aller ?</p>
    <ul>
        <li><a href="classement.php">Page classement</a></li>
        <li><a href="course.php">Page course</a></li>
    </ul>
</body>

</html>