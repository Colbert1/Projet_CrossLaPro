<?php
require_once("bdd.php");
require("class/classCoureur.php");
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
if (
    !empty($_POST['password']) && !empty($_POST['Cpassword']) && !empty($_POST['nom'])
    && !empty($_POST['prenom']) && !empty($_POST['mail'])
) {

    $password  = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    $mail     = $_POST['mail'];
    $nom       = $_POST['nom'];
    $prenom    = $_POST['prenom'];

    if ($password == $Cpassword) {
        $coureur = new Coureur($bdd);
        $coureur->inscriptionSite($password, $mail, $nom, $prenom);
    } else {
        echo "<div>Confirmation de mot de passe incorrect</div>";
    }
}
?>