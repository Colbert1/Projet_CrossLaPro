<!-- 
    PAGE PROFIL
    AFFICHAGE DES DONNEES DU USER
    AFFICHAGE DES DONNEES SI IL PARTICIPE A UNE COURSE
                ON AFFICHERA QUE LES NOMS DES COURSES
 -->
<?php
require_once("bdd.php");
require("class/classCoureur.php");
require("class/classUser.php");
include "header.php";
include "navbar.php";
?>
<title>Profil</title>
</head>

<body class="bg-blue-300 h-screen">
    <div class="container mx-auto grid justify-items-stretch m-40 relative grid-cols-2 grid-rows-1">
        <!-- AFFICHAGE DES DONNEES DE L'UTILISATEUR -->
        <div class="w-full max-w-xs bg-gray-300 border-2 border-yellow-600">
            <div class="mb-4 text-center border-b-2 border-yellow-600">
                <p>Profil Utilisateur</p>
            </div>
            <div class="mb-4 text-center">
                <?php
                $infoCourse = new User($bdd);
                $infoCourse->afficheInfoUser($mail, $nom, $prenom, $classe);
                ?>
            </div>
            <!-- AFFICHAGE DES DONNEES DE L'UTILISATEUR ET PEUT ETRE COUREUR -->
        </div>
        <div class="w-full max-w-xs bg-gray-300 border-2 border-yellow-600">
            <div class="mb-4 text-center border-b-2 border-yellow-600">
                <p>Profil Coureur</p>
            </div>
            <div class="mb-4 text-center">
                Vous êtes inscrit pour la(les) course(s):
                <?php
                $participant = new Coureur($bdd);
                $participant->setCourse($_SESSION['id']);
                $participant->afficheInfoCoureur();
                ?>
            </div>
        </div>
    </div>
</body>

</html>