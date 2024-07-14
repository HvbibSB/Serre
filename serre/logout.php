<?php
session_start(); //Démarre ou restaure la session existante

//Vérirfie si le bouton a été cliqué

if (isset($_POST['logout'])) {
	
	//Effectue les actions de déconnexion 

	session_unset(); //Supprime toutes les variables de sessions
	session_destroy(); //Détruit la session

	//Redirection vers l'index

	header("Location: index.html");
	exit();
}

?>