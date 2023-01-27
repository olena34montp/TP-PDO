<?php
include 'connexion.php';

$id = intval($_GET['id']);

$statement = $pdo->prepare(
    "SELECT * 
    FROM `mes_jeux` 
    JOIN `console` 
    ON mes_jeux.console_id = console.id 
    WHERE mes_jeux.id = :id");

$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);
$nom = $result['nom'];
$console = $result['console'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
    <h1>Modification d'un ancien jeu</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label for="nom">Nom</label>
        <input id="nom" type="text" name="nom" value="<?= $nom; ?>">
        <br>
        <label for="nom-console">Nom de la console</label>
        <input id="nom-console" type="text" name="console" value="<?= $console; ?>">
        <br>
        <input type="submit" value="ok">
    </form>
</body>
</html>