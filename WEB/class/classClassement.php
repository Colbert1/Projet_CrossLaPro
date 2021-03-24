<?php 
class Classement {
    private $_id_course;
    private $_date_course;
    private $_nom_course;
    private $_participants;
    private $_distance;
    private $_classement;
    private $_online;
    private $_bdd;

    public function __construct($bdd) {
        $this->_bdd = $bdd;
    }

    public function getIdCourse() {
        return $this->_id_course;
    }

    public function getDateCourse(){
        return $this->_date_course;
    }

    public function getNomCourse(){
        return $this->_nom_course;
    }

    public function getParticipants(){
        return $this->_participants;
    }

    public function getDistance(){
        return $this->_distance;
    }

    public function getClassement(){
        return $this->_classement;
    }

    public function getOnline(){
        return $this->_online;
    }

    public function setParticipants(){

    }

    public function triAlphabetiqueC(){
        $tabCoureursAlph = $this->_participants;
        $verif = sort($tabCoureursAlph,SORT_STRING);

        if($verif == TRUE){
            return $tabCoureursAlph;
        }else{
            echo "Erreur du tri alphabétique croissant";
        }
    }

    public function triAlphaD(){
        $tabCoureursAlph2 = $this->_participants;
        $verif = rsort($tabCoureursAlph2,SORT_STRING);

        if($verif == TRUE){
            return $tabCoureursAlph2;
        }else{
            echo "Erreur du tri alphabétique décroissant";
        }
    }

    public function triTempsC() {
 
    }

    public function triTempsD() {

    }
}
?>