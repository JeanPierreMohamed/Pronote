<?php 
	$succes = null;
	if ($_POST['code'] != null &&
	    $_POST['maths'] != null &&
	    $_POST['physique'] != null &&
	    $_POST['francais'] != null &&
	    $_POST['svt'] != null &&
	    $_POST['anglais'] != null &&
	    $_POST['sport'] != null) {
	
		$co = mysqli_connect("localhost","root","","eproject");
		mysqli_query($co, "set names utf8");
		
		
		$requete = "update eleve set 
				Maths = ".$_POST['maths'].", 
				Physique = ".$_POST['physique'].", 
				Francais = ".$_POST['francais'].", 
				SVT = ".$_POST['svt'].", 
				Anglais = ".$_POST['anglais'].", 
				Sport = ".$_POST['sport'];
		$requete .= " where IDEleve = ".$_POST['code'];
		$res = mysqli_query($co, $requete) or die ("Erreur requête ligne ".__LINE__." : $requete");
		$succes = 1;
	}
?>