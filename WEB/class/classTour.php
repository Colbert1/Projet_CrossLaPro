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
    }
}
