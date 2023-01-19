<?php
include 'connexion.php';

$console = $_GET['console'];

if(isset($console) && !empty($console)) {
    $statementAll = $pdo->query("SELECT * FROM `mes_jeux` WHERE console = '$console' ORDER BY nom ASC");
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
} else {
    $statementAll = $pdo->query("SELECT * FROM `mes_jeux` ORDER BY nom ASC");
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

