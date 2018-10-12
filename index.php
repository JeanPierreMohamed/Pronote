<?php session_start(); ?>
<html lang="fr">
<head>
	<title>eProject | Accueil</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="icon" type="image/png" href="Include/Images/favicon.png" />
    <link rel="stylesheet" media="screen" href="Include/Style/Style.css" type="text/css" />
</head>
<body>
    
    <div class="header">
			<?php
			if (isset($_SESSION['login']) && ($_SESSION['login']) == 'admin' ){
				require_once("Vue/headerAdmin.php");
			}
			elseif (isset($_SESSION['login'])){
				require_once("Vue/header.php");
				}
			else{ 
				require_once("Vue/header.php");
			} 
			?>
    </div>
	
	<div class="bloc_page">
		<h1> Bonjour visiteur ! Bienvenue sur Pronote ! </h1>
		
		<section id="membre">
			<div id="connection">
				<form method="post" action="Controleur/connexion.php" >
					<p><h1> Connexion </h1></p>
					<p><label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id = "pseudo"/> <br/></p>
					<p><label for="mdp">Mot de passe : </label><input type="password" name="mdpasse" id = "mdpasse" /> <br/></p>
					<p><input type="submit" name="connexion" value = "Connexion" /></p>
				</form>	
			</div>
		</section>
	
    <div class="colonne">
 

    </div>           
            
    </div>
    <div class="footer-form">
        <?php include("Include/footer.php"); ?>
    </div>
    </body>
    

</html>