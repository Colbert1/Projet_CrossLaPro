<?php
require_once("bdd.php");
/* -------------------------------------
        Class Coureur
        Avec la possibilité de :
        Ajouter un coureur à une course
        Modifier ses informations
        Supprimer un coureur à une course
----------------------------------------*/
class Coureur
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_classe;
    private $_mail;
    private $_motdepasse;
    private $_bdd;

    public function __construct($bdd)
    {
        $this->_bdd = $bdd;
    }
    public function inscriptionSite($username, $password, $email, $nom, $prenom)
    {
        $bdd = $this->_bdd;

        $hashPasswd = password_hash($password, PASSWORD_ARGON2ID);

        try {
            $req = $bdd->prepare("INSERT INTO `user` 
                (`us_id`, `us_nom`, `us_prenom`, `us_username`, 
                `us_passwd`, `us_mail`, `us_admin`) 
                VALUES (NULL, :nom, :prenom, :username, 
                :passwd, :email, '0') ;");
            $req->bindParam('nom', $nom, PDO::PARAM_STR);
            $req->bindParam('prenom', $prenom, PDO::PARAM_STR);
            $req->bindParam('username', $username, PDO::PARAM_STR);
            $req->bindParam('passwd', $hashPasswd, PDO::PARAM_STR);
            $req->bindParam('email', $email, PDO::PARAM_STR);
            $req->execute();

            header("Location:192.168.65.137/cross/Etudiant 3 Danel /WEB/index.php");
        } catch (Exception $e) {
            echo "Erreur ! " . $e->getMessage();
            echo "Les datas : ";
            
        }
    }
    public function connexionSite($bdd)
    {
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        try{
            $req = $bdd->prepare("SELECT `us_login`, `us_passwd` FROM `users` WHERE `users`.`us_login` = :username");
            $req->bindParam('username', $username, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);

            if(password_verify($password,$result['us_passwd']) == TRUE){
                header("Location: http://localhost/BrivaYass/Accueil.php");
            }else{
                echo "<div style='color:white'>Identifiants incorrects !</div>";
            }
        }catch(Exception $e){
            echo "Erreur ! ".$e->getMessage();
            echo "Les datas : ";
        }
    }

    }
    public function ajoutCoureur()
    {
        //Ajout d'un coureur à une course
    }
    public function modifierCoureur()
    {
        //Modification des informations du coureur
    }
    public function supprimerCoureur()
    {
        //Suppression d'un coureur à une course
    }
}
