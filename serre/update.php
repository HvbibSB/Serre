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

    //connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    //vérifie la connexion
    if ($conn->connect_error) {
        echo "probleme de connexion.";
        die("Erreur de connexion man:".$conn->connect_error);
    }

    // Récuperation des données des paramètres
    $temperature = $_POST['temperature'];
    $hyground = $_POST['hyground'];
    $hygroserre = $_POST['hygroserre'];
    $speed = $_POST['speed'];
    $direction = $_POST['direction'];
    $window = $_POST['window'];
    $fan = $_POST['fan'];
    $heat = $_POST['heat'];
    $setting_id = $_POST['setting_id'];

    if ($_POST['submit'] == "Enregistrer les nouveaux paramètres") {
        $sql = "UPDATE `settings` SET `id`='$setting_id', `temperature`='$temperature', `hyground`='$hyground', `hygro_serre`='$hygroserre', `speed`='$speed', `direction`='$direction', `window`='$window', `fan`='$fan', `heat`='$heat' WHERE 1";
    } else {
        $sql = "INSERT INTO `settings` (`id`, `temperature`, `hyground`, `hygro_serre`, `speed`, `direction`, `window`, `fan`, `heat`) VALUES (NULL, '$temperature', '$hyground', '$hygroserre', '$speed', '$direction','$window','$fan','$heat');";
    } 

    //echo $sql;

    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['message'] = "Les paramètres ont été enregistrés avec succès chef.";
    } else {
        echo '<font color="red">Erreur de transmission chef</font>';
    }
    header("Location: acceuil.php");
    
    $conn->close();
?>
