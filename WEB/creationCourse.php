<?php
session_start();
require_once("bdd.php");
require("class/classCourse.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
</head>

<body>
    <div class="login-box">
        <h2>Création Course</h2>
        <form id="création" action="" method="POST">
            <div>
                <input type="text" name="nom" placeholder="Nom" required>
            </div>
            <div>
                <input type="date" name="date" placeholder="Date" required>
            </div>
            <button type="submit">Confirmer</button>
        </form>
    </div>

    <!--Bas de page-->
    <div>
    </div>
</body>

</html>