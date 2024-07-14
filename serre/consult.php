<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "btssnirjeanperrin";
$dbname = "Serre";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération des données de la table measure
$sql = "SELECT * FROM `Measure`";
$result = $conn->query($sql);

// Récupération des données de la table type_date
$sql_date = "SELECT * FROM `Date`";
$result_date = $conn->query($sql_date);

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="graph.css">
    <title>Graphique de la Serre</title>
</head>
<body>

    <div class="container">
        <h1>Graphique de la Serre</h1>

        <!-- Affichage du graphique -->
        <div class="graph">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="bar" style="height: <?php echo $row['temperature']; ?>px;">temperature</div>
                <div class="bar" style="height: <?php echo $row['hygrometry_grnd']; ?>px;">hyground</div>
                <div class="bar" style="height: <?php echo $row['hygrometry_serre']; ?>px;">hygroserre</div>
                <div class="bar" style="height: <?php echo $row['wind_speed']; ?>px;">vitesse</div>
                <div class="bar" style="height: <?php echo $row['wind_direction']; ?>px;">direction</div>
            <?php endwhile; ?>
        </div>

        
        <div class="date">
            <?php while ($row_date = $result_date->fetch_assoc()): ?>
                <p><?php echo $row_date['time'] . " - " . $row_date['date']; ?></p>
            <?php endwhile; ?>
        </div>
    </div> 

</body>
</html>

