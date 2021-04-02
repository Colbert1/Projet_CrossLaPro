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
            $req = $this->_bdd->prepare("SELECT `user_tbl`.`us_nom`, `dossard_tbl`.`ds_num`, `classe_tbl`.`cl_nom`, `course_tbl`.`crs_nom` 
                                        FROM `participant_tbl`, `user_tbl`, `classe_tbl`, `course_tbl`, `dossard_tbl` 
                                        WHERE `user_tbl`.`us_id` = `participant_tbl`.`us_id` 
                                                AND `dossard_tbl`.`ds_id` = `participant_tbl`.`ds_id` 
                                                AND `user_tbl`.`cl_id` = `classe_tbl`.`cl_id` 
                                                AND `course_tbl`.`crs_id` = `participant_tbl`.`crs_id`
                                                AND `course_tbl`.`crs_nom` = :course");
            $req->bindParam("course",$nCourse,PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll();
            $req->closeCursor();
            return $this->_participants = $data;
            
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
        
    }

    public function getClassement(){
        try{
           /*On appelle en bdd : 
            *Nom, Prénom, Temps total, Meilleur temps
            *    Meilleur temps : select dans l'ordre décroissant et prendre la premiere valeur retournée
            */
            //Requête en construction
            $req = $this->_bdd->prepare("SELECT `participant_tbl`.`us_nom`, `participant_tbl`.`us_prenom`, `ts_temps` 
            FROM `participant_tbl`, `user_tbl`, `temps_tbl`, `course_tbl` 
                WHERE 
                    `participant_tbl`.`us_nom` = `participant_tbl`.`crs_id` 
                AND
                    `participant_tbl`.`us_prenom` = `participant_tbl`.`crs_id`
                AND
                    `participant_tbl`.`crs_id` = `course_tbl.`.`crs_nom`
                AND
                    `course_tbl`.`crs_nom` = --Nom course-- 
                AND
                    `temps_tbl`.`ts_temps` = `participant`.`pt_id`");
            $req->execute();
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