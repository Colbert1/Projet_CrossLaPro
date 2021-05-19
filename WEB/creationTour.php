<?php
session_start();
require_once("bdd.php");
require("class/classTour.php");

// Récupère les nom des courses dans la table course
$sql = 'SELECT crs_nom, crs_id FROM course_tbl';
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll();
$req->closeCursor();

//Action des formulaires de la page
if (!empty($_POST['distance']) && !empty($_POST['listeCourse'])) {
    $course     = $_POST['listeCourse'];
    $distance   = $_POST['distance'];
    $creacourse = new Tour($bdd);
    $creacourse->getCourse($course);
    $creacourse->getDistance($distance);
    $creacourse->ajoutDistanceTour();
} elseif (empty($_POST['distance']) && !empty($_POST['listeCourse'])) {
    $course     = $_POST['listeCourse'];
} else {
    echo "<div>Echec de la configuration du tour</div>";
}

?>
<html>
<!---------------------------------------------------------------- 
    SELECTIONNER LA COURSE 
    GRACE A LA SESSION ON CHOISIT ET MEMORISE L'ID DE LA COURSE
    APRES ON SELECTIONNE LA DISTANCE DU TOUR 1
    APRES ON SELECTIONNE LA DISTANCE DU TOUR 2
    APRES ON SELECTIONNE LA DISTANCE DU TOUR 3
    ET AINSI DE SUITE...
    DES QUE L'ON A FINI ON APPUIE SUR TERMINER
 ----------------------------------------------------------------->

<!--Course-->
<form action="" method="post">
    <!-- Menu déroulant avec les noms -->
    <label>
        Selectionnez la course que vous souhaitez configurée
    </label>
    <select name="listeCourse">
        <?php
        foreach ($result as $ligne) {
            echo "<option value='{$ligne['crs_id']}' selected >" . $ligne['crs_nom'] . "</option>";
        }
        ?>
    </select>
    <button type="submit">Confirmer</button>
</form>
<div>
    <p>
        Selectionnez la distance en metres du tour de la course <?php echo $course ?>
    </p>
</div>
<div>
</div>
<div>
    <input type="submit">
</div>
</form>

</html>
<?php
