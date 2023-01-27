<?php
include 'connexion.php';

$nom = $_POST['nom'];
$console_id = $_POST['console'];
// Préparation

$statement = $pdo->prepare(
"INSERT INTO `mes_jeux`(nom, console_id)
VALUES (:n, :c);");

// Correspondre les valeurs
$statement->bindParam(':n', $nom, PDO::PARAM_STR);
$statement->bindParam(':c', $console_id, PDO::PARAM_INT);
$result = $statement->execute();
$last_id = $pdo->lastInsertId();


echo '<br>';
echo "Le jeu n $last_id à été créé, avec succés";
echo '<br>';
echo '<a href="form_insert.php">Retour</a> <br>';