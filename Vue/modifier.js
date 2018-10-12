function modifierNotes() {
	notes = document.getElementsByClassName("note");
	if ($('#afficheModif').html() == 'Modification') {
		$('#boutonModif').val("Modifier les notes");
		$('#afficheModif').html('');
		for (i = 0; i < notes.length; i++) {
			notes[i].disabled = "disabled";
		}
	} else {
		$('#boutonModif').val("Arrêter l'édition des notes");
		$('#afficheModif').html('Modification');
		for (i = 0; i < notes.length; i++) {
			notes[i].disabled = "";
		}
	}
}