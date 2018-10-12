function refresh(val) {
	$.post(
		'autocomplete.php',
		{value : val},
		function(data) {
			$("#liste").html("");
			res = data.split("_");
			if (res.length >= 1 && res[0] != "") {
				for (i = 0; i < res.length; i++) {
					t = res[i].split("*");
					$("#liste").html($("#liste").html() + "<li value=\""+t[0]+"\">"+t[1]+"</li>");
				}
			}
		},
		'text'
	);
}