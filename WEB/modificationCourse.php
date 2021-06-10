<?php
include "header.php";
include "navbar.php";
$sql = 'SELECT crs_nom, crs_id FROM course_tbl';
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll();
$req->closeCursor();
$modifcourse = new Course($bdd);

if (!empty($_POST['listeCourse'])) {
    $_SESSION['idCourse'] = $_POST['listeCourse'];
}

if (isset($_POST['subModifCourse'])) {
    if (!empty($_POST['ModifnomCourse']) && !empty($_POST['ModifdateCourse'])) {
         $modifcourse = new Course($bdd);
         $_SESSION['idCourse'];
        $date = $_POST['ModifdateCourse'];
        $nom = $_POST['ModifnomCourse'];
        $modifcourse->modifCourse($date, $nom);
        
    } else {
        echo "<div>Echec modification de la course</div>";
    }
}
?><title>Modification Course</title>
</head>

<body class="bg-blue-300 h-screen">
    <div class="container mx-auto flex justify-center grid justify-items-start m-40">
        <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400" action="" method="post">
            <div class="mb-4-text-gray-700 text-center">
                <p>Selectionnez la course que vous souhaitez modifier</p>

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
        <div class="w-full max-w-xs pt-6">
            <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400" action="" method="POST">
                <div class="mb-4 text-center">
                    <p>Modification Course <?php echo $_SESSION['idCourse'] ?></p>
                </div>
                <div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="text" name="ModifnomCourse" placeholder="Nom" required>
                </div>
                <div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="date" name="ModifdateCourse" placeholder="Date" required>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" name="subModifCourse" type="submit">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
</body>