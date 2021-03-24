<?php

class Participant
{
    private $_id;
    private $_user;
    private $_dossard;


    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function setParticipant($id)
    {
        //récupérer en base l'info d'un coureur d'apres son id
        $this->_id = $id;
        // récupérer le id du user et construir
        //$this->_user = new user($iduser) ;

    }

    public function getAllParticipants($CNom)
    {
        $reqUs = $this->_bdd->query("SELECT `user`.`id_user`,`user`.`nom` FROM `user`,`participant`,`course` WHERE `user`.`id_user` = `participant`.`id_user` AND `course`.`nom` = '" . $CNom . "'");
        $user = $reqUs->fetchAll();
        foreach ($user as $idUs) {
            echo "<option value='" . $idUs['id_user'] . "'>" . $idUs['nom'] . "</option>";
        }
    }

    public function setDossard($num)
    {
        //$dossard new dossart avec $num
        //$this->_dossard = $dossard;
        $this->_bdd->query("UPDATE `participant` SET `id_dossard` = '" . $num . "' WHERE `participant`.`id_participant` = '" .$this->_id . "';");
        echo "attribution du doassard N°".$num." en base pour le participant N° ".$this->_id;
    }

    /*
    public function setParticipant($num, $nom, $CNom)
    {
        $req1 = $this->_bdd->query("SELECT `id_dossard` FROM `dossard` WHERE `dossard`.`numDossard` = '" . $num . "';");
        $idDos = $req1->fetch();
        $req1->closeCursor();

        $req2 = $this->_bdd->query("SELECT `id_user` FROM `user` WHERE `user`.`nom` = '" . $nom . "';");
        $idUsr = $req2->fetch();
        $req2->closeCursor();

        $req3 = $this->_bdd->query("SELECT `id_course` FROM `course` WHERE `course`.`nom` = '" . $CNom . "';");
        $idCrs = $req3->fetch();
        $req3->closeCursor();

        $this->_bdd->query("UPDATE `participant`,`course` SET `id_dossard` = '" . $idDos['id_dossard'] . "' WHERE `participant`.`id_user` = '" . $idUsr['id_user'] . "' AND `course`.`id_course` = '" . $idCrs['id_course'] . "';");
        echo "<div>Participant ajouté.</div>";
    }
    */
}
