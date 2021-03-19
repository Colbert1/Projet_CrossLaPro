<?php
/* -------------------------------------
        Class Course
        Avec la possibilité de :
        Créer une course
        Modifier ses informations
        Supprimer une course
----------------------------------------*/
class Course
{
    private $idcourse;
    private $nom;
    private $date;
    private $classeP; //Classe participante
    private $distance;
    private $nbTour;
    private $bdd;

    //Constructeur : Stockage du PDO
    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    //Création de la course : paramètres de la course (Nom de la course, date de la course, les classes participantes, distance de la course, nombre de tours)
    public function creationCourse($nom, $date, $classeP, $distance, $nbTour) //Création d'une course
    {
    }
    public function modificationCourse() //Modification des informations d'une course
    {
    }
    public function suppressionCourse() //Suppression d'une course
    {
    }
}
