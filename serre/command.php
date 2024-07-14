<?php
    //Développement au lycée sous linux (lamp)
    /*
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
    $sql = "SELECT * FROM `state` ORDER BY id_state DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $windowValue = $row['window'];
        $fanValue = $row['fan'];
        $heatValue = $row['heat'];
        $idDate = $row['id_date'];
    } else {
        // Définition des paramètres par défaut si la table est vide
        $windowValue = $fanValue = $heatValue = "0";
        $idDate = "";
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="control.css">
    <title>Contrôle de la Serre</title>
</head>
<body>
    <div class="navbar">
        <h1>Panneau de contrôle</h1>
        <ul>
            <li><a href="graph3.php">Consultation de la serre</a></li>
            <li><a href="config3.php">Configuration</a></li>
            <li><a href="acceuil.php">Session</a></li>
        </ul>
    </div>  

    <br>
    <br>
    <br>
    <br>
    <div class="container" id="rcorners2">
        <form action="control.php" method="post">
            <label for="window">Contrôle des Ouvrants:</label>
            <select name="window">
                <option value="1" <?php if ($windowValue == "1") echo "selected"; ?>>On</option>
                <option value="0" <?php if ($windowValue == "0") echo "selected"; ?>>Off</option>
            </select>

            <label for="fan">Contrôle des Ventilateurs:</label>
            <select name="fan">
                <option value="1" <?php if ($fanValue == "1") echo "selected"; ?>>On</option>
                <option value="0" <?php if ($fanValue == "0") echo "selected"; ?>>Off</option>
            </select>

            <label for="heat">Contrôle du Chauffage:</label>
            <select name="heat">
                <option value="1" <?php if ($heatValue == "1") echo "selected"; ?>>On</option>
                <option value="0" <?php if ($heatValue == "0") echo "selected"; ?>>Off</option>
            </select>

            <!-- Champ caché pour garder l'ID du dernier enregistrement -->
            <input type="hidden" name="state_id" value="<?php echo $row['id_state']; ?>">
            <input type="hidden" name="date_id" value="<?php echo $idDate; ?>">

            <!-- Basculer du bouton "Activer" au bouton "Désactiver" -->
            <?php if ($windowValue != "" || $fanValue != "" || $heatValue != "") { ?>
                <input type="submit" name="submit" value="Désactiver">
            <?php } else { ?>
                <input type="submit" name="submit" value="Activer">
            <?php } ?>
        </form>
    </div>

</body>
</html>
