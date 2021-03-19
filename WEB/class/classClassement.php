<?php 
class Classement {
    private $_id_course;
    private $_date_course;
    private $_nom_course;
    private $_id_tour;
    private $_distance;
    private $_tempsDepart;
    private $_bdd;
    private $_participants;

    public function __construct() {
        $dsn      = "mysql:dbname=ProjetCross;host=192.168.65.183";
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

    }

    public function getDateCourse(){

    }

    public function getNomCourse(){

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