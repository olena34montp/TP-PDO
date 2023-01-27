<?php
include 'connexion.php';
// Récupération du paramètre GET
$id = intval($_GET['id']);

// Préparation
$statement = $pdo->prepare(
    "SELECT mes_jeux.id, nom, console 
    FROM `mes_jeux` 
    JOIN `console` 
    ON mes_jeux.console_id = console.id 
    WHERE mes_jeux.id = :id");
// Correspondre les valeurs
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
// Récupère le résultat
$result = $statement->fetch(PDO::FETCH_ASSOC);

// Affichage
echo 'Mon jeu numéro : '. $result['id'];
echo '<br>';
echo 'Nom : ' . $result['nom'];
echo '<br>';
echo 'Sur console : '. $result['console'];
echo '<br>';
echo '<a href="index.php">Index</a> <br>';