<?php
require_once("../class/classClassement.php");
require_once("../class/classEcran.php");
require_once("../bdd.php");   

//Création du classement
$objClas = new Classement($bdd);
$objEcr = new Ecran($bdd);

//Valeur test
$course = "SN1";
try{
    /*On récupère le nom de l'écran en bdd
    Récupération écran
    $objEcr->setId();
    $objEcr->setNom();
    $course = $objEcr->getNom();
    */
    $objClas->setNomCourse($course);
    $objClas->setIdCourse();
    $classement = $objClas->setClassement();
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

header("Content-type: application/json");
die(json_encode($classement));
