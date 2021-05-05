<?php
class Tour
{
    private $_idtour;
    private $_distance;
    private $_course;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    public function ajoutDistanceTour()
    {
        try {
            $req = $this->_bdd->prepare("INSERT INTO `tour_tbl`(`tr_id`, `tr_distance`, `crs_id`) VALUES (NULL, '" . $this->_distance . "', '" . $this->_course . "')");
            $req->execute();
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage();
        }
    }
    public function setIdTour($newIdTour)
    {
        $this->_idtour = $newIdTour;
    }
    public function setDistance($newDistance)
    {
        $this->_distance = $newDistance;
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
    public function getCourse()
    {
        return $this->_course;
    }
    public function init()
    {
        $requete = $this->_bdd->query("SELECT `tr_id`, `tr_distance`, `crs_id` FROM `tour_tbl` WHERE crs_id = " . $this->_idcourse);
        $dataTour = $requete->fetch();
        $this->_idtemps = $dataTour['tr_id'];
        $this->_distance = $dataTour['tr_distance'];
        $this->_course = $dataTour['crs_id'];
    }
}
