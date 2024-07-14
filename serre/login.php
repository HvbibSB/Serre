<?php
// Vérifie si le formulaire de connexion a été soumis
if (isset($_POST['submit'])) {
  $submit = $_POST['submit'];

//Développement au lycée sous linux (lamp)
  /*
  $servername = "localhost";
  $username = "root";
  $password = "btssnirjeanperrin";
  $dbname = "Serre";
  */
  //Développement à la maison (Wamp)
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Serre";
  
  $login = $_POST['login'];
  $mdp = $_POST['password'];

   //connection à la base de données 

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Erreur de connexion man:".$conn->connect_error);
  }

  //requête dans la base de donnée 
  $sql = "SELECT * FROM User WHERE login = '$login' AND password = '$mdp'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
  	//Authentification réussie, créer une session pour l'utilisateur
  	session_start();
  	$_SESSION['login'] = $login;
  	//redirection vers la page d'acceuil
  	header("Location: acceuil.php");
    exit(); // Assure la fin de l'exécution du script après la redirection

  } else {
  	echo '<p style="color: red;">Identifiants incorrects. Veuillez réessayer.</p>';
  }

  	//fermer la connexion à la base de données
	$conn->close();
}

?>
