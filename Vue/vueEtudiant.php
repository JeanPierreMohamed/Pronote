<?php session_start(); 
$co = mysqli_connect("localhost" , "root" , "", "eproject") or die("erreur de connexion");
?>

<html lang="fr">
<head>
	<title>eProject | Etudiant</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="icon" type="image/png" href="../Include/Images/favicon.png" />
    <link rel="stylesheet" media="screen" href="../Include/Style/Style.css" type="text/css" />
</head>
<body>
    
    <div class="header">
			<?php
			if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo']) == 'admin' ){
				require_once("../Vue/headerAdmin.php");
			}
			elseif (isset($_SESSION['pseudo'])){
				require_once("../Vue/header.php");
				}
			else{ 
				require_once("../Vue/header.php");
			} 
			?>
    </div>
	<div class="bloc_page">
	
	<section id="tableau">
	<?php
	
		echo "<h1>Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom']."  ! Voici vos notes ! </h1>"
	?>
	
	<?php
		$co = mysqli_connect("localhost" , "root" , "", "eproject") or die("erreur de connexion"); 
		$sql = "SELECT eleve.Nom, eleve.Prenom, Maths, Physique, Francais, SVT, Anglais, Sport 
		FROM eleve, compte 
		WHERE Pseudo = '".$_SESSION['pseudo']."' 
		AND compte.Prenom = eleve.Prenom
		AND compte.Nom = eleve.Nom";
		$req = mysqli_query($co, $sql) or die('ErreurSQL<br />'.$sql.'<br />'. mysqli_error ());

		if(false !== $req) 
		{ 
			if(mysqli_num_rows($req) > 0) 
		{ 
		echo '<div class="aligner">';
		echo '<table border="1">'; 
         
        $row = mysqli_fetch_assoc($req); 
         
        echo '<tr><th>', implode('</th><th>', array_keys($row)), '</th></tr>'; 
         
        do 
        { 
            echo '<tr><td>', implode('</td><td>', $row), '</td></tr>'; 
        } 
        while($row = mysqli_fetch_row($req)); 
         
        echo '</table>'; 
		echo '</div>';
		} 
     
		mysqli_free_result($req);     
	}
	?>
	</section>
	</br>
	</br>
	<section id="membre">
	<div id="connection">
		<form method="post" action="../Controleur/deconnexion.php" >
			<p><input type="submit" name="deconnexion" value = "Deconnexion" /></p>
		</form>	
	</div>
	</section>
				
    <div class="colonne">
            
    </div>
	</div>
    <div class="footer-form">
        <?php include("../Include/footer.php"); ?>
    </div>
</body>
    

</html>