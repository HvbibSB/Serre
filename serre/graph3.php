<?php
//développement au lycée (lamp)
/*
$servername = "localhost";
$username = "root";
$password = "btssnirjeanperrin";
$dbname = "Serre";
*/

//développement à la maison (wamp)

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Serre";



// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête SQL pour récupérer les données
$sql = "SELECT m.*, d.date, d.time FROM `Measure` m INNER JOIN `Date` d ON m.id_date = d.id ORDER BY d.date ASC, d.time ASC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dates[] = $row['date'];
        $time[] = $row['time'];
        $temperature[] = $row['temperature'];
        $hyground[] = $row['hygrometry_grnd'];
        $hygroserre[] = $row['hygrometry_serre'];
        $speed[] = $row['wind_speed'];
    }
} else {
    echo "0 résultats";
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphique des Mesures</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('Serrre.jpg'); 
            background-size: cover;
            margin: 0;
            padding: 0;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            
        }

        .navbar {
            overflow: hidden;
            background-color: #4CAF50;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar li {
            float: left;
        }

        .navbar li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar li a:hover:not(.active) {
            background-color: #45A049;
        }

        .navbar .logout {
            float: right;
            background-color: #ff00;
        }

        .navbar .logout a {
            color: white;
        }

    </style>
</head>
<body>
    <div class="navbar">
        <h1>État de la Serre</h1>
        <ul>
            <li><a href="config3.php">Configuration</a></li>
            <li><a href="command.php">Contrôle de la Serre</a></li>
            <li><a href="acceuil.php">Session</a></li>
        </ul>
    </div>

    <div class="container">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <script>
     // Création du graphique avec Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line', // type de graphique
            data: {
                labels: <?php echo json_encode($time); ?>, 
                datasets: [
                    {
                        label: 'temperature',
                        data: <?php echo json_encode($temperature); ?>, // Récupération des données PHP
                        backgroundColor: '#cc3300',
                        borderColor: '#cc3300',
                        borderWidth: 1
                    },
                    {
                        label: 'hygrometrie du sol',
                        data: <?php echo json_encode($hyground); ?>, // Récupération des données PHP
                        backgroundColor: '#4CAF50',
                        borderColor: '#4CAF50',
                        borderWidth: 1
                    },
                    {
                        label: 'hygrometrie dans la serre',
                        data: <?php echo json_encode($hygroserre); ?>, // Récupération des données PHP
                        backgroundColor: '#F7FF00',
                        borderColor: '#F7FF00',
                        borderWidth: 1
                    },
                    {
                        label: 'vitesse du vent',
                        data: <?php echo json_encode($speed); ?>, // Récupération des données PHP
                        backgroundColor: '#002EFF',
                        borderColor: '#002EFF',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 50  // Définir le maximum de l'axe Y à 50
                    }
                }
            }
        });

        /*
        // Ajout du graphique radar pour la direction du vent
        var ctxRadar = document.getElementById('myRadarChart').getContext('2d');
        var myRadarChart = new Chart(ctxRadar, {
            type: 'radar',
            data: {
                labels: <?php echo json_encode($time); ?>, // Utiliser les mêmes labels que pour les graphiques en ligne
                datasets: [
                    {
                        label: 'Direction du vent',
                        data: <?php echo json_encode($direction); ?>, // Données de direction du vent
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    r: {
                        min: 0,
                        max: 360, // Plage de valeurs pour la direction du vent (0-360 degrés)
                        stepSize: 45 // Échelle des valeurs sur les axes radiaux (par exemple, toutes les 45 degrés)
                    }
                }
            }
        });

        */
        
    </script>
</body>
</html>
