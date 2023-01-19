<?php
include "connexion.php";

$statement = $pdo->query("SELECT * FROM mes_jeux");
$statementAll = $pdo->query("SELECT * FROM mes_jeux");

$result = $statement->fetch(PDO::FETCH_ASSOC);
$resultAll = $statementAll->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($result);
echo "</pre>";

echo "Ma liste de jeux videos :<br>";
foreach ($resultAll as $key => $values){
    foreach($values as $key2 => $value){
        if($key2 == "nom") {
            echo "- $value ";
        }
        if($key2 == "console") {
            echo "sur la $key2 $value <br>";
        }
    }
    echo '<a href="showOne.php?id='.$values['id'].'">Voir ce jeu en détail</a> <br>';
    echo '<a href="form_update.php?id='.$values['id'].'">Modifier ce jeu</a> <br>';
    echo '<a href="delete.php?id='.$values['id'].'">Supprimer ce jeu</a> <br><br><br>';
}

echo '<br>';
echo '<a href="byConsole.php?console">Tous les jeux</a> <br>';
echo '<a href="byConsole.php?console=ps4">Tous les jeux PS4</a><br>';
echo '<a href="byConsole.php?console=switch">Tous les jeux switch</a><br>';
echo '<a href="byConsole.php?console=xbox serie">Tous les jeux xbox</a><br>';