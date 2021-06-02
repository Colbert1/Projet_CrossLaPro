<?php
include "header.php";
include "navbar.php";
$sql = 'SELECT crs_nom, crs_id FROM course_tbl';
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll();
$req->closeCursor();

if (isset($_POST['subSuppressionCourse'])) {
    if (!empty($_POST['listeCourseSuppression'])) {
        $supCourse = new Course($bdd);
        $supCourse->suppCourse();
    }
}
?>
<title>Suppression Course</title>
</head>

<body class="bg-blue-300 h-screen">
    <div class="container mx-auto flex justify-center grid justify-items-start m-40">
        <!-- FORMULAIRE INSCRIPTION COURSE -->
        <div class="w-full max-w-xs pt-6">
            <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400" id="suppressionCourse" action="" method="POST">
                <div class="mb-4 text-center">
                    <p>Suppression Course</p>
                </div>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" name="listeCourseSuppression">
                    <?php
                    echo '<option value="0" selected>Sélectionner la course</option>';
                    foreach ($result as $ligne) {
                        echo "<option value='{$ligne['crs_id']}'>"
                            . $ligne['crs_nom'] . "</option>";
                    }
                    ?>
                </select>
                <div class="mb-4-text-gray-700 text-center">
                    <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" name="subSuppressionCourse" type="submit">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>