<?php
require_once("../class/classClassement.php");
require_once("../class/classEcran.php");
require_once("../bdd.php");   

//Création du classement
$objClas = new Classement($bdd);
$objEcr = new Ecran($bdd);

//Valeur test


try{
    $headers = getallheaders();
    $course = explode("=", $headers['Referer']);
    
    $objClas->setNomCourse($course[1]);
    $objClas->setIdCourse();
    $classement = $objClas->setClassement();
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

header("Content-type: application/json");
die(json_encode($classement));