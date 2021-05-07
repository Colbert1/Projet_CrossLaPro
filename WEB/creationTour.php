<?php

/*********************************
Paramétrage du tour : Distance selon le nom de la course
 ********************************/
session_start();
require_once("bdd.php");
require("class/classTour.php");
?>
<html>
<form action="" method="post">
    <div>
        Selectionnez la course que vous souhaitez configurée
        <div>
            <?php
            // Récupère les nom des courses dans la table course
            $requete = 'SELECT crs_nom FROM course_tbl';
            $resultat = $bdd->prepare($requete);
            $resultat->execute();

            if (!$resultat) {
                echo "Problème de requete";
            } else {
            ?>
                <!-- Menu déroulant avec les noms -->
                <select name="listeCourse">
                    <?php
                    while ($ligne = $resultat->fetch()) {
                        echo "<option value=course'" . $ligne['crs_id'] . "'>" . $ligne['crs_nom'] . "</option>";
                    }
                    ?>
                </select>
            <?php
            } // fin du else
            $resultat->closeCursor(); // libère le résultat
            ?>
        </div>
    </div>
    <div>
        Selectionnez la distance en metres du tour de la course
        <div>
            <input type="number" name="distance" placeholder="Distance" required>
        </div>
    </div>
    <div>
        <input type="number" name="nombre de tour" placeholder="NbTour" required>
    </div>
    <div>
        <input type="submit">
    </div>
</form>

</html>
<?php
if (!empty($_POST['distance']) && !empty($_POST['listeCourse'])) {
    $_course     = $_POST['listeCourse'];
    $_distance   = $_POST['distance'];

    $creacourse = new Tour($bdd);
    $creacourse->getCourse($_course);
    $creacourse->getDistance($_distance);
    $creacourse->ajoutDistanceTour();
} else {
    echo "<div>Echec de la configuration du tour</div>";
}
