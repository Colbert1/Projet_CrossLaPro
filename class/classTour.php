<?php
class Tour
{
    private $_idtour;
    private $_distance;
    private $_nbTour;
    private $_course;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    public function ajoutDistanceTour()
    {
        try {
            $pre = $this->_bdd->query("SELECT `crs_id` FROM `course_tbl` WHERE `crs_nom` = '".$this->_course."'");
            $course = $pre->fetch();
            $pre->closeCursor();

            /***************************************************************************
            A rajouter : sélectionner le nombre de tour
            Changer la valeur de `tr_numero` + enlever les commentaires du 3ème bindParam()
            ***************************************************************************/
            $req = $this->_bdd->prepare("INSERT INTO `tour_tbl`(`tr_id`, `tr_distance`, `tr_numero`, `crs_id`) VALUES (NULL, :distance, '1', :course)");
            $req->bindParam("distance",$this->_distance,PDO::PARAM_INT);
            $req->bindParam("course",$course['crs_id'],PDO::PARAM_INT);
            //$req->bindParam("nbTour",$nbTour,PDO::PARAM_INT);
            $return = $req->execute();
            return $return;
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
    public function setNbTour($newNbTour)
    {
        $this->_idtour = $newNbTour;
    }
    public function getNbTour()
    {
        return $this->_nbTour;
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
