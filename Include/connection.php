<?php require 'connection/index.php'

<section id="membre">
    <div id="connection">
            <form class="formConnection" action="index.php" method="POST">

		<label for="pseudo">Pseudo : </label>
		<input type="text" name="pseudo"/>

		<label for="password">Password : </label>
		<input type="password" name="password"/>

		<input type="submit" value="Se connecter"/><input type="button" value="S'inscrire" onclick="window.open('connection/register.php', 'exemple', 'height=600, width=800, top=90, left=350, toolbar=no, menubar=no, location=yes, resizable=yes, scrollbars=yes, status=no');">
		<div class="error"><?php if(isset($error_actif)){ echo $error_actif;} ?></div>
		<div class="error"><?php if(isset($error_unknown)){ echo $error_unknown;} ?></div>

		</form>

    </div>
</section>

?>