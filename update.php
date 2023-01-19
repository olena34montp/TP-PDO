<?php
include 'connexion.php';
$id = $_POST['id'];
$nom = $_POST['nom'];
$console = $_POST['console'];
// Préparation

$statement = $pdo->prepare(
"UPDATE `mes_jeux` 
SET `nom`=:n,
`console`=:c
WHERE id= $id;");
//UPDATE `mes_jeux` SET `nom`='Mario',`console`='PS4' WHERE id=1
// Correspondre les valeurs
$statement->bindParam(':n', $nom, PDO::PARAM_STR);
$statement->bindParam(':c', $console, PDO::PARAM_STR);
$result = $statement->execute();


echo '<br>';
echo "Le jeu n $id à été modifié, avec succés";
echo '<br>';
echo '<a href="form_update.php">Retour</a> <br>';