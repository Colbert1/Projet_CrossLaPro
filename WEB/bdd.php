<?php
$dsn = 'mysql:host=192.168.65.183;dbname=projetcross_lapro';
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

function fetchAll($bdd, $request, $params = []) {
    $req = $bdd->prepare($request);
    $req->execute($params);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();

    return $data;
}