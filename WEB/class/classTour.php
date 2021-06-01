<?php
class Tour
{
    private $_idtour;
    private $_distance;
    private $_numTour;
    private $_course;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function setIdTour($newIdTour)
    {
        $this->_idtour = $newIdTour;
    }

    public function setDistance($distance, $infoTour)
    {
        try {
            $reqInsert = $this->_bdd->query("INSERT INTO `tour_tbl`(`tr_id`, `tr_distance`, `tr_numero`, `crs_id`) 
            VALUES (NULL, " . $distance['distanceTour'] . ", " . $infoTour['tr_numero'] . ", '" . $this->_course . "'");
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function setNumTour()
    {
        $reqTour = $this->_bdd->query("SELECT `tr_numero` FROM `tour_tbl` WHERE crs_id = '" . $this->_course . "' ORDER BY `tr_id` DESC LIMIT 1");
        foreach ($reqTour as  $infoTour) {
            echo $infoTour['tr_numero'];
        }
    }

    public function setCourse($newCourse)
    {
        $this->_course = $newCourse;
    }

    public function getIdTour()
    {
        return $this->_idtour;
    }

    public function getDistance()
    {
        return $this->_distance;
    }

    public function getNumTour()
    {
        return $this->_numTour;
    }

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
