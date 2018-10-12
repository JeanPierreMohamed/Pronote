
<?php

	session_start();

	$co = mysqli_connect("localhost" , "root" , "", "eproject") or die("erreur de connexion");  // Connexion � la base de donn�es.

	// On met les variables utilis�s du script PHP � FALSE.
	$error = FALSE;

	$connexionOK = FALSE;
	   
	   // On regarde si tout les champs sont remplis. Sinon on lui affiche un message d'erreur.   
	   if(empty($_POST['pseudo']) || empty($_POST['mdpasse']))
	   {
		  
			$error = TRUE;
		  
			$errorMSG = '<p>une erreur s\'est produite pendant votre identification.
			Vous devez remplir tous les champs</p>
			<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';  
		}
	   
	   // Sinon si tout les champs sont remplis alors on regarde si le nom de compte rentr� existe bien dans la base de donn�es.
		else
		{
		  
			$requete = "SELECT pseudo FROM Compte WHERE pseudo= '".$_POST["pseudo"]."'";
		  
			$res = mysqli_query($co, $requete);
		  
			// Si oui, on continue le script...      
			if($requete){
				 
				 // On s�lectionne toute les donn�es de l'utilisateur dans la base de donn�es.   
				$requete2 = "SELECT * FROM Compte WHERE pseudo = '".$_POST["pseudo"]."' ";
			  
				$res2 = mysqli_query($co, $requete2) or die(mysqli_error($co));
				 
				 // Si la requ�te SQL c'est bien pass�...      
				if($requete2){
				 
					// On r�cup�re toute les donn�es de l'utilisateur dans la base de donn�es.
					
					while($row = mysqli_fetch_assoc($res2)){
					
					// Si le mot de passe entr� � la m�me valeur que celui de la base de donn�es, on l'autorise a se connecter...         
						if($_POST["mdpasse"] == $row["MotDePasse"]){
							
							if($row['IDCompte'] == 1){
							header("Location: ../Vue/administrateur.php");
							}
							else {
					
							$connexionOK = TRUE;
						   
							$connexionMSG = 'Connexion au site réussie. Vous êtes désormais connecté ! </br> Cliquez <a href="../Vue/vueEtudiant.php">ici</a> pour voir vos notes.';  
						   
							$_SESSION["pseudo"] = $_POST["pseudo"];
						   
							$_SESSION["mdpasse"] = $_POST["mdpasse"];
							
							$_SESSION["prenom"] = $row["Prenom"];
							
							$_SESSION["nom"] = $row["Nom"];
							}
					
						}
					
						// Sinon on lui affiche un message d'erreur.
						else{
						
						   $error = TRUE;
						
							$errorMSG = '<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo entr� n\'est pas correcte.<br />Cliquez <a href="../index.php">ici</a> pour revenir � la page d accueil</p>';
						}
						}
				
					}		
			 
			 
			 
					// Sinon on lui affiche un message d'erreur.      
					else{
					 
					$error = TRUE;
					 
					$errorMSG = '<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo entr� n\'est pas correcte.<br />Cliquez <a href="../index.php">ici</a> pour revenir � la page d accueil</p>';
				
					}
				}
			
				  // Sinon on lui affiche un message d'erreur.      
				else{
					 
				$error = TRUE;
					 
				$errorMSG = '<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo entré n\'est pas correcte.</p><br />Cliquez <a href="../index.php">ici</a> pour revenir à la page d accueil</p>';
				}
			 
		}
	   
		
	   

	mysqli_close($co);

	?>
	
<html lang="fr">
<head>
	<title>eProject | Connexion</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="icon" type="image/png" href="../Include/Images/favicon.png" />
    <link rel="stylesheet" media="screen" href="../Include/Style/Style.css" type="text/css" />
</head>
<body>
    
    <div class="header">
			<?php
			if (isset($_SESSION['login'])){
				require_once("../Vue/header.php");
				}
			else{ 
				require_once("../Vue/header.php");
			} 
			?>
    </div>
	
	<div class="bloc_page">
	
	<?php if(isset($_SESSION["login"]) AND isset($_SESSION["pass"])){
	   
	   echo "<p style=\"color:green\">Bienvenue <strong>".$_SESSION['pseudo']."</strong></p>";
	   
	} ?>

	<?php if($error == TRUE){ echo "<p align=\"center\" style=\"color:red\"><strong>".$errorMSG."</strong></p>"; } ?>

	<?php if($connexionOK == TRUE){ echo "<p align=\"center\" style=\"color:green\"><strong>".$connexionMSG."</strong></p>"; } ?>
	
    <div class="colonne">
 
    </div>           
            
    </div>




    <div class="footer-form">
        <?php include("../Include/footer.php"); ?>
    </div>
    </body>
    

</html>