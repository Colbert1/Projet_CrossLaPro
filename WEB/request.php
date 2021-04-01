<?php
    session_start();
    require_once("classClassement.php");
    require_once("bdd.php");
    

    //Création du classement
    $classement = new Classement($bdd);
    
    $course       = $_SESSION['course'];
    $participants = $classement->setParticipants($course);


?>