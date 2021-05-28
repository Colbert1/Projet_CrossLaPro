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

for($i=0;$i<5;$i++) $users[$i] = $i;
header("Content-type: application/json");
echo json_encode($users);

?>