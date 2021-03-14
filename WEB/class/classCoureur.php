<?php
require_once("bdd.php");
/* -------------------------------------
        Class Coureur
        Avec la possibilité de :
        Ajouter un coureur à une course
        Modifier ses informations
        Supprimer un coureur à une course
----------------------------------------*/
class Coureur
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_classe;
    private $_mail;
    private $_motdepasse;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    
    
    public function ajoutCoureur()
    {
        //Ajout d'un coureur à une course
    }
    public function modifierCoureur()
    {
        //Modification des informations du coureur
    }
    public function supprimerCoureur()
    {
        //Suppression d'un coureur à une course
    }
}
