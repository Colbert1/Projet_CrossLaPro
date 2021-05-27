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

    public function setNomCourse($nomCourse){
        $this->_nom_course = $nomCourse;
    }

    public function setIdCourse(){
        $req = $this->_bdd->prepare("SELECT `crs_id` FROM `course_tbl` WHERE `crs_nom` = :course");
        $req->bindParam("course",$this->_nom_course,PDO::PARAM_STR);
        $req->execute();
        $id = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $this->_id_course = $id['crs_id'];
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

    /****************************************
    *Mise en place du classement :
    *Sélection du N° de DOSSARD, NOM, PRENOM, CLASSE, TEMPS.
    *Triage DECROISSANT par le temps
    ***************************************
    
SELECT 
            `dossard_tbl`.`ds_num`,
     
            `user_tbl`.`us_nom`,
     
            `user_tbl`.`us_prenom`,
     
            `classe_tbl`.`cl_nom`,
     
            -- si les temps sont au tour
     
            (
     
                  SELECT SUM(`ts_temps`)
     
                  FROM `temps_tbl` aa
     
                         INNER JOIN `tour_tbl` bb
     
                                ON bb.`tr_id` = aa.`tr_id`
     
                                INNER JOIN `course_tbl` cc
     
                                       ON cc.`crs_id` = bb.`crs_id`
     
                  WHERE aa.`pt_id` = c.`pt_id`
     
                  AND cc.`crs_id` = a.`crs_id`
      
            ) as 'Temps cumulés'
     
     FROM
     
            `classeparticipante_tbl` a
     
                  INNER JOIN `course_tbl` b
     
                         ON b.`crs_id` = a.`crs_id`
     
                  INNER JOIN `participant_tbl` c
     
                         ON c.`crs_id` = b.`crs_id`
     
                         INNER JOIN `dossard_tbl` d
     
                                ON d.`ds_id` = c.`ds_id`
     
                         INNER JOIN `user_tbl` f
     
                                ON f.`us_id` = c.`us_id`
     
                  INNER JOIN `classe_tbl` e
     
                         ON e.`cl_id` = a.`cl_id`
     
     ORDER BY 4**/
    public function setClassement(){
        try{
            $req = $this->_bdd->prepare("SELECT
            d.`ds_num`,
            f.`us_nom`,
            f.`us_prenom`,
            e.`cl_nom`,
            aa.`ts_temps`,
            cc.`crs_id`
    FROM
        `temps_tbl` aa,
        `course_tbl` cc,
        `classeparticipante_tbl` a
            INNER JOIN `course_tbl` b
                ON b.`crs_id` = a.`crs_id`
            INNER JOIN `participant_tbl` c
                ON c.`crs_id` = b.`crs_id`
            INNER JOIN `dossard_tbl` d
                ON d.`ds_id` = c.`ds_id`
            INNER JOIN `user_tbl` f
                ON f.`us_id` = c.`us_id`
            INNER JOIN `classe_tbl` e
                ON e.`cl_id` = a.`cl_id`
            
    WHERE aa.`ts_temps` = (
                            SELECT `ts_temps`
                                FROM `temps_tbl` aa
                                INNER JOIN `tour_tbl` bb
                                    ON bb.`tr_id` = aa.`tr_id`
                                INNER JOIN `course_tbl` cc
                                    ON cc.`crs_id` = bb.`crs_id`
                                    WHERE aa.`pt_id` = c.`pt_id`
                                    AND cc.`crs_id` = a.`crs_id`
                    )
    AND cc.`crs_id` = 1
     GROUP BY `ts_temps`");
            $req->bindParam("course",$this->_id_course,PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
                
            return $data;
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
