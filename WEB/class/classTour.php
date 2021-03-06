<?php
class Tour
{
    private $_idtour;
    private $_distance;
    private $_numTour;
    private $_course;
    private $_bdd;

    //Constructeur : Stockage du PDO
    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    /*
        INITIALISE L'ID DU TOUR
    */
    public function setIdTour($newIdTour)
    {
        $this->_idtour = $newIdTour;
    }
    /*
        INITIALISE LA DISTANCE D'UN TOUR
    */
    public function setDistance($distance)
    {
        $nTour = $this->_numTour;
        $nTour++;
        try {
            $reqInsert = $this->_bdd->prepare("INSERT INTO `tour_tbl`(`tr_id`, `tr_distance`, `tr_numero`, `crs_id`) VALUES (NULL, :distance, :numTour, :course)");
            $reqInsert->bindParam("distance", $distance, PDO::PARAM_INT);
            $reqInsert->bindParam("numTour", $nTour, PDO::PARAM_INT);
            $reqInsert->bindParam("course", $this->_course, PDO::PARAM_INT);
            $verif = $reqInsert->execute();

            if ($verif === TRUE) $this->_distance = $distance;
            echo "La distance de " . $this->_distance . "m a bien été inscrite";
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage();
        }
    }
    /*
        INITIALISE LE NUMERO DU TOUR
    */
    public function setNumTour()
    {
        $req = $this->_bdd->prepare("SELECT COUNT(tr_numero) as nombre FROM `tour_tbl` WHERE `crs_id` = :course GROUP BY `crs_id`");
        $req->bindParam("course", $this->_course, PDO::PARAM_INT);
        $req->execute();
        $numTour = $req->fetch(PDO::FETCH_ASSOC);

        $this->_numTour = $numTour['nombre'];
    }
    /*
        INITIALISE LA COURSE QUE L'ON VEUT CONFIGURER
    */
    public function setCourse($newCourse)
    {
        $this->_course = $newCourse;
    }
    /*
        RECUPERE L'ID DU TOUR
    */
    public function getIdTour()
    {
        return $this->_idtour;
    }
    /*
        RECUPERE LA DISTANCE DU TOUR
    */
    public function getDistance()
    {
        return $this->_distance;
    }
    /*
        RECUPERE DU TOUR
    */
    public function getNumTour()
    {
        return $this->_numTour;
    }
    /*
        RECUPERE LA COURSE QUE L'ON VEUT CONFIGURER
    */
    public function getCourse()
    {
        return $this->_course;
    }
    public function init()
    {
        $req = $this->_bdd->query("SELECT `tr_id`, `tr_distance`, `crs_id` FROM `tour_tbl` WHERE crs_id = " . $this->_idcourse);
        $dataTour = $req->fetch();
        $this->_idtemps = $dataTour['tr_id'];
        $this->_distance = $dataTour['tr_distance'];
        $this->_course = $dataTour['crs_id'];
    }
}
