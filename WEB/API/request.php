<?php
require_once("../class/classClassement.php");
require_once("../bdd.php");   

//Création du classement
$objClas = new Classement($bdd);

$course = "SN1";
//$course = $_SESSION['nom_course'];
try{
    $objClas->setNomCourse($course);
    $objClas->setIdCourse();
    $classement = $objClas->setClassement();
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

header("Content-type: application/json");
die(json_encode($classement));
