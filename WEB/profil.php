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
    <div class="container mx-auto flex justify-center grid justify-items-stretch m-40 relative grid grid-flow-col grid-cols-2 grid-rows-1 gap-4">
        <!-- FORMULAIRE INSCRIPTION COURSE -->
        <div class="w-full max-w-xs pt-6 bg-gray-300">
            <div class="mb-4 text-center">
                <p>Profil Utilisateur</p>
            </div>
            <div class="mb-4 text-center">
                <?php
                $infoCourse = new User($bdd);
                $infoCourse->afficheInfoUser($mail, $nom, $prenom, $classe);
                ?>
            </div>
            <!-- AFFICHAGE DES DONNEES DE L'UTILISATEUR -->
        </div>
        <div class="w-full max-w-xs pt-6 bg-gray-300">
            <div class="mb-4 text-center">
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
            <!-- AFFICHAGE DES DONNEES DU COUREUR AVEC LES COURSES AUQUELLES IL PARTICIPE
                                      ET PEUT ETRE LES TEMPS QU'IL A FAIT A CELLES-CI -->
        </div>
    </div>

</body>

</html>