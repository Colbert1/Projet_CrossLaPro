<?php
if(session_start() == TRUE){
    header("accueil.php");
}
require_once("bdd.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="formConnexion.css">
    <title>Index</title>
</head>
<body>
    <!--Haut de page-->
    <div>

    </div>

    <!--Milieu de page-->
    <div class="login-box">
    <h2>Connexion</h2>
        <form id="login" action="" method="POST">
            <div class="user-box">
                <input type="text" name="username" required="">
                <label>Nom d'utilisateur</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Mot de passe</label>
            </div>
            <a href="inscription.php" class="inscription">S'inscrire</a>
            <a href="#" onclick='document.getElementById("login").submit()'>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Se connecter
            </a>
        </form>
    </div>

    <!--Bas de page-->
    <div>
    </div>
</body>
</html>