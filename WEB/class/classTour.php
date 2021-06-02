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
        $nTour = $this->_numTour;
        $nTour++;
        try {
            $reqInsert = $this->_bdd->prepare("INSERT INTO `tour_tbl`(`tr_id`, `tr_distance`, `tr_numero`, `crs_id`) VALUES (NULL, :distance, :numTour, :course)");
            $reqInsert->bindParam("distance", $distance, PDO::PARAM_INT);
            $reqInsert->bindParam("numTour", $nTour, PDO::PARAM_INT);
            $reqInsert->bindParam("course", $this->_course, PDO::PARAM_INT);
            $verif = $reqInsert->execute();

            if ($verif === TRUE) $this->_distance = $distance;
            echo "La distance de ". $this->_distance ."m a bien été inscrite";
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function setNumTour()
    {
        $req = $this->_bdd->prepare("SELECT COUNT(tr_numero) as nombre FROM `tour_tbl` WHERE `crs_id` = :course GROUP BY `crs_id` LIMIT 1");
        $req->bindParam("course",$this->_course,PDO::PARAM_INT);
        $req->execute();
        $numTour = $req->fetch(PDO::FETCH_ASSOC);

        $this->_numTour = $numTour['nombre'];
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
