<?php
	include_once 'cnx.php'
	if(isset($_GET['motclef'])){
		$motclef = $_GET['motclef'];
		$q = array('motclef'=>$motclef.'%');
		$sql = 'SELECT Nom, Prenom FROM Eleve WHERE Nom like :motclef or Nom like :motclef';
		$req->execute($q);
		$count = $req->rowCount($sql);
		
		if($count == 1)){
			while($result = $req->fetch(PDO::FETCH_OBJ){
				echo result->Prenom." ".$result->Nom;
			}
		}else{
			echo "Aucun resultat pour :".$motclef;
		}
	}	

?>