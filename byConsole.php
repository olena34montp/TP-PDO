<?php
include 'connexion.php';

$console = $_GET['console'];

if(!empty($console)) {
    $statement = $pdo->prepare(
        "SELECT mes_jeux.id, nom, console 
        FROM `mes_jeux` 
        JOIN `console` 
        ON mes_jeux.console_id = console.id  
        WHERE console = :c 
        ORDER BY nom");
    $statement->bindParam(':c', $console, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $key => $values){
        echo 'Jeu numéro : '. $values['id'];
        echo '<br>';
        echo 'Nom : ' . $values['nom'];
        echo '<br>';
        echo 'Sur console : '. $values['console'];
        echo '<br>';
        echo '<br>';
    }
} else {
    $statementAll = $pdo->query(
        "SELECT mes_jeux.id, nom, console 
        FROM `mes_jeux` 
        JOIN `console` 
        ON mes_jeux.console_id = console.id 
        ORDER BY nom");
    $result = $statementAll->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $key => $values){
        echo 'Jeu numéro : '. $values['id'];
        echo '<br>';
        echo 'Nom : ' . $values['nom'];
        echo '<br>';
        echo 'Sur console : '. $values['console'];
        echo '<br>';
        echo '<br>';
    }
}

