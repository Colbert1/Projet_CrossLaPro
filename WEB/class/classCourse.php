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
    public $idcourse;
    public $nom;
    public $date;
    public $classeparticipantecourse;
    public $distancecourse;
    public $nmbretourcourse;
    public function __construct($idcourse, $nom, $date, $classeparticipantecourse, $distancecourse, $nmbretourcourse)
    {
        $this->_idcourse = $idcourse;
        $this->_nom = $nom;
        $this->_date = $date;
        $this->_classeparticipantecourse = $classeparticipantecourse;
        $this->_distancecourse = $distancecourse;
        $this->_nmbretourcourse = $nmbretourcourse;
    }
    public function creationCourse() //Création d'une course
    {
    }
    public function modificationCourse() //Modification des informations d'une course
    {
    }
    public function suppressionCourse() //Suppression d'une course
    {
    }
}
