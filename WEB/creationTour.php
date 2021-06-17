<?php
include "header.php";
include "navbar.php";

// Récupère les nom des courses dans la table course
$sql = 'SELECT crs_nom, crs_id FROM course_tbl';
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll();
$req->closeCursor();

$objTour = new Tour($bdd);

//Sélection course
if (!empty($_POST['listeCourse'])) {
    $objTour->setCourse($_POST['listeCourse']);
    $objTour->setNumTour();
    $_SESSION['idCourse'] = $objTour->getCourse();
    //$infoTour = $_SESSION['nTour'];
    //if($infoTour == 0) $infoTour++;
}
//Sélection Distance
if (!empty($_POST['distanceTour'])) {
    $distance = $_POST['distanceTour'];
    $objTour->setCourse($_SESSION['idCourse']);
    $objTour->setNumTour();
    $objTour->setDistance($distance);
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
            <!-- Menu déroulant avec les noms des courses-->
            <div class="mb-4-text-gray-700 text-center">
                <p>Selectionnez la course que vous souhaitez configurer</p>

                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" name="listeCourse">
                    <?php
                    echo '<option value="0" selected>Sélectionner la course</option>';
                    foreach ($result as $ligne) {

                        echo "<option value='{$ligne['crs_id']}'>" . $ligne['crs_nom'] . "</option>";
                    }
                    ?>
                </select>
                <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" type="submit">Confirmer</button>
            </div>
        </form>
        <!--Distance tour-->
        <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400" action="" method="post">
            <div class="mb-4-text-gray-700 text-center">
                    <!------------------------------------------------------------------------------
                    Selectionnez la distance en metres du tour //* PAS ENCORE CONFIGURE EN BASE 
                    De la course //* RECUPERE DANS LE FORM JUSTE AVANT 
                    ------------------------------------------------------------------------------->
                <p>
                    Selectionnez la distance en metres du tour  <!--n°<php echo $infoTour; ?> --> de la course <?php echo $_POST['listeCourse']; ?>
                </p>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="number" name="distanceTour" placeholder="Distance du tour" required>
                <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" type="submit">Confirmer</button>
            </div>
        </form>
    </div>
</body>

</html>