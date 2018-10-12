function changerClasse(value) {
	$.post(
		'eleves.php',
		{code : value},
		function(data) {
			$("#formEleve").html("");
			eleves = data.split('/');
			for (i = 0; i < eleves.length; i++) {
				t = eleves[i].split("*");
				$("#formEleve").append($("<option>"+t[1]+"</option>").attr({value : t[0]}));
			}
			t = eleves[0].split("*");
			$("#formEleve").selected = "selected";
			bulletin(t[0]);
		},
		'text'
	);
}