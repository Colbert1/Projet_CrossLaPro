<?php
session_start();
require_once("class/classClassement.php");
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
        <script>
            function classement() {
                var classement = <?php echo json_encode($classement); ?>;
            }

            setInterval(classement(), 30000);
        </script>
        <!--Formulaire sélection classe-->
        <form method="GET" action="">
            <!--Récupération classes-->
        </form>
        <table>
            <tr>
                <th>Rang</th>
                <th>Nom</th>
                <th>Temps</th>
                <th>Classe</th>
                <th>Tour</th>
            </tr>
            <?php if (isset($_GET['classe'])) {
                //Vérification input classe
            } else {
                echo "Sélectionnez une classe";
            }
            //Création du classement 
            ?>
        </table>
    </div>
    <!--Bas de page-->
    <div>
    </div>
</body>

</html>