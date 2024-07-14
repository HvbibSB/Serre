<?php

  //récuperation des donné de la serre

if (isset($_POST['temperature']) && isset($_POST['hyground']) && isset($_POST['hygroserre']) && isset($_POST['speed']) && isset($_POST['direction'])) {
  $temperature = $_POST['temperature'];
  $hyground = $_POST['hyground'];
  $hygroserre = $_POST['hygroserre'];
  $speed = $_POST['speed'];
  $direction = $_POST['direction'];

  /*rentrer les valeurs de la date à laquelle les mesures ont été prise
  
  /code/

  */
  
  $servername = "localhost";
  $username = "root";
  $password = "btssnirjeanperrin";
  $dbname = "Serre";
 
  //connection à la base de données 

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Erreur de connexion man:".$conn->connect_error);
  }

  //Requête d'insertion des donnée dans la table

  $sql = "INSERT INTO measure(id, temperature, hygrometry_grnd, hygrometry_serre, wind_speed, wind_direction, id_date) VALUES ('Serre', ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $temperature, $hyground, $hygroserre, $speed, $direction); 
  if ($stmt->execute()) {
    
    //redirection vers la page d'acceuil du compte
    
    //header("Location: acceuil.html");
    exit(); // Assure la fin de l'exécution du script après la redirection
  } else {
    echo "Erreur:".$stmt->error;
    }

    //fermer la connexion à la base de données
    
    $stmt->close();
    $conn->close();
  } else {
    echo '<font color="red">Erreur lors de la transmission des données de la serre.</font>';
  }


?>