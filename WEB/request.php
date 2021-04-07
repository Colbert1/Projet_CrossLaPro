<?php
session_start();
include('bdd.php');
include('class/classClassement.php');

//Continuer l'appel API
$classement = new Classement($bdd);
$tab = $classement->getClassement();
echo json_encode($tab);
?>