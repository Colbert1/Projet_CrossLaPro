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
if (!empty($_POST['distanceTour']) && !empty($_POST['listeCourse'])) {
    $course     = $_POST['listeCourse'];
    $distance   = $_POST['distanceTour'];
    $creacourse = new Tour($bdd);
    $creacourse->getCourse($course);
    $creacourse->getDistance($distance);
    $creacourse->ajoutDistanceTour();
} elseif (empty($_POST['distanceTour']) && !empty($_POST['listeCourse'])) {
    $course     = $_POST['listeCourse'];
} elseif (!empty($_POST['distanceTour']) && empty($_POST['listeCourse'])) {
    $distance   = $_POST['distanceTour'];
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
        echo '<option value="0" selected>Sélectionner la course</option>';
        foreach ($result as $ligne) {

            echo "<option value='{$ligne['crs_id']} - {$ligne['crs_nom']}'>"
                . $ligne['crs_nom'] . "</option>";
        }
        ?>
    </select>
    <button type="submit">Confirmer</button>
</form>
<form action="" method="post">
    <div>
        <p>
            <!------------------------------------------------------------------------------
        Selectionnez la distance en metres du tour //* PAS ENCORE CONFIGURE EN BASE 
        De la course //* RECUPERE DANS LE FORM JUSTE AVANT 
     ------------------------------------------------------------------------------->
            Selectionnez la distance en metres du tour de la course <?php echo $course ?>
        </p>
        <input type="number" name="distanceTour" placeholder="Distance du tour" required>
        <button type="submit">Confirmer</button>
        <p>Le tour N°
            <!-- Num du tour recupéré juste avant --> de la course <?php echo $course ?> est de
            <?php echo $distance ?> m
        </p>
    </div>
    <div>
    </div>
</form>
<form action="" method="post">
    <div>
        <input type="submit">
    </div>
</form>

</html>
<?php
