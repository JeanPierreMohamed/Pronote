	<?php 
	session_start();	
	echo 'Bonjour Mr/Mme ',$_SESSION['nom'] , " ",
		$_SESSION['prenom'], '<br />
		Votre adresse est : ',$_SESSION['address'], '<br />',
		'Vous pouvez maintenant realiser votre commande sur le site BuyAGoat.fr ','<br />',
		'Cliquez sur le bouton ci-dessous pour commencer vos achats','<br />','<br />','<br />';
	?>