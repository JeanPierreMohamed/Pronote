<?php
session_start(); 
session_destroy();?>

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
			if (isset($_SESSION['login']) && ($_SESSION['login']) == 'admin' ){
				require_once("../Vue/headerAdmin.php");
			}
			elseif (isset($_SESSION['login'])){
				require_once("../Vue/header.php");
				}
			else{ 
				require_once("../Vue/header.php");
			} 
			?>
    </div>
	
	<div class="bloc_page">
	
	<h2>Déconnexion au site réussie. Vous êtes désormais déconnecté ! </br> Cliquez <a href="../index.php">ici</a> pour revenir à l'écran d'accueil.</h2>
	
    <div class="colonne">
 
    </div>           
            
    </div>




    <div class="footer-form">
        <?php include("../Include/footer.php"); ?>
    </div>
    </body>
    

</html>