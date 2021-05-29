<?php
require_once("bdd.php");
require("class/classTour.php");
include "header.php";
include "navbar.php";


// Récupère les nom des courses dans la table course
$sql = 'SELECT crs_nom, crs_id FROM course_tbl';
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll();
$req->closeCursor();

//Sélection course
if (!empty($_POST['listeCourse'])) {
    $_SESSION['$selecCourse'] = $_POST['listeCourse'];
}

if (!empty($_POST['distanceTour'])) {
    $distance = $_POST['distanceTour'];
    $selecCourse = $_SESSION['$selecCourse'];
    $objTour = new Tour($bdd);
    $objTour->setCourse($selecCourse);
    $objTour->setDistance($distance);
    $return = $objTour->ajoutDistanceTour($nbTour);
    if ($return == TRUE) {
        echo "Création du tour effectuée";
    } else {
        echo "Le tour n\'a pas été créé";
    }
}

?>
<title>Création Tour</title>
</head>
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

<body class="bg-blue-300 h-screen">
    <div class="container mx-auto flex justify-center grid justify-items-start m-40">
        <!--Course-->
        <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400" action="" method="post">
            <!-- Menu déroulant avec les noms -->
            <div class="mb-4-text-gray-700 text-center">
                <p>Selectionnez la course que vous souhaitez configurée</p>

                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" name="listeCourse">
                    <?php
                    echo '<option value="0" selected>Sélectionner la course</option>';
                    foreach ($result as $ligne) {

                        echo "<option value='{$ligne['crs_nom']}'>" . $ligne['crs_nom'] . "</option>";
                    }
                    ?>
                </select>
                <button class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-4" type="submit">Confirmer</button>
            </div>
        </form>
        <!--Distance tour-->
        <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400" action="" method="post">
            <div class="mb-4-text-gray-700 text-center">
                <p>
                    <!------------------------------------------------------------------------------
                    Selectionnez la distance en metres du tour //* PAS ENCORE CONFIGURE EN BASE 
                    De la course //* RECUPERE DANS LE FORM JUSTE AVANT 
                    ------------------------------------------------------------------------------->
                    Selectionnez la distance en metres du tour <?php echo $nbTour ?> de la course <?php echo $course ?>
                </p>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="number" name="distanceTour" placeholder="Distance du tour" required>
                <button class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-4" type="submit">Confirmer</button>

            </div>
            <div>
            </div>
        </form>
    </div>
</body>

</html>