<?php
    session_start();
    require_once("class/classClassement.php");
    require_once("bdd.php");
    

    //Création du classement
    $objClas = new Classement($bdd);
    
    $course = $_SESSION['course'];
    $classement = $objClas->getClassement($course);
