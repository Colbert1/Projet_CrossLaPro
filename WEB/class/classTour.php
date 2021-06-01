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

    public function setDistance($distance)
    {
        try {
            $reqInsert = $this->_bdd->prepare("INSERT INTO `tour_tbl`(`tr_id`, `tr_distance`, `tr_numero`, `crs_id`) VALUES (NULL, :distance, :numTour, :course)");
            $reqInsert->bindParam("distance", $distance['distanceTour'], PDO::PARAM_INT);
            $reqInsert->bindParam("course", $this->_course, PDO::PARAM_INT);
            $reqInsert->bindParam("numTour", $this->_numTour, PDO::PARAM_INT);
            $reqInsert->execute();
            
            /* if ($reqInsert === TRUE) {
                $this->_distance = $distance;
            } */
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function setNumTour()
    {
        $reqTour = $this->_bdd->prepare("SELECT `tr_numero` FROM `tour_tbl` WHERE crs_id = :course ORDER BY `tr_id` DESC LIMIT 1");
        $reqTour->bindParam("course", $this->_course, PDO::PARAM_INT);
        $reqTour->execute();
        $result = $reqTour->fetchAll(PDO::FETCH_ASSOC);
        $this->_numTour = $result;
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
