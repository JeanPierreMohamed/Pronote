<?php session_start(); 
$co = mysqli_connect("localhost" , "root" , "", "eproject") or die("erreur de connexion");
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>eProject | Professeur</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="icon" type="image/png" href="../Include/Images/favicon.png" />
		<link rel="stylesheet" media="screen" href="../Include/Style/Style.css" type="text/css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script type="text/javascript" src="jQuery.js"></script>
		<script type="text/javascript" src="notes.js"></script>
		<script type="text/javascript" src="classe.js"></script>
		<script type="text/javascript" src="moyenne.js"></script>
		<script type="text/javascript" src="modifier.js"></script>
		<script type="text/javascript" src="sauvegarder.js"></script>
		<script type="text/javascript" src="autocomplete.js"></script>
		<script type="text/javascript">
			var eleveListe = true;
			var idEleve = 1;
		</script>
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
	
	<section id="membre">
	<form method="post" action="administrateur.php">
			<select id="formClasse" name="classe" onchange="changerClasse(this.value)">
			<?php
				$co = mysqli_connect("localhost", "root", "", "eproject");
				mysqli_query($co, "set names utf8");
				$requete = "SELECT * FROM Classe";
				$res = mysqli_query($co, $requete) or die ('ErreurSQL<br />'.$sql.'<br />'. mysqli_error ());
				while ($row = mysqli_fetch_assoc($res)) {?>
					<option value="<?php echo $row['Code'] ?>"><?php echo $row['Classe'] ?></option>
			<?php	}?>
			</select>
			
			<select id="formEleve" name="eleve" onchange="eleveListe = true; idEleve = this.value; bulletin(this.value);">
			<?php 
				$requete = "select IDEleve, Prenom, Nom from Classe c, Eleve e where e.Classe = c.Code and c.Code = 1";
				$res = mysqli_query($co, $requete) or die ('ErreurSQL<br />'.$sql.'<br />'. mysqli_error ());
				while ($row = mysqli_fetch_row($res)) {?>
					<option value="<?php echo $row[0] ?>"><?php echo $row['1']." ".$row['2'] ?></option>
			<?php	}?>
			</select>
			</br>
			<h3>OU</h3>
			<label for="search"> Recherche : </label></br>
			<input type="text" id="search" name="search" autocomplete="off" onkeyup="refresh(this.value)" />
			<ul id="liste">
			
			</ul>
			
			</br>

			<p><input id="boutonModif" type="button" value="Modifier les notes" onclick="modifierNotes()" /></p></br>
	</section>
			

			</br>
			<p><h3 id="afficheModif" style="padding-left: 75px"></h3></p>
			<div id="notes">
			
			</br>
			<p>
			<table border="1">
				<?php
					$requete = "select * from eleve where IDEleve = 1 ";
					$res = mysqli_query($co, $requete) or die ('ErreurSQL<br />'.$sql.'<br />'. mysqli_error ());
					while ($row = mysqli_fetch_assoc($res)) {
				?>
				<tr>
					<th>Maths</th>
					<th>Physique</th>
					<th>Français</th>
					<th>SVT</th>
					<th>Anglais</th>
					<th>Sport</th>
					
				</tr>
				<tr>
					<td><input type="text" id="maths" size="5" class="note" name="maths" value="<?php echo $row['Maths'] ?>" onkeyup="moy()" disabled /></td>
					<td><input type="text" id="physique" size="5" class="note" name="physique" value="<?php echo $row['Physique'] ?>" onkeyup="moy()" disabled /></td>
					<td><input type="text" id="francais" size="5" class="note" name="francais" value="<?php echo $row['Francais'] ?>" onkeyup="moy()" disabled /></td>
					<td><input type="text" id="svt" size="5" class="note" name="svt" value="<?php echo $row['SVT'] ?>" onkeyup="moy()" disabled /></td>
					<td><input type="text" id="anglais" size="5" class="note" name="anglais" value="<?php echo $row['Anglais'] ?>" onkeyup="moy()" disabled /></td>
					<td><input type="text" id="sport" size="5" class="note" name="sport" value="<?php echo $row['Sport'] ?>" onkeyup="moy()" disabled /></td>
				</tr>
				<tr style="background-color: yellow">
					<th>Moyenne</th>
					<td id="moyenne"><?php echo ($row['Maths']+$row['Physique']+$row['Francais']+$row['SVT']+$row['Anglais']+$row['Sport'])/6 ?></td>
				</tr>
				<?php }?>
			</table>
			<p>
			</div>
			<section id="membre">
			<p><input type="submit" value="Sauvegarder" onclick="save(idEleve)" /></p>

			<p><input type="button" value="Annuler" onclick="bulletin(idEleve)" /></p>
			</section>
		</form>
		
		<section id="membre">
			<form method="post" action="../Controleur/deconnexion.php" >
				<p><input type="submit" name="deconnexion" value = "Deconnexion" /></p>
			</form>
			</section>
	<div class="colonne">
            
    </div>
	</div>
    <div class="footer-form">
        <?php include("../Include/footer.php"); ?>
    </div>
		
		<script type="text/javascript">
		document.getElementById('liste').onclick = function(event) {
			$('#search').val(event.target.innerHTML.replace(/(<([^>]+)>)/ig, ""));
			refresh("");
			$('#search').select();
			bulletin(event.target.value);
			idEleve = event.target.value;
			eleveListe = false;
			document.getElementById("pdf").href = "pdf.php?idEleve="+idEleve;
		}
		</script>
		
	</body>
</html>