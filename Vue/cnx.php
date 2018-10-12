<?php
	$serveur = 'localhost';
	$user = 'root';
	$mdpasse = '';
	$bdd = 'eproject';
	
	try {
		$cnx = mysqli_connect($serveur, $user, $mdpasse, $bdd);
	}
	catch()
	{
	
	}
?>