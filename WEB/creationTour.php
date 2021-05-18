<?php
session_start();
require_once("bdd.php");
require("class/classTour.php");
// Récupère les nom des courses dans la table course
$requete = 'SELECT crs_nom FROM course_tbl';
$resultat = $bdd->prepare($requete);
$resultat->execute();
?>
<html>
<!-- 
    SELECTIONNER LA COURSE 
    GRACE A LA SESSION ON CHOISIT ET MEMORISE L'ID DE LA COURSE
    APRES ON SELECTIONNE LA DISTANCE DU TOUR 1
    APRES ON SELECTIONNE LA DISTANCE DU TOUR 2
    APRES ON SELECTIONNE LA DISTANCE DU TOUR 3
    ET AINSI DE SUITE...
    DES QUE L'ON A FINI ON APPUIE SUR TERMINER
 -->
<form action="" method="post">
    <div>
        Selectionnez la course que vous souhaitez configurée
        <div>

            <!-- Menu déroulant avec les noms -->
            <select name="listeCourse">
                <?php
                while ($ligne = $resultat->fetch()) {
                    echo "<option value=course'" . $ligne['crs_id'] . "'>" . $ligne['crs_nom'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div>
        Selectionnez la distance en metres du tour de la course
        <div>
            <input type="number" name="distance" placeholder="Distance" required>
        </div>
    </div>
    <div>
        <!-- BOUTON " + "  AVEC LA POSSIBILITE D'AJOUT LA DISTANCE -->
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
