<?php
session_start();
require_once("bdd.php");
require("class/classParticipant.php");
$sql = 'SELECT cr_nom, cr_id FROM course_tbl';
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll();
$req->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Page Principale</title>
</head>

<body>

    <!-- FORMULAIRE INSCRIPTION COURSE -->
    <div class="login-box">
        <h2>Inscription Course</h2>
        <form id="inscriptionCourse" action="" method="POST">
            <div>
                <!------------------------------------------------------------ 
                    Ici on affiche le $session lorsque l'on est connecté
                    Il faut que l'on insert en base l'id de la session du user connecté                
                 ------------------------------------------------------------->
            </div>
            <div>
                <select name="listeCourseInscription">
                    <?php
                    echo '<option value="0" selected>Sélectionner la course</option>';
                    foreach ($result as $ligne) {

                        echo "<option value='{$ligne['cr_id']} - {$ligne['cr_nom']}'>"
                            . $ligne['cr_nom'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button name="subInscriptCourse" type="submit">Confirmer</button>
        </form>
    </div>
</body>

</html>