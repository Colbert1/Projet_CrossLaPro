<?php
session_start();
require_once("request.php");
include "header.php";

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
        <script src="API/callRequest.php"></script>
        <table>
            <tr>
                <th>Rang</th>
                <th>Nom</th>
                <th>Temps</th>
                <th>Classe</th>
                <th>Tour</th>
            </tr>
        </table>
    </div>
    <!--Bas de page-->
    <div>
    </div>
</body>

</html>