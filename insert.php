<?php
include 'connexion.php';

$nom = $_POST['nom'];
$console = $_POST['console'];
// Préparation

$statement = $pdo->prepare(
"INSERT INTO `mes_jeux`(nom, console)
VALUES (:n, :c);");
// Correspondre les valeurs
$statement->bindParam(':n', $nom, PDO::PARAM_STR);
$statement->bindParam(':c', $console, PDO::PARAM_STR);
$result = $statement->execute();
$last_id = $pdo->lastInsertId();


echo '<br>';
echo "Le jeu n $last_id à été créé, avec succés";
echo '<br>';
echo '<a href="form_insert.php">Retour</a> <br>';