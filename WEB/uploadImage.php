<?php
include "header.php";
include "navbar.php";

if (isset($_POST['subImageCourse'])) {
    echo "coucou";
}
?>

<body class="bg-blue-300 h-screen">
    <div class="container mx-auto flex justify-center grid justify-items-start m-40">
        <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400" action="" method="post">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group-pj">
                        <p class="text-primary">Selectionnez des pièces jointes</p>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="file" name="piecejointe" multiple="multiple">
                    </div>
                </div>
            </div>
            <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" name="subImageCourse" type="submit">Valider</button>
        </form>
    </div>
</body>
<?php
/* $files = $_FILES['piecejointe']['imgc_fichier'];
    $extension = $_FILES['piecejointe']['imgc_extension'];

    if (!empty($files)) {
        for ($i = 0; $i < sizeof($files); $i++) {
            $filename = $declaId . ' - ' . $files[$i];
        }
        $decla->enregistrerFichier($filename, $declaId, $connexionBdd, $type);
    } */