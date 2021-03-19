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

    public function inscriptionSite($password, $mail, $nom, $prenom)
    {
        $bdd = $this->_bdd;

        $hashPasswd = password_hash($password, PASSWORD_ARGON2ID);

        try {
            $req = $bdd->prepare("INSERT INTO `user` (`id_user`, `nom`, `prenom`, `password`, `mail`, `status`) VALUES (NULL, :nom, :prenom, :password, :mail, '0') ;");
            $req->bindParam('nom', $nom, PDO::PARAM_STR);
            $req->bindParam('prenom', $prenom, PDO::PARAM_STR);
            $req->bindParam('password', $hashPasswd, PDO::PARAM_STR);
            $req->bindParam('mail', $mail, PDO::PARAM_STR);
            $req->execute();

            header("Location: ../index.php");
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
        }
    }
    public function connexionSite($bdd)
    {
        if (!empty($_POST['nom']) && !empty($_POST['password'])) {
            $nom = $_POST['nom'];
            $password = $_POST['password'];

            try {
                $req = $bdd->prepare("SELECT `nom`, `password` FROM `user` WHERE `user`.`nom` = :nom");
                $req->bindParam('nom', $nom, PDO::PARAM_STR);
                $req->execute();
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $result['password']) == TRUE) {
                    header("Location: ../connexion.php");
                } else {
                    echo "<div style='color:white'>Identifiants incorrects !</div>";
                }
            } catch (Exception $e) {
                echo "Erreur ! " . $e->getMessage();
                echo "Les datas : ";
            }
        }
    }
}
