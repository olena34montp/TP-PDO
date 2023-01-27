<?php
include 'connexion.php';
$statement = $pdo->query("SELECT * FROM `console`");
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion</title>
</head>
<body>
    <h1>Insertion d'un nouveau jeu</h1>
    <form action="insert.php" method="post">
        <label for="nom">Nom</label>
        <input id="nom" type="text" name="nom">
        <br>
        <label for="nom-console">Nom de la console</label>
        <select name="console" id="nom-console">
            <option value="">--Choisissez l'option--</option>
            <?php
                foreach ($result as $uneConsole) {
                    $idConsole = $uneConsole['id'];
                    $nomConsole = $uneConsole['console'];
                    ?>
                        <option value="<?php echo $idConsole ?>">
                            <?php echo $nomConsole ?>
                        </option>
                    <?php
                }
            ?>
        </select>    
        <br>
        <input type="submit" value="ok">
    </form>
</body>
</html>