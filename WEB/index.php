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
if (
    !empty($_POST['username']) && !empty($_POST['password'])
    && !empty($_POST['Cpassword']) && !empty($_POST['nom'])
    && !empty($_POST['prenom']) && !empty($_POST['email'])
) {
    $username  = $_POST['username'];
    $password  = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    $email     = $_POST['email'];
    $nom       = $_POST['nom'];
    $prenom    = $_POST['prenom'];

    if ($password == $Cpassword) {
        $coureur = new Coureur($bdd);
        $coureur->inscriptionSite($username, $password, $email, $nom, $prenom);
    } else {
        echo "<div>Confirmation de mot de passe incorrect</div>";
    }
}
?>