<?php
include "header.php";
require_once("bdd.php");
require("class/classCourse.php");

// requete info course
//SELECT DISTINCT `crs_nom`,`crs_date` FROM `course_tbl`, `tour_tbl`

$infoCourse = new Course($bdd);
$infoCourse->afficheInfoCourse();
echo $dataCourse['crs_nom'];
