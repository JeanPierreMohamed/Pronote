function moy() {
	notes = document.getElementsByClassName("note");
	moyenne = 0;
	for ( i = 0; i < notes.length; i++) {
		if (notes[i].value > 20 || notes[i].value < 0) {
			notes[i].value = '0';
		}
		moyenne += coef(notes[i].name)*notes[i].value;
		$("#"+notes[i].name).attr({value : notes[i].value});
	}
	moyenne /= 6;
	document.getElementById("moyenne").innerHTML = moyenne.toFixed(2);
}

function coef(value) {
	return 	(value == "maths" ? 1 : 
		(value == "physique" ? 1 : 
		(value == "francais" ? 1 : 
		(value == "svt" ? 1 : 
		(value == "anglais" ? 1 : 
		(value == "sport" ? 1 : 0))))));
}