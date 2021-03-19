<?php 
class Classement {
    private $_id_course;
    private $_date_course;
    private $_nom_course;
    private $_participants;
    private $_distance;
    private $_bdd;

    public function __construct() {
        $dsn      = "mysql:dbname=Projet_CrossLaPro;host=192.168.65.183";
        $username = "root";
        $password = "root";

        try {
            $bdd = new PDO($dsn, $username, $password);
            // Activation des erreurs PDO
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
            $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            $this->_bdd = $bdd;
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
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

    public function getIdTour(){

    }

    public function getDistance(){

    }

    public function getTempsDepart(){

    }

    public function setParticipants(){

    }

    public function triAlphabetique(){
        $tabCoureursAlph = $this->_participants;
        $verif = sort($tabCoureursAlph,SORT_STRING);

        if($verif == TRUE){
            return $tabCoureursAlph;
        }else{
            echo "Erreur du tri alphabétique croissant";
        }
    }

    public function triAlphabetiqueDec(){
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