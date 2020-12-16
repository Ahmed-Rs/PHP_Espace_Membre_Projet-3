<?php

session_start();

if (isset($_SESSION['connect'])) { // Confirme que notre utilisateur est connecté.
	header('location: ../');
}

require('src/connection.php');

if (!empty($_POST['email']) && !empty($_POST['password'])) {

	// VARIABLES
	$email 		= $_POST['email'];
	$password   = $_POST['password'];

	// CRYPTAGE
	$password   = "g85".sha1($password."1264")."65";

	$req = $db->prepare('SELECT *
					     FROM users
					     WHERE email = ?');

	$req->execute(array($email));

	while ($user = $req->fetch()) {

		if ($password == $user['password']) {

			$_SESSION['connect']  = 1;
			$_SESSION['pseudo']   = $user['pseudo'];

			// $_POST['connect'] n'existe que si c'est coché sur le navigateur vue que c'est une checkbox.
			if (isset($_POST['connect'])) {
				
				setcookie('log', $user['secret'], time() + 365*24*3600, '/', null, false, true);

			}

			header('location: ../connexion.php?success=1');
			exit();

		}
		
	}

	header('location: ../connexion.php?error=1');
	exit();

}


?>






<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" type="text/css" href="design/default.css">        
    </head>

    <body>

    	<header>

    		<h1>Connexion</h1>

    	</header>
    	
    	<div class="container">
	    	<p id="info">Bienvenue sur mon site, si vous n'êtes toujours pas inscrit, alors <a href="index.php">Inscrivez-vous.</a></p>

	    	<?php 
	    		if (isset($_GET['error'])) {
	    			echo '<p id="error">Erreur d\'authentification.</p>';
	    		}
	    		else if (isset($_GET['success'])) {
	    			echo '<p id="success">Vous êtes maintenant connecté.<p/>';
	    		}

	    	?>

	    	<div id="form">
			    <form method="post" action="connexion.php">

		    		<table>
		    			<tr>	
				    		<td>Email</td>
				    		<td><input type="email" name="email" placeholder="Ex : louis.nicolas@leuillet.com" required></td>
				    	</tr>
				    	<tr>
				    		<td>Mot de passe</td>
				    		<td><input type="password" name="password" placeholder="*****" required></td>
				    	</tr>
			    	</table>
			    	<p><label><input type="checkbox" name="connect" checked>Connexion automatique.</label></p>

			    	<div id="button">
			    		<button type="submit">Connexion</button>
			    	</div>
			    	<a href=""></a>

			    </form>
			</div>
    	</div>
    </body>
    
</html>


