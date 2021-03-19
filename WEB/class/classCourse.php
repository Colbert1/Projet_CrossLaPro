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
    public function setIdCourse($newIdCourse)
    {
    }
    public function setDate($newDate)
    {
    }
    public function setNom($newNom)
    {
    }
    public function getIdCourse()
    {
    }
    public function getDate()
    {
    }
    public function getNom()
    {
    }
    public function init()
    {
    }
}
