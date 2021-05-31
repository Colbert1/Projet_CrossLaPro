<?php
include "header.php";
include "navbar.php";
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
    <title>Création d'une course</title>
</head>

<body class="bg-blue-300 h-screen">
    <div class="container mx-auto flex justify-center grid justify-items-start m-40">
        <div class="w-full max-w-xs pt-6">
            <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400" action="" method="POST">
                <div class="mb-4 text-center">
                    <p>Création Course</p>
                </div>
                <div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="text" name="nomCourse" placeholder="Nom" required>
                </div>
                <div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="date" name="dateCourse" placeholder="Date" required>
                </div>

                <div class="mb-4-text-gray-700 text-center">
                    <button class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-2" name="subCreaCourse" type="submit">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>