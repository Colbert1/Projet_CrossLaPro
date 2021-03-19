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

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function inscriptionUser($password, $mail, $nom, $prenom)
    {
        $bdd = $this->_bdd;

        $hashPasswd = password_hash($password, PASSWORD_ARGON2ID);

        try {
            $req = $bdd->prepare("INSERT INTO `user` (`id_user`, `nom`, `prenom`, `mail`, `password`, `status`, `id_classe`) 
            VALUES (NULL, :nom, :prenom, :mail, :password, '0', NULL);");
            $req->bindParam('nom', $nom, PDO::PARAM_STR);
            $req->bindParam('prenom', $prenom, PDO::PARAM_STR);
            $req->bindParam('mail', $mail, PDO::PARAM_STR);
            $req->bindParam('password', $hashPasswd, PDO::PARAM_STR);
            $req->execute();

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
            $req = $bdd->prepare("SELECT `mail`, `password` FROM `user` WHERE `user`.`mail` = :mail");
            $req->bindParam('mail', $mail, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);

            if (password_verify($passwd, $result['password']) == TRUE) {
                header("Location: accueil.php");
            } else {
                echo "<div style='color:white'>Identifiants incorrects !</div>";
            }
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }
    public function setMail($newMail)
    {
    }
    public function setPassword($newPassword)
    {
    }
    public function setNom($newNom)
    {
    }
    public function setPrenom($newPrenom)
    {
    }
    public function setStatus($newStatus)
    {
    }
    public function setClasse()
    {
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
    public function init()
    {
        $requete = $this->_bdd->query("SELECT * FROM user WHERE id_user = " . $this->_id);
        $data = $requete->fetch();
        $this->_nom = $data['nom'];
        $this->_prenom = $data['prenom'];
        $this->_mail = $data['mail'];
        $this->_password = $data['password'];
        $this->_statut = $data['status'];
        $this->_classe = $data['id_classe'];
    }

}
