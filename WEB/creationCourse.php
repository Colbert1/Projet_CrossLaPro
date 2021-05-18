<?php
session_start();
require_once("bdd.php");
require("class/classCourse.php");

if (isset($_POST['subCreaCourse'])) {
    if (!empty($_POST['nomCourse']) && !empty($_POST['dateCourse'])) {
        $date = $_POST['dateCourse'];
        $nom = $_POST['nomCourse'];
        $creacourse = new Course($bdd);
        $creacourse->setDate($date);
        $creacourse->setNom($nom);
        $creacourse->createCourse();
    } else {
        echo "<div>Echec création de la course</div>";
    }
}

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
        <form action="" method="POST">
            <div>
                <input type="text" name="nomCourse" placeholder="Nom" required>
            </div>
            <div>
                <input type="date" name="dateCourse" placeholder="Date" required>
            </div>
            <button name="subCreaCourse" type="submit">Confirmer</button>
        </form>
    </div>

    <!--Bas de page-->
    <div>
    </div>
</body>

</html>