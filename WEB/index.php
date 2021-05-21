<?php
session_start();
require_once("bdd.php");
require("class/classUser.php");
//Inscription
if (isset($_POST['subInscription'])) {
    if (
        !empty($_POST['nomInscription']) && !empty($_POST['prenomInscription']) && !empty($_POST['listeClasseInscription']) &&
        !empty($_POST['mailInscription']) && !empty($_POST['passwordInscription']) && !empty($_POST['confirmPasswordInscription'])
    ) {
        if ($_POST['passwordInscription'] == $_POST['confirmPasswordInscription']) {
            $user = new User($bdd);
            $classe = new Classe($bdd);
            $classe->setIdClasse($_POST['listeClasseInscription']);
            $classe->initById();
            $user->setNom($_POST['nomInscription']);
            $user->setPrenom($_POST['prenomInscription']);
            $user->setClasse($classe);
            $user->setMail($_POST['mailInscription']);
            $user->setPassword($_POST['passwordInscription']);
            $user->inscriptionUser();
            $message = "Inscription réussie";
        } else {
            $message = "Les mots de passe ne correspondent pas";
        }
    } else {
        echo $_POST['nomInscription'] . "<br>";
        echo $_POST['prenomInscription'] . "<br>";
        echo $_POST['listeClasseInscription'] . "<br>";
        echo $_POST['mailInscription'] . "<br>";
        echo $_POST['passwordInscription'] . "<br>";
        echo $_POST['confirmPasswordInscription'] . "<br>";
        $message = "Des champs ne sont pas remplis";
    }
}
//Connexion
if (isset($_POST['subConnect'])) {
    if (!empty($_POST['emailConnexion']) && !empty($_POST['passwordConnexion'])) {
        $user = new User($bdd);
        $user->getMail($_POST['emailConnexion']);
        $user->getPassword($_POST['passwordConnexion']);
        $connexion = $user->connexionUser($mail, $passwd);
        if ($connexion == TRUE) {
            $_SESSION['mail'] = $_POST['emailConnexion'];
            header("Location: accueil.php");
        }
    } else {
        $message = "Problème de connexion";
    }
} else {
    $message = "Des champs ne sont pas remplis";
}
//Classe
$sql = 'SELECT cl_nom, cl_id FROM classe_tbl';
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll();
$req->closeCursor();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Page Principale</title>
</head>

<body>
    <!-- FORMULAIRE INSCRIPTION -->
    <div class="signin-box">
        <h2>Inscription</h2>
        <form id="inscription" action="" method="POST">
            <div>
                <input type="text" name="nomInscription" placeholder="Nom" required>
            </div>
            <div>
                <input type="text" name="prenomInscription" placeholder="Prenom" required>
            </div>
            <select name="listeClasseInscription">
                <?php
                echo '<option value="0" selected>Sélectionner la classe</option>';
                foreach ($result as $ligne) {
        
                    echo "<option value='{$ligne['cl_id']} - {$ligne['cl_nom']}'>"
                        . $ligne['cl_nom'] . "</option>";
                }
                ?>
            </select>
            <div>
                <input type="mail" name="mailInscription" placeholder="Adresse mail" required>
            </div>
            <div>
                <input type="password" name="passwordInscription" placeholder="Mot de passe" required>
            </div>
            <div>
                <input type="password" name="confirmPasswordInscription" placeholder="Confirmation mot de passe" required>
            </div>
            <button name="subInscription" type="submit">Confirmer</button>
            <h4><?php if (!empty($message)) {
                    echo $message;
                } ?></h4>
        </form>
    </div>
    <!-- FORMULAIRE CONNEXION -->
    <div class="login-box">
        <h2>Connexion</h2>
        <form id="connexion" action="" method="POST">
            <div>
                <input type="mail" name="emailConnexion" placeholder="Adresse mail" required>
            </div>
            <div>
                <input type="password" name="passwordConnexion" placeholder="Mot de passe" required>
            </div>

            <button name="subConnect" type="submit">Confirmer</button>
        </form>
    </div>
</body>

</html>