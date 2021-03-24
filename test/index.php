<?php
include('classParticipant.php');
include('bdd.php');
$participant = new Participant($bdd);
$CNom = "test";
?>

<form method="post" action="">

    <select name="id" id="Nom">
        <?php
        $participant->getAllParticipants($CNom);
        ?>
    </select>
    <input type="number" name="NumDossard" id="NumDossard">
    <input type="submit" value="Valider">
</form>

<?php
if (!empty($_POST['id']) && !empty($_POST['NumDossard'])) {
    $participant->setParticipant($_POST['id']);
    //$_POST['NumDossard'] est le scan
    $participant->setDossard($_POST['NumDossard']);
    
}
