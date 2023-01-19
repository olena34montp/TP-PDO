<?php
include 'connexion.php';

$id = intval($_GET['id']);
// Préparation

$statement = $pdo->prepare(
"DELETE FROM `mes_jeux` 
WHERE id= $id;");
//DELETE FROM table WHERE id=1;
// Correspondre les valeurs
$result = $statement->execute();

echo '<br>';
echo "Le jeu n $id à été supprimé, avec succés";
echo '<br>';
echo '<a href="form_update.php">Retour</a> <br>';