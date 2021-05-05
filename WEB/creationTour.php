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
// Récupère les données de la table clients
$requete = 'SELECT crs_nom FROM course_tbl';
$resultat = $bdd->prepare($requete);
$resultat->execute();

if (!$resultat) {
echo "Problème de requete";
} else {
?>

<select>
<?php
while($ligne = $resultat->fetch()) {
echo "<option value='".$ligne['crs_id']."'>".$ligne['crs_nom']."</option>";
}
?>

</select>

<?php
} // fin du else
$resultat->closeCursor(); // libère le résultat
?>

</html>
