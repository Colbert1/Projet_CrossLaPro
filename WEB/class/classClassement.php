<?php
/***********************************************************************************************************
 * Fonctions set : Initialisent les méthodes de la classe 
 *                  - 1+ paramètres de fonctions : récupération de données de formulaires liés à la méthode
 *                  - 0 paramètre de fonction : appel en BDD pour initialiser les méthodes
 * Fonctions get : Retournent les méthodes de la classe
 * Fonctions auxiliaires : Intéragissent avec les méthodes de la classe 
 ***********************************************************************************************************/
class Classement {
    private $_id_course;
    private $_date_course;
    private $_nom_course;   
    private $_participants;
    private $_distance;
    private $_classement;
    private $_online;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    //Nécessite setNomCourse() en pré-requis
    public function setIdCourse()
    {
        $req = $this->_bdd->prepare("SELECT `crs_id` FROM `course_tbl` WHERE `crs_nom` = :course");
        $req->bindParam("course",$this->_nom_course,PDO::PARAM_STR);
        $req->execute();
        $id = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $this->_id_course = $id['crs_id'];
    }

    //Nécessite setIdCourse() en pré-requis
    public function setDateCourse()
    {
        $req = $this->_bdd->prepare("SELECT `crs_date` FROM `course_tbl` WHERE `crs_id` = :id");
        $req->bindParam("id",$this->_id_course,PDO::PARAM_INT);
        $req->execute();
        $date = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        
        $this->_date_course = $date['crs_date'];
    }

    //Nécessite une valeur initialisée par l'utilisateur en formulaire
    public function setNomCourse($nomCourse)
    {
        $this->_nom_course = $nomCourse;
    }

    public function setParticipants()
    {
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

    public function setDistance()
    {
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

    public function setOnline()
    {
        $socket = fsockopen("localhost",3306);

        if(!$socket){
            $this->_online = FALSE;
        }else{
            $this->_online = TRUE;
        }
    }

    /****************************************
    *Mise en place du classement :
    *Sélection du N° de DOSSARD, NOM, PRENOM, CLASSE, TEMPS.
    *Triage DECROISSANT par le temps
    ***************************************/
 
    public function setClassement()
    {
        try{
            $this->_classement = fetchAll(
                $this->_bdd,
                'SELECT user_tbl.us_nom, user_tbl.us_prenom, ds_num, cl_nom, SEC_TO_TIME(SUM(TIME_TO_SEC(ts_temps))) AS ts_temps_total'
                . ' FROM temps_tbl'
                . ' INNER JOIN participant_tbl ON participant_tbl.pt_id = temps_tbl.pt_id'
                . ' INNER JOIN user_tbl ON user_tbl.us_id = participant_tbl.us_id'
                . ' INNER JOIN dossard_tbl ON dossard_tbl.ds_id = participant_tbl.ds_id'
                . ' INNER JOIN classe_tbl ON classe_tbl.cl_id = user_tbl.cl_id'
                . ' WHERE tr_id IN (SELECT tr_id FROM tour_tbl WHERE crs_id = :crs_id)'
                . ' GROUP BY temps_tbl.pt_id'
                . ' ORDER BY ts_temps_total ASC',
                [ 'crs_id' => $this->_id_course ]
            );
            
            return $this->_classement;
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }

    public function getIdCourse()
    {
        return $this->_id_course;
    }

    public function getDateCourse()
    {
        return $this->_date_course;
    }

    public function getNomCourse()
    {
        return $this->_nom_course;
    }

    public function getParticipants()
    {
        return $this->_participants;
    }

    public function getDistance()
    {
        return $this->_distance;
    }

    public function getClassement()
    {
        return $this->_classement;
    }

    public function getOnline()
    {
        return $this->_online;
    }

    public function triTempsC() 
    {
        $tabCoureursAlph = $this->_participants;
        //A continuer
    }

    public function triTempsD() 
    {
        //A continuer
    }

    public function selectCourse()
    {
        $req = $this->_bdd->prepare("SELECT `crs_id`, `crs_nom` FROM `course_tbl`");
        $req->execute();
        $courses = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        
        return $courses;
    }
}
