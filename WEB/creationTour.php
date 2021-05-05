<?php

/*********************************
Paramétrage du tour : Distance selon le nom de la course
 ********************************/
session_start();
require_once("bdd.php");
require("class/classTour.php");
?>
<html>
<?php
$req = $this->_bdd->query("SELECT crs_nom FROM course_tbl");
echo '<select name="nomCourse">';
while ($donnees->fetch($req)) {
    echo '<option value="' . $donnees["crs_nom"] . '"></option>';
}
echo '</select>';
?>

</html>