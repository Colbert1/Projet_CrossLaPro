<?php
include "header.php";
require_once("bdd.php");
require("class/classCourse.php");

$infoCourse = new Course($bdd);
$infoCourse->afficheInfoCourse();
