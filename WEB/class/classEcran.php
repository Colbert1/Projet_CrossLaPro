<?php
class Ecran 
{
    private $_ec_id;
    private $_ec_nom;
    private $_crs_id;
    private $_bdd;
    
    //Constructeur : Stockage du PDO
    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function setId()
    {
        $id=0;
        $this->_ec_id = $id;
    }

    public function setNom($nom)
    {
        $req = $this->_bdd->prepare("UPDATE `ecran_tbl` SET `ec_nom` = :nom WHERE `ecran_tbl`.`ec_id` = :id");
        $req->bindParam("id",$this->_ec_id,PDO::PARAM_INT);
        $req->bindParam("nom",$nom,PDO::PARAM_STR);
        $req->execute();
        $nom = $req->fetch(PDO::FETCH_ASSOC);

        $this->_ec_nom = $nom;
    }

    public function setCrsId($newCourse)
    {
        $this->_crs_id = $newCourse;
    }

    public function getId()
    {
        return $this->_ec_id;
    }

    public function getNom()
    {
        return $this->_ec_nom;
    }

    public function getCourse()
    {
        return $this->_crs_id;
    }

}