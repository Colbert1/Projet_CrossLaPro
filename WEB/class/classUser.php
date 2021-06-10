<?php
class User
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_password;
    private $_status;
    private $_classe;
    private $_bdd;

    //Constructeur : Stockage du PDO
    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    /*
        INSCRIPTION D'UN UTILISATEUR AU SITE
        (IL A ACCES AU SITE)
    */
    public function inscriptionUser($password, $mail, $nom, $prenom, $classe)
    {
        $bdd = $this->_bdd;

        $hashPasswd = password_hash($password,  PASSWORD_BCRYPT);

        try {
            $req = $bdd->prepare("INSERT INTO `user_tbl` (`us_id`, `us_nom`, `us_prenom`, `us_mail`, `us_passwd`, `us_status`, `cl_id`) 
            VALUES (NULL, :nom, :prenom, :mail, :password, '0', :classe);");
            $req->bindParam('nom', $nom, PDO::PARAM_STR);
            $req->bindParam('prenom', $prenom, PDO::PARAM_STR);
            $req->bindParam('mail', $mail, PDO::PARAM_STR);
            $req->bindParam('password', $hashPasswd, PDO::PARAM_STR);
            $req->bindParam('classe', $classe, PDO::PARAM_STR);
            $req->execute();
            header("Location: accueil.php");
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }
    /*
        CONNEXION DE L'UTILISATEUR AU SITE
        (IL A ACCES AU SITE)
    */
    public function connexionUser($mail, $passwd)
    {
        try {
            $req = $this->_bdd->prepare("SELECT `us_id`,`us_passwd`,`us_nom`,`us_prenom` FROM `user_tbl` us WHERE us.`us_mail` = :mail");
            $req->bindParam('mail', $mail, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);

            if (password_verify($passwd, $result['us_passwd']) === TRUE) {
                $_SESSION['id'] = $result['us_id'];
                $_SESSION['nom'] = $result['us_nom'];
                $_SESSION['prenom'] = $result['us_prenom'];
                $this->_id = $result['us_id'];
                header("Location: accueil.php");
            } else {
                echo "<div style='color:red'>Identifiants incorrects !</div>";
            }
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }
    /*
        VERIFIER SI L'ADRESSE DE L'UTILISATEUR
        EST DEJA ENTREE EN BASE
        (IL DEVIENT COURREUR ET UTILISATEUR)
    */
    public function verifMail($verifMail)
    {/*

        try {
            $req = $this->_bdd->prepare("SELECT us_mail FROM user_tbl WHERE us_mail = :mail");
            $req->bindParam('mail', $verifMail, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }*/
    }
    /*
        AFFICHAGE DU PROFIL DE L'UTILISATEUR
        (AVEC L'AFFICHAGE DU NOM,PRENOM,CLASSE,MAIL)
    */
    public function afficheInfoUser()
    {
        try {
            $req = $this->_bdd->prepare("SELECT us.`us_nom`, us.`us_prenom`,us.`us_mail`,cl.`cl_nom` 
            FROM `user_tbl` as us 
            INNER JOIN `classe_tbl` as cl 
                ON us.cl_id = cl.cl_id 
            WHERE `us_id` = :user");
            $req->bindParam('user', $_SESSION['id'], PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $infoUser) {
                echo  "<p>Nom: " . $infoUser['us_nom'];
                echo  "<p>Prénom: " . $infoUser['us_prenom'];
                echo  "<p>Mail: " . $infoUser['us_mail'];
                echo  "<p>Classe: " . $infoUser['cl_nom'];
            }
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }
    /*
        INITIALISE L'ADRESSE MAIL DE L'UTILISATEUR
    */
    public function setMail($newMail)
    {
        $this->_mail = $newMail;
    }
    /*
        INITIALISE LE MOT DE PASSE L'UTILISATEUR
    */
    public function setPassword($newPassword)
    {
        $this->_password = $newPassword;
    }
    /*
        INITIALISE LE NOM DE L'UTILISATEUR
    */
    public function setNom($newNom)
    {
        $this->_nom = $newNom;
    }
    /*
        INITIALISE LE PRENOM DE L'UTILISATEUR
    */
    public function setPrenom($newPrenom)
    {
        $this->_prenom = $newPrenom;
    }
    /*
        INITIALISE LE STATUT DE L'UTILISATEUR
    */
    public function setStatut($newStatut)
    {
        $this->_status = $newStatut;
    }
    /*
        INITIALISE LA CLASSE DE L'UTILISATEUR
    */
    public function setClasse($newClasse)
    {
        $this->_classe = $newClasse;
    }
    /*
        RECUPERE L'ID DU USER
    */
    public function getId()
    {
        return $this->_id;
    }
    /*
        RECUPERE LE NOM DE L'UTILISATEUR
    */
    public function getNom()
    {
        return $this->_nom;
    }
    /*
        RECUPERE LE PRENOM DE L'UTILISATEUR
    */
    public function getPrenom()
    {
        return $this->_prenom;
    }
    /*
        RECUPERE L'ADRESSE MAIL DE L'UTILISATEUR
    */
    public function getMail()
    {
        return $this->_mail;
    }
    /*
        RECUPERE LE MOT DE PASSE DE L'UTILISATEUR
    */
    public function getPassword()
    {
        return $this->_password;
    }
    /*
        RECUPERE LE STATUT DE L'UTILISATEUR
    */
    public function getStatut()
    {
        return $this->_statut;
    }
    /*
        RECUPERE LA CLASSE DE L'UTILISATEUR
    */
    public function getClasse()
    {
        return $this->_classe;
    }
    public function init()
    {
        $requete = $this->_bdd->query("SELECT * FROM `user_tbl` WHERE `us_id` = " . $this->_id);
        $data = $requete->fetch();
        $this->_nom = $data['us_nom'];
        $this->_prenom = $data['us_prenom'];
        $this->_mail = $data['us_mail'];
        $this->_password = $data['us_passwd'];
        $this->_statut = $data['us_status'];
        $this->_classe = $data['cl_id'];
    }
}
