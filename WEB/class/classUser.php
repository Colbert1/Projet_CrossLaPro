<?php
class User
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_classe;
    private $_mail;
    private $_motdepasse;
    private $_bdd;

    public function __construct($bdd){
        $this->_bdd = $bdd;
    }

    public function inscriptionSite($password, $mail, $nom, $prenom)
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

    public function connexionSite($mail,$passwd)
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
}
