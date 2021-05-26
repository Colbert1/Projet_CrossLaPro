<?php
//require_once("class/classClassement.php");
//require_once("bdd.php");   

//Création du classement
//$objClas = new Classement($bdd);

//$course = 1;
//$course = $_SESSION['nom_course'];
//$objClas->setNomCourse($course);
//$objClass->setIdCourse();
//$users = $objClas->setClassement($course);

/*
//['classement']['ds_num']['us_nom']['us_prenom']['cl_nom']['cl_nom']
$user[x][0] : $nUser (classement)
$user[x][1] : $numDos (dossard)
$user[x][2] : $name (nom)
$user[x][3] : $surname (prenom)
$user[x][4] : $class (classe)
$user[x][5] : $time (temps)
*/

//Test
for($i=0;$i<5;$i++){
    for($j=0;$j<7;$j++){
        $user[$i][$j] = $j;
    }
}
header("Content-type: application/json");
echo json_encode($user);

?>