<?php
// Projet #4 : Espace Membre

// INSCRIPTION





?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Espace Membre</title>
        <link rel="stylesheet" type="text/css" href="desi/default.css">
    </head>

    <body>

    	<header>
    		<h1>Inscription</h1>
    	</header>

    	<div class="container">
    	
    		<p id="info">Bienvenue sur mon site pour en voir plus, inscrivez-vous. Sinon, <a href="connexion.php">connectez-vous.</a></p>
    	
    		<div id="form">
		    	<form method="post" action="index.php">

		    		<table>
		    			<tr>
				    		<td>Pseudo</td>
				    		<td><input type="text" name="name" placeholder="Ex : Louigi"></td>
				    	</tr>
				    	<tr>	
				    		<td>Email</td>
				    		<td><input type="email" name="email" placeholder="Ex : louis.nicolas@leuillet.com"></td>
				    	</tr>
				    	<tr>
				    		<td>Mot de passe</td>
				    		<td><input type="password" name="password" placeholder="*****"></td>
				    	</tr>
				    	<tr>
				    		<td>Confirmation</td>
				    		<td><input type="password" name="confirm_psw" placeholder="*****"></td>
				    	</tr>
			    	</table>
		    		<div id="button">
			    		<button type="submit">Connexion</button>
			    	</div>
			    	<a href=""></a>
		    	</form>
	    	</div>
    	</div>
    
    </body>
    
</html>
