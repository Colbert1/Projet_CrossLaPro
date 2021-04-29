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
        <form id="creation" action="" method="POST">
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
<?php

$_nom   = $_POST['nom'];
$_date  = $_POST['date'];


if (!empty($_POST['nom']) && !empty($_POST['date'])) {

    $creacourse = new Course($bdd);
    $creacourse->setDate($_date);
    $creacourse->setNom($_nom);
    $creacourse->createCourse();
    echo $_POST['nom'];
} else {
    echo "<div>Echec création de la course</div>";
}

?>