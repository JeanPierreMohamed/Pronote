<?php
	$co = mysqli_connect("localhost", "root", "", "eproject");
	mysqli_query($co, "set names utf8");
	
	$infos = "";
	if ($_POST['id'] != null) {
		$requete = "select * from Eleve where IDEleve = ".$_POST['id'];
		$res = mysqli_query($co, $requete) or die ("Erreur requète ligne ".__LINE__." : $requete");
		if ($row = mysqli_fetch_assoc($res)) {
			$infos .= "Maths*".$row['Maths']."/Physique*".$row['Physique']."/Francais*".$row['Francais']."/SVT*".$row['SVT']."/Anglais*".$row['Anglais']."/Sport*".$row['Sport'];
		}
	}
	echo $infos;
?>