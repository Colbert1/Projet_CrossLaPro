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

    public function setParticipants($nCourse){
        try {
            $req = $this->_bdd->prepare("SELECT `user`.`us_nom`, `dossard`.`ds_numero`, `classe`.`cl_nom`, `course`.`cr_nom` 
                                        FROM `participant`, `user`, `classe`, `course`, `dossard` 
                                        WHERE `user`.`us_id` = `participant`.`us_id` 
                                                AND `dossard`.`ds_id` = `participant`.`ds_id` 
                                                AND `user`.`cl_id` = `classe`.`cl_id` 
                                                AND `course`.`cr_id` = `participant`.`cr_id`
                                                AND `course`.`cr_nom` = :course");
            $req->bindParam("course",$nCourse,PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll();
            $req->closeCursor();
            $this->_participants = $data;
            
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
        
    }

    //SetParticipants avant de triAlphaC
    public function triAlphaC(){
        $tabCoureursAlph = $this->_participants;
        $verif = sort($tabCoureursAlph,SORT_STRING);

        if($verif == TRUE){
            return $tabCoureursAlph;
        }else{
            echo "Erreur du tri alphabétique croissant";
        }
    }

    //SetParticipants avant de triAlphaD
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
        $tabCoureursAlph = $this->_participants;
        //A continuer
    }

    public function triTempsD() {
        //A continuer
    }
}
?>