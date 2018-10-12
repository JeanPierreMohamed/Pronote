function bulletin(value) {
	eleveListe = true;
	idEleve = value;
	$.post(
		'getInfos.php',
		{id : value},
		function(data) {
			infos = data.split('/');
			moyenne = 0;
			for (i = 0; i < infos.length; i++) {
				t = infos[i].split("*");
				moyenne += coef(t[0].toLowerCase())*t[1];
				$("#"+t[0].toLowerCase()).val(t[1]);
			}
			moyenne /= 6;
			$("#moyenne").html(moyenne.toFixed(2));
			modifierNotes();modifierNotes();
		},
		'text'
	)
}