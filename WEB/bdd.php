<?php 
$dsn = 'mysql:dbname=Projet_CrossLaPro;host=192.168.64.183';
$user = 'root';
$password = 'root';

try {
    $bdd = new PDO($dsn, $user, $password);
    // Activation des erreurs PDO
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>