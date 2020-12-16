<?php
// Projet #4 : Espace Membre

session_start();

require('src/connection.php');


if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_psw'])) {

	// VARIABLES
	$pseudo   = $_POST['pseudo'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$conf_psw = $_POST['confirm_psw'];


	// TEST CONFIRMATION PASSWORD

	if ($password != $conf_psw) {
		
		header('location: ../?error=1&pass=1');
	}

	// TEST : SI MAIL UTILISE
	$req = $db->prepare('SELECT COUNT(*) AS x
						 FROM users
						 WHERE email = ?');

	$req->execute(array($email));

	while ($result = $req->fetch()) {
		if ($result['x'] != 0) {
			header('location: ../?error=1&email=1');
			exit();
		}
	}

	// HASH
	$secret = sha1($email).time();
	$secret = sha1($secret).time().time();

	// CRYPTAGE DU PASSWORD
	$password = "g85".sha1($password."1264")."65";

	// ENVOI DE LA REQUETE
	$req = $db->prepare('INSERT INTO users(pseudo, email, password, secret)
						 VALUES (?, ?, ?, ?)');

	$req->execute(array($pseudo, $email, $password, $secret));

	header('location: ../?success=1');
	exit();
}

?>






<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Espace Membre</title>
        <link rel="stylesheet" type="text/css" href="design/default.css">
    </head>

    <body>

    	<header>
    		<h1>Inscription</h1>
    	</header>

    	<div class="container">
    		
    		<?php

    			if (!isset($_SESSION['connect'])) {
    		?>

    		<p id="info">Bienvenue sur mon site pour en voir plus, inscrivez-vous. Sinon, <a href="connexion.php">connectez-vous.</a></p>
    	
    		<?php 
    			if (isset($_GET['error'])) {

    				if (isset($_GET['pass'])) {
    					echo '<p id="error">Les mots de passe ne sont pas identiques</p>';

    				} else

    				if (isset($_GET['email'])) {
    					echo '<p id="error">Cette adresse email est déjà utilisée.</p>';
    				}
    			
    			} elseif (isset($_GET['success'])) {
    						echo '<p id="success">Bravo! Vous êtes maintenant inscrit!</p>';
       			}

    		?>

    		<div id="form">
		    	<form method="post" action="index.php">

		    		<table>
		    			<tr>
				    		<td>Pseudo</td>
				    		<td><input type="text" name="pseudo" placeholder="Ex : Louigi" required></td>
				    	</tr>
				    	<tr>	
				    		<td>Email</td>
				    		<td><input type="email" name="email" placeholder="Ex : louis.nicolas@leuillet.com" required></td>
				    	</tr>
				    	<tr>
				    		<td>Mot de passe</td>
				    		<td><input type="password" name="password" placeholder="*****" required></td>
				    	</tr>
				    	<tr>
				    		<td>Confirmation</td>
				    		<td><input type="password" name="confirm_psw" placeholder="*****" required></td>
				    	</tr>
			    	</table>
		    		<div id="button">
			    		<button type="submit">Inscription</button>
			    	</div>

		    	</form>
	    	</div>

	    	<?php } else { ?>

	    		<!-- Le '< ? =' remplace le '< ? php echo ... ;' -->
			    <p id="info">
			    	Bonjour <?= $_SESSION['pseudo'] ?> !<br>Bienvenue sur notre site!<br>
			    	<a href="disconnection.php">Déconnexion</a>
			    </p> 

			<?php } ?>

    	</div>
    
    </body>
    
</html>
