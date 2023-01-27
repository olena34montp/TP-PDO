<?php
include 'connexion.php';
$id = $_POST['id'];
$nom = $_POST['nom'];
$console = $_POST['console'];


// Préparation
$statement = $pdo->prepare(
"UPDATE mes_jeux 
SET nom=:n
WHERE id= :id");
// Correspondre les valeurs
$statement->bindParam(':n', $nom, PDO::PARAM_STR);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$result = $statement->execute();

// Préparation
$statement2 = $pdo->prepare(
    "SELECT console.id 
    FROM console 
    JOIN mes_jeux 
    ON mes_jeux.console_id = console.id 
    WHERE mes_jeux.id = :id");
// Correspondre les valeurs
$statement2->bindParam(':id', $id, PDO::PARAM_INT);
$statement2->execute();
$result2 = $statement2->fetch(PDO::FETCH_ASSOC);    

// Préparation
$statement3 = $pdo->prepare(
    "UPDATE console 
    SET console=:c
    WHERE id=:id_c");
// Correspondre les valeurs
$statement3->bindParam(':id_c', $result2['id'], PDO::PARAM_INT);
$statement3->bindParam(':c', $console, PDO::PARAM_STR);
$result3 = $statement3->execute();



echo '<br>';
echo "Le jeu n $id à été modifié, avec succés";
echo '<br>';
echo '<a href="showOne.php?id='.$id.'">Retour</a> <br>';
