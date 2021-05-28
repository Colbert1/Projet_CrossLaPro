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

    public function setIdCourse(){
        $req = $this->_bdd->prepare("SELECT `crs_id` FROM `course_tbl` WHERE `crs_nom` = :course");
        $req->bindParam("course",$this->_nom_course,PDO::PARAM_STR);
        $req->execute();
        $id = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $this->_id_course = $id['crs_id'];
    }

    public function setDateCourse(){
        $req = $this->_bdd->prepare("SELECT `crs_date` FROM `course_tbl` WHERE `crs_id` = :id");
        $req->bindParam("id",$this->_id_course,PDO::PARAM_INT);
        $req->execute();
        $date = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        
        $this->_date_course = $date['crs_date'];
    }

    public function setNomCourse($nomCourse){
        $this->_nom_course = $nomCourse;
    }

    public function setParticipants(){
        $req = $this->_bdd->prepare("SELECT us.`us_id` 
        FROM 
            `user_tbl` us
            INNER JOIN `participant_tbl` pt
                ON us.`us_id` = pt.`us_id`
            INNER JOIN `course_tbl` crs
                ON crs.`crs_id` = pt.`crs_id`
        WHERE
            crs.`crs_id` = :course
        ORDER BY 1");
        $req->bindParam("course",$this->_id_course,PDO::PARAM_INT);
        $req->execute();
        $participants = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $this->_participants = $participants['us_id'];
    }

    public function setDistance(){
        $req = $this->_bdd->prepare("SELECT `tr_distance`
        FROM 
            `tour_tbl` tr
            INNER JOIN `course_tbl` crs
                ON tr.`crs_id` = crs.`crs_id`
        WHERE
            crs.`crs_id` = :course");
        $req->bindParam("course",$this->_id_course,PDO::PARAM_INT);
        $req->execute();
        $distance = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $this->_distance = $distance['tr_distance'];
    }

    public function setOnline(){
        $socket = fsockopen("localhost",3306);

        if(!$socket){
            $this->_online = FALSE;
        }else{
            $this->_online = TRUE;
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
    ***************************************/
 
    public function setClassement(){
        try{
            /* 
SELECT 
	ds.`ds_num`, 
    us.`us_nom`, 
    us.`us_prenom`, 
    cl.`cl_nom`, 
    MAX(ts_temps)
FROM
	`participant_tbl` pt
    INNER JOIN `user_tbl` us
    	ON pt.`us_id` = us.`us_id`
    INNER JOIN `dossard_tbl` ds
    	ON ds.`ds_id` = pt.`ds_id`
    INNER JOIN `course_tbl` crs
    	ON crs.`crs_id` = pt.`crs_id`
    INNER JOIN `temps_tbl` ts
    	ON ts.`pt_id` = pt.`pt_id`
    INNER JOIN `classeparticipante_tbl` clp
    	ON crs.`crs_id` = clp.`crs_id`
    INNER JOIN `classe_tbl` cl
    	ON cl.`cl_id` = us.`cl_id`
    INNER JOIN `tour_tbl` tr
    	ON crs.`crs_id` = tr.`crs_id`
		AND tr.`tr_id` = ts.`tr_id`
WHERE
	crs.`crs_id` = 1
GROUP BY `ts_temps`
            */
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
    AND cc.`crs_id` = :course
    GROUP BY `ts_temps`");
            $req->bindParam("course",$this->_id_course,PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_NUM);
            $req->closeCursor();
            
            $this->_classement = $data;
            return $this->_classement;
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }

    //SetParticipants avant de triAlphaC
    public function triAlphaC(){
        $tab = $this->_classement;
        $verif = sort($tab,SORT_STRING);

        if($verif == TRUE){
            return $tab;
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
