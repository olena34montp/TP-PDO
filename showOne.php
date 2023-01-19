<?php
include 'connexion.php';
// Récupération du paramètre GET
$id = intval($_GET['id']);
$statement = $pdo->query("SELECT * FROM `mes_jeux` WHERE id = " . $id);
var_dump($statement);
// Récupère le résultat
$result = $statement->fetch(PDO::FETCH_ASSOC);
// Affichage
echo 'Mon jeu numéro : '. $result['id'];
echo '<br>';
echo 'Nom : ' . $result['nom'];
echo '<br>';
echo 'Sur console : '. $result['console'];