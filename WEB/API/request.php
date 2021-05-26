<?php
    //require_once("class/classClassement.php");
    //require_once("bdd.php");   

    //Création du classement
    //$objClas = new Classement($bdd);
    
    //$course = 1;
    //$course = $_SESSION['nom_course'];
    //$objClas->setNomCourse($course);
    //$objClass->setIdCourse();
    //$classement = $objClas->setClassement($course);
    $tab['ds_num'] = '{3}';
    $tab['us_nom'] = "Test";
    $tab['us_prenom'] = "Jean";
    $tab['cl_nom'] = "SN2";
    $tab['ts_temps'] = "04h23m35s";  

    $classement = json_encode($tab);

    header("Content-type: application/json");
    echo $classement;
