<?php
	if ($_POST['value'] != null) {
		$co = mysqli_connect("localhost","root","","eproject");
		mysqli_query($co, "set names utf8");
		
		$requete = "select IDEleve, Prenom, Nom from Eleve where instr(upper(Nom), upper('".mysqli_real_escape_string($co, $_POST['value'])."')) > 0 or instr(upper(Prenom), upper('".mysqli_real_escape_string($co, $_POST['value'])."')) > 0";
		$res = mysqli_query($co, $requete) or die ("Erreur requete : $requete");
		
		$s = "";
		while ($row = mysqli_fetch_row($res)) {
			$t = explode($_POST['value'], $row[1]." ".$row[2]);
			$s .= $row[0]."*";
			for ($i = 0; $i < count($t)-1; $i++) {
				$s .= $t[$i].'<b style="text-decoration: underline">'.$_POST['value']."</b>";
			}
			$s .= $t[count($t)-1];
			$s .= "_";
		}
		$s = substr($s, 0, strlen($s)-1);
		echo $s;
	}
?>