<?php
$dsn = "mysql:host=localhost;dbname=ma_collection_jeux;charset=utf8";
$username = "root"; //A changer si besoin
$password = "olena";//A changer si besoin
$pdo = new PDO($dsn, $username, $password,
array(PDO::ATTR_PERSISTENT =>TRUE));