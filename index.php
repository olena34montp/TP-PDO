<?php
include "connexion.php";

$statement = $pdo->query("SELECT * FROM console");
$statementAll = $pdo->query("SELECT * FROM mes_jeux");

$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$resultAll = $statementAll->fetchAll(PDO::FETCH_ASSOC);

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


echo '<ul>';
echo '<li><a href="byConsole.php?console">Tous les jeux</a> </li>';
foreach ($result as $uneConsole) {
    $nomConsole = $uneConsole['console'];
    echo '<li><a href="byConsole.php?console='.$nomConsole.'">Tous les jeux '.$nomConsole.'</a> </li>';
    
}  
echo '</ul>';