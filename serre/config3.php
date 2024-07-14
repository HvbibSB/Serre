<?php
    //Développement au lycée sous linux (lamp)
    /*s
    $servername = "localhost";
    $username = "root";
    $password = "btssnirjeanperrin";
    $dbname = "Serre";
    */
    //Développement à la maison sous windows (wamp)
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Serre";
    
    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        echo "Problème de connexion.";
        die("Erreur de connexion : " . $conn->connect_error);
    }

    // Récupération des paramètres actuels
    $sql = "SELECT * FROM `settings` ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $temperatureValue = $row['temperature'];
        $hygroundValue = $row['hyground'];
        $hygroserreValue = $row['hygro_serre'];
        $speedValue = $row['speed'];
        $directionValue = $row['direction'];
        $windowValue = $row['window'];
        $fanValue = $row['fan'];
        $heatValue = $row['heat'];
    } else {
        // Définition des paramètres par défaut si la table est vide
        $temperatureValue = $hygroundValue = $hygroserreValue = $speedValue = $directionValue = $windowValue = $fanValue = $heatValue = "";
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="config2.css">
    <title>Contrôle de la Serre</title>
</head>
<body>
    <div class="navbar">
        <h1>Paramètrage de la Serre</h1>
        <ul>
            <li><a href="command.php">Contrôle de la Serre</a></li>
            <li><a href="graph3.php">Consultation de la serre</a></li>
            <li><a href="acceuil.php">Session</a></li>
        </ul>
    </div>


    <div class="container">
        <form action="update.php" method="post">
            <label for="temperature">Température (°C): </label>
            <input type="number" name="temperature" value="<?php echo $temperatureValue; ?>" required>

            <label for="hyground">Hygrométrie du sol (%): </label>
            <input type="number" name="hyground" min="0" max="100" value="<?php echo $hygroundValue; ?>" required>

            <label for="hygroserre">Hygrométrie dans la serre (%):</label>
            <input type="number" name="hygroserre" min="0" max="100" value="<?php echo $hygroserreValue; ?>" required>

            <label for="speed">Vitesse du Vent (km/h): </label>
            <input type="number" name="speed" min="0" value="<?php echo $speedValue; ?>" required>

            <label for="direction">Direction du Vent: </label>
            <input type="text" name="direction" value="<?php echo $directionValue; ?>" required>

            <h2>Contrôles</h2>
            <label for="window">Contrôle des Ouvrants:</label>
            <select name="window">
                <option value="auto" <?php if ($windowValue == "auto") echo "selected"; ?>>Automatique</option>
                <option value="manual" <?php if ($windowValue == "manual") echo "selected"; ?>>Manuel</option>
            </select>

            <label for="fan">Contrôle des Ventilateurs:</label>
            <select name="fan">
                <option value="auto" <?php if ($fanValue == "auto") echo "selected"; ?>>Automatique</option>
                <option value="manual" <?php if ($fanValue == "manual") echo "selected"; ?>>Manuel</option>
            </select>

            <label for="heat">Contrôle du Chauffage:</label>
            <select name="heat">
                <option value="auto" <?php if ($heatValue == "auto") echo "selected"; ?>>Automatique</option>
                <option value="manual" <?php if ($heatValue == "manual") echo "selected"; ?>>Manuel</option>
            </select>

            <!-- Champ caché pour garder l'ID du dernier enregistrement -->
            <input type="hidden" name="setting_id" value="<?php echo $row['id']; ?>">

            <!-- Basculer du bouton "Éditer" au bouton "Enregistrer nouveaux paramètres" -->
            <?php if ($temperatureValue != "") { ?>
                <input type="submit" name="submit" value="Enregistrer les nouveaux paramètres">
            <?php } else { ?>
                <input type="submit" name="submit" value="Enregistrer les paramètres">
            <?php } ?>
        </form>
    </div>

</body>
</html>
