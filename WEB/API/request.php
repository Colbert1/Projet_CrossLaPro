<?php
require_once("../class/classClassement.php");
require_once("../bdd.php");   

//Création du classement
$objClas = new Classement($bdd);

$course = "SN2";
//$course = $_SESSION['nom_course'];
try{
    $objClas->setNomCourse($course);
    $objClas->setIdCourse();
    $users = $objClas->setClassement();
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
/*
//['classement']['ds_num']['us_nom']['us_prenom']['cl_nom']['cl_nom']
$user[x][0] : $nUser (classement)
$user[x][1] : $numDos (dossard)
$user[x][2] : $name (nom)
$user[x][3] : $surname (prenom)
$user[x][4] : $class (classe)
$user[x][5] : $time (temps)
*/

header("Content-type: application/json");
echo json_encode($users);

?>