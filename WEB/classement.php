<?php
session_start();
require_once("class/classClassement.php");
require("test.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="classement.css">
    <title>Classement</title>
</head>
<body>
    <!--Haut de page-->
    <div>
    </div>
    <!--Milieu de page-->
    <div class="mid">
    <div id="affiche">
        <script>setInterval(callApiRand(),500);</script>
    </div>
        <table>
            <tr>
                <th>Rang</th>
                <th>Nom</th>
                <th>Temps</th>
                <th>Classe</th>
                <th>Tour</th>
            </tr>
            <?php
            //Création du classement 
            ?>
        </table>
    </div>
    <!--Bas de page-->
    <div>
    </div>
</body>
</html>