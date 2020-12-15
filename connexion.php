<?php

// CONNEXION


?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" type="text/css" href="desi/default.css">        
    </head>

    <body>

    	<header>

    		<h1>Connexion</h1>

    	</header>
    	
    	<div class="container">
	    	<p id="info">Bienvenue sur mon site, si vous n'êtes toujours pas inscrit, alors <a href="index.php">Inscrivez-vous.</a></p>

	    	<div id="form">
			    <form method="post" action="connexion.php">

		    		<table>
		    			<tr>	
				    		<td>Email</td>
				    		<td><input type="email" name="email" placeholder="Ex : louis.nicolas@leuillet.com"></td>
				    	</tr>
				    	<tr>
				    		<td>Mot de passe</td>
				    		<td><input type="password" name="password" placeholder="*****"></td>
				    	</tr>
			    	</table>

			    	<div id="button">
			    		<button type="submit">Inscription</button>
			    	</div>
			    	<a href=""></a>

			    </form>
			</div>
    	</div>
    </body>
    
</html>


