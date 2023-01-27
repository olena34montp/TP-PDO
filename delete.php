<?php
include 'connexion.php';

$id = intval($_GET['id']);

// Préparation
$statement = $pdo->prepare(
"DELETE FROM `mes_jeux` 
WHERE id= :id");

// Correspondre les valeurs
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$result = $statement->execute();

echo '<br>';
echo "Le jeu n $id à été supprimé, avec succés";
echo '<br>';
echo '<a href="index.php">Index</a> <br>';