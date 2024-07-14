<?php
//développement sur linux au lycée (lamp)
$servername = "localhost";
$username = "root";
$password = "btssnirjeanperrin";
$dbname = "Serre";
//développement sur windows à la maison (wamp)
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Serre";*/

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Problème de connexion : " . $conn->connect_error);
}

$sql = "SELECT m.*, d.date, d.time FROM `Measure` m INNER JOIN `Date` d ON m.id_date = d.id ORDER BY d.date DESC, d.time DESC LIMIT 10";
$result = $conn->query($sql);

$labels = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$data = [2, 4, 5, 7, 1, 2, 6, 6, 4, 7];
$data2 = [1, 2, 3, 5, 7, 9, 11, 13, 15, 16];

 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} 

// echo json_encode($data);
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>État de la Serre</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="graph.css">
</head>
<body>

    <div class="container">
        <h1>État de la Serre</h1>
        <div class="chart-container">
            <canvas id="chart"></canvas>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $.ajax({
                url: 'graph.php',
                type: 'GET',
                success: function(data) {
                    var dates = [];
                    var temperatures = [];
                    var hygroserres = [];
                    var hygrometry_grnds = [];
                    var windowStates = [];
                    var fanStates = [];
                    var heatStates = [];

                    for(var i in data) {
                        dates.push(data[i].date);
                        temperatures.push(data[i].temperature);
                        hygroserres.push(data[i].hygroserre);
                        hygrometry_grnds.push(data[i].hygrometry_grnd);
                        windowStates.push(data[i].window);
                        fanStates.push(data[i].fan);
                        heatStates.push(data[i].heat);
                    }

                    var ctx = document.getElementById('chart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: <?php echo json_encode($labels); ?>,
                            datasets: [{
                                label: 'Température (°C)',
                                data: <?php echo json_encode($data); ?>,
                                borderColor: '#ff5733',
                                backgroundColor: 'rgba(255, 87, 51, 0.2)',
                                yAxisID: 'temperature'
                            }, {
                                label: 'Hygrométrie dans la serre (%)',
                                data: <?php echo json_encode($data); ?>,
                                borderColor: '#3366ff',
                                backgroundColor: 'rgba(51, 102, 255, 0.2)',
                                yAxisID: 'hygroserre'
                            }, {
                                label: 'Hygrométrie du sol (%)',
                                data: hygrometry_grnds,
                                borderColor: '#00cc44',
                                backgroundColor: 'rgba(0, 204, 68, 0.2)',
                                yAxisID: 'hygrometry_grnd'
                            }, {
                                label: 'Ouvrants',
                                data: windowStates,
                                borderColor: '#ff9933',
                                backgroundColor: 'rgba(255, 153, 51, 0.2)',
                                yAxisID: 'binary'
                            }, {
                                label: 'Ventilateurs',
                                data: fanStates,
                                borderColor: '#9933ff',
                                backgroundColor: 'rgba(153, 51, 255, 0.2)',
                                yAxisID: 'binary'
                            }, {
                                label: 'Chauffage',
                                data: heatStates,
                                borderColor: '#cc3300',
                                backgroundColor: 'rgba(204, 51, 0, 0.2)',
                                yAxisID: 'binary'
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                },
                                temperature: {
                                    position: 'left',
                                    title: {
                                        display: true,
                                        text: 'Température (°C)'
                                    }
                                },
                                hygroserre: {
                                    position: 'right',
                                    title: {
                                        display: true,
                                        text: 'Hygrométrie dans la serre (%)'
                                    }
                                },
                                hygrometry_grnd: {
                                    position: 'right',
                                    title: {
                                        display: true,
                                        text: 'Hygrométrie du sol (%)'
                                    }
                                },
                                binary: {
                                    position: 'right',
                                    title: {
                                        display: true,
                                        text: 'État'
                                    },
                                    ticks: {
                                        stepSize: 1,
                                        callback: function(value, index, values) {
                                            return value == 1 ? 'Activé' : 'Désactivé';
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</body>
</html>
