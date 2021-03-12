<?php 
require_once("bdd.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
</head>
<body>
<div class="login-box">
    <h2>Inscription</h2>
        <form id="inscription" action="" method="POST">
            <div>
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div>
                <input type="password" name="Cpassword" placeholder="Mot de passe" required>
            </div>
            <div>
                <input type="text" name="nom" placeholder="Nom" required>
            </div>
            <div>
                <input type="text" name="prenom" placeholder="Prenom" required>
            </div>
            <div>
                <input type="mail" name="email" placeholder="Adresse mail" required>
            </div>
            <button type="submit">Confirmer</button>
        </form>
    </div>
    
    <!--Bas de page-->
    <div>
    </div>
</body>
</html>
<?php
    if(!empty($_POST['username']) && !empty($_POST['password']) 
    && !empty($_POST['Cpassword']) && !empty($_POST['nom']) 
    && !empty($_POST['prenom']) && !empty($_POST['email'])){
        $username  = $_POST['username'];
        $password  = $_POST['password'];
        $Cpassword = $_POST['Cpassword'];
        $email     = $_POST['email'];
        $nom       = $_POST['nom'];
        $prenom    = $_POST['prenom'];

        if($password == $Cpassword){

            $hashPasswd = password_hash($password,PASSWORD_ARGON2ID);

            try{
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

            }catch(Exception $e){
                echo "Erreur ! ".$e->getMessage();
                echo "Les datas : ";
                print_r($req);
            }
        }else{
            echo "<div>Confirmation de mot de passe incorrect</div>";
        }
    }
?>