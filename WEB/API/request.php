<?php
    session_start();
    require_once("class/classClassement.php");
    require_once("bdd.php");   

    //Création du classement
    $objClas = new Classement($bdd);
    
    $course = 1;
    //$course = $_SESSION['nom_course'];
    //$objClas->setNomCourse($course);
    //$objClass->setIdCourse();
    $classement = $objClas->setClassement($course);

?>
