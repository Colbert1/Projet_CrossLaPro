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
    private $_idClasse;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function inscriptionUser($password, $mail, $nom, $prenom, $classe)
    {
        $bdd = $this->_bdd;

        $hashPasswd = password_hash($password, PASSWORD_ARGON2ID);

        try {
            $req = $bdd->prepare("INSERT INTO `user_tbl` (`us_id`, `us_nom`, `us_prenom`, `us_mail`, `us_passwd`, `us_status`, `cl_id`) 
            VALUES (NULL, :nom, :prenom, :mail, :password, '0', :classe);");
            $req->bindParam('nom', $nom, PDO::PARAM_STR);
            $req->bindParam('prenom', $prenom, PDO::PARAM_STR);
            $req->bindParam('mail', $mail, PDO::PARAM_STR);
            $req->bindParam('password', $hashPasswd, PDO::PARAM_STR);
            $req->bindParam('classe', $classe, PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();

            header("Location: index.php");
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }

    public function connexionUser($mail, $passwd)
    {

        $bdd = $this->_bdd;

        try {
            $req = $bdd->prepare("SELECT `us_mail`, `us_passwd` FROM `user_tbl` WHERE `user_tbl`.`us_mail` = :mail");
            $req->bindParam('mail', $mail, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);

            if (password_verify($passwd, $result['us_passwd']) == TRUE) {
                header("Location: accueil.php");
            } else {
                echo "<div style='color:red>Identifiants incorrects !</div>";
            }
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }
    public function setMail($newMail)
    {
        $this->_mail = $newMail;
    }
    public function setPassword($newPassword)
    {
        $this->_password = $newPassword;
    }
    public function setNom($newNom)
    {
        $this->_nom = $newNom;
    }
    public function setPrenom($newPrenom)
    {
        $this->_prenom = $newPrenom;
    }
    public function setStatus($newStatus)
    {
        $this->_status = $newStatus;
    }
    public function setClasse($newClasse)
    {
        $this->_classe = $newClasse;
    }
    public function getId()
    {
        return $this->_id;
    }
    public function getNom()
    {
        return $this->_nom;
    }
    public function getPrenom()
    {
        return $this->_prenom;
    }
    public function getMail()
    {
        return $this->_mail;
    }
    public function getPasword()
    {
        return $this->_password;
    }
    public function getStatus()
    {
        return $this->_status;
    }
    public function getClasse()
    {
        return $this->_classe;
    }
    public function getIdClasse($classe)
    {
        $requete = $this->_bdd->prepare("SELECT cl_id FROM classe_tbl WHERE cl_nom = :classe");
        $requete->bindParam('classe', $classe, PDO::PARAM_STR);
        $requete->execute();
        $_idClasse = $requete->fetch();
        echo $_idClasse['cl_id'];
        return $_idClasse['cl_id'];
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
