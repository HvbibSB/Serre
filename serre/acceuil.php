<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="acceuil.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Session</title>
</head>
<body>
	<header>
		<h1 align="center">
			<font color="white">Bienvenue</font>
		</h1>
	</header>
	<!-- Autres contenus de la page -->
	<div class="container">
		<?php if (isset($_SESSION['message'])): ?>
			<div class="message"><?php echo $_SESSION['message']; ?></div>
			<?php unset($_SESSION['message']); ?>
		<?php endif; ?>
	</div>
	<div class="floating-container">
       	<div class="floating-block">
           	<a href="graph3.php" target="_blank">Consulter la serre</a>
       	</div>
       	<div class="floating-block">
           	<a href="config3.php" target="_blank">Configuration</a>
       	</div>
       	<div class="floating-block">
           	<a href="command.php" target="_blank">Contrôle de la serre</a>
       	</div>
   	</div>
	<!-- Formulaire de déconnexion -->
	<form action="logout.php" method="POST">
		<input type="submit" value="Déconnexion" name="logout">
	</form>
</body>
</html>
