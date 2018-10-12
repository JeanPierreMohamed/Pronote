<?php
	$co = mysqli_connect("localhost", "root", "", "eproject");
	mysqli_query($co, "set names utf8");
	
	$eleves = "";
	if ($_POST['code'] != null) {
		$requete = "select IDEleve, Prenom, Nom from Classe c, Eleve e where e.Classe = c.Code and c.Code = ".$_POST['code'];
		$res = mysqli_query($co, $requete) or die ("Erreur requète ligne ".__LINE__." : $requete");
		while ($row = mysqli_fetch_row($res)) {
			$eleves .= $row[0]."*".$row[1]." ".$row[2]."/";
		}
		$eleves = substr($eleves, 0, strlen($eleves)-1);
	}
	echo $eleves;
?>