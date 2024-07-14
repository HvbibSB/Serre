<?php


//Récuperation des paramètres de la serre 
    //echo "test0";
    if (isset($_POST['temperature']) && isset($_POST['hyground']) && isset($_POST['hygroserre']) && isset($_POST['speed']) && isset($_POST['direction']) && isset($_POST['window']) && isset($_POST['fan']) && isset($_POST['heat'])) {
        //echo "test1";
        $temperature = $_POST['temperature'];
        $hyground = $_POST['hyground'];
        $hygroserre = $_POST['hygroserre'];
        $speed = $_POST['speed'];
        $direction = $_POST['direction'];
        $window = $_POST['window'];
        $fan = $_POST['fan'];
        $heat = $_POST['heat'];

        //Développement au lycée sous linux (lamp)
        $servername = "localhost";
        $username = "root";
        $password = "btssnirjeanperrin";
        $dbname = "Serre";
        
        //Développement à la maison sous windows (Wamp)
        /*
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Serre";
        */
        
        //Connexion à la base de données

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo "probleme de connexion.";
            die("Erreur de connexion man:".$conn->connect_error);
        }
        //echo "test1";
        //Requête d'insertion dans la table settings    
        $sql = "INSERT INTO `settings` (`id`, `temperature`, `hyground`, `hygro_serre`, `speed`, `direction`, `window`, `fan`, `heat`) VALUES (NULL, '$temperature', '$hyground', '$hygroserre', '$speed', '$direction','$window','$fan','$heat');";
        //echo $sql;
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Les paramètres ont été enregistrés avec succès chef.";
            //header("Location: acceuil.html");
        } else {
            echo "Erreur lors de l'enregistrement des paramètres chef :" . $conn->error;
        }
        //echo "test0";
        //Fermeture de la base de données
        $conn->close();
    } else {
        echo '<font color="red"> Erreur de transmission chef</font>';
    }
    
?>