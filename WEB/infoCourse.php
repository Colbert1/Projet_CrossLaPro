<?php
include "header.php";
require_once("bdd.php");

// requete info course
//SELECT DISTINCT `crs_nom`,`crs_date`,`tr_distance` FROM `course_tbl`, `tour_tbl`
$sql = 'SELECT DISTINCT `crs_nom`,`crs_date`,`tr_distance` FROM `course_tbl`, `tour_tbl`';
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll();
$req->closeCursor();
echo $sql;
foreach ($result as $ligne) {

    echo "<option value='{$ligne['crs_nom']} - {$ligne['crs_date']}'>"
        . $ligne['crs_nom'] . "</option>";
}
