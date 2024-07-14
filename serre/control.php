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

    // Récuperation de l'état des actionneur
    $window = $_POST['window'];
    $fan = $_POST['fan'];
    $heat = $_POST['heat'];
    $state_id = $_POST['state_id'];
    $id_date = $_POST['date_id'];

    if ($_POST['submit'] == "Désactiver") {
         $sql = "UPDATE `state` SET `window` = '$window', `fan` = '$fan', `heat` = '$heat', `id_date` = '$id_date' WHERE `id_state` = '$state_id'";
    } else {
        $sql = "INSERT INTO `state` (`window`, `fan`, `heat`, `id_date`) VALUES ('$window','$fan','$heat', '$id_date');";
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

