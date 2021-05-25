<?php
session_start();
if (isset($_POST['destroy'])) {
    session_destroy();
}

if (!isset($_SESSION['mail'])) {
    header("Location:index.php");
}
require_once("bdd.php");
require("class/classUser.php");
include "header.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Index</title>
</head>

<body>
    <header>
        <form method="POST" action="">
            <button name="destroy" type="submit">Deconnexion</button>
        </form>
    </header>
    <p>Vous êtes connectés</p>
    <p>Où souhaitez-vous aller ?</p>
    <ul>
        <li><a href="classement.php">Page classement</a></li>
        <li><a href="course.php">Page course</a></li>
    </ul>
</body>

</html>