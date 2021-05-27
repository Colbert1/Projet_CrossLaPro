<?php
session_start();
require_once("bdd.php");
require("class/classUser.php");

//Inscription
if (
    !empty($_POST['passwordInscription'])
    && !empty($_POST['confirmPasswordInscription']) && !empty($_POST['nomInscription'])
    && !empty($_POST['prenomInscription']) && !empty($_POST['mailInscription'] && !empty($_POST['listeClasseInscription']))
) {

    $password  = $_POST['passwordInscription'];
    $Cpassword = $_POST['confirmPasswordInscription'];
    $mail      = $_POST['mailInscription'];
    $nom       = $_POST['nomInscription'];
    $prenom    = $_POST['prenomInscription'];
    $classe    = $_POST['listeClasseInscription'];

    if ($password == $Cpassword) {
        $user = new User($bdd);
        $user->inscriptionUser($password, $mail, $nom, $prenom, $classe);
    } else {
        echo "<div>Confirmation de mot de passe incorrect</div>";
    }
    //Connexion
} elseif (!empty($_POST['emailConnexion']) && !empty($_POST['passwordConnexion'])) {
    $email  = $_POST['emailConnexion'];
    $passwd = $_POST['passwordConnexion'];

    $user = new User($bdd);
    $user->connexionUser($email, $passwd);
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
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Page Principale</title>
</head>

<body class="bg-blue-300 h-screen">
    <div class="container mx-auto flex justify-center grid justify-items-start m-40">

        <!-- FORMULAIRE INSCRIPTION -->
        <div class="w-full max-w-xs pt-6">
            <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400" id="inscription" action="" method="POST">
                <div class="mb-4 text-center">
                    <p>Inscription</p>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="text" name="nomInscription" placeholder="Nom" required>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="text" name="prenomInscription" placeholder="Prenom" required>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" name="listeClasseInscription">
                        <?php
                        echo '<option value="0" selected>Sélectionner la classe</option>';
                        foreach ($result as $ligne) {

                            echo "<option value='{$ligne['cl_id']}'>"
                                . $ligne['cl_nom'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="mail" name="mailInscription" placeholder="Adresse mail" required>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="password" name="passwordInscription" placeholder="Mot de passe" required>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="password" name="confirmPasswordInscription" placeholder="Confirmation mot de passe" required>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" name="subInscription" type="submit">Confirmer</button>
                </div>
            </form>
        </div>
        <!-- FORMULAIRE CONNEXION -->
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400 p-2" id="connexion" action="" method="POST">
                <div class="mb-4 text-center">
                    <p>Connexion</p>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="mail" name="emailConnexion" placeholder="Adresse mail" required>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="password" name="passwordConnexion" placeholder="Mot de passe" required>
                </div>
                <div class="mb-4-text-gray-700 text-center">
                    <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" name="subConnect" type="submit">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>