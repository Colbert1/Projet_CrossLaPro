<?php
session_start();
require_once("bdd.php");
require("class/classUser.php");
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
                <input type="text" name="nom" placeholder="Nom" required>
            </div>
            <div>
                <input type="text" name="prenom" placeholder="Prenom" required>
            </div>
            <div>
                <input type="text" name="classe" placeholder="Classe" required>
            </div>
            <div>
                <input type="mail" name="mail" placeholder="Adresse mail" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div>
                <input type="password" name="Cpassword" placeholder="Mot de passe" required>
            </div>
            <button type="submit">Confirmer</button>
        </form>
    </div>
    <div class="login-box">
        <h2>Connexion</h2>
        <form id="connexion" action="" method="POST">
            <div>
                <input type="mail" name="email2" placeholder="Adresse mail" required>
            </div>
            <div>
                <input type="password" name="password2" placeholder="Mot de passe" required>
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
if (
    !empty($_POST['password'])
    && !empty($_POST['Cpassword']) && !empty($_POST['nom'])
    && !empty($_POST['prenom']) && !empty($_POST['mail'])
    && !empty($_POST['classe'])
) {

    $password  = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    $mail      = $_POST['mail'];
    $nom       = $_POST['nom'];
    $prenom    = $_POST['prenom'];
    $classe    = $_POST['classe'];

    if ($password == $Cpassword) {
        $user = new User($bdd);
        $user->inscriptionUser($password, $mail, $nom, $prenom, $classe);
    } else {
        echo "<div>Confirmation de mot de passe incorrect</div>";
    }
} elseif (!empty($_POST['email2']) && !empty($_POST['password2'])) {
    $email  = $_POST['email2'];
    $passwd = $_POST['password2'];

    $user = new User($bdd);
    $user->connexionUser($email, $passwd);
}
?>