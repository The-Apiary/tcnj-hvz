$("#score-link").click(function() {
    $.getJSON("assets/php/getscores.php", function(json) {
	if(json.length > 0) {$("#zombie-list").html("");}
	else {$("#zombie-list").html("<p>No zombies have been revealed!</p>");}

	for(var i = 0; i < json.length; i++) {
	    var str = "<li>" + json[i].username + " "
	                     + json[i].kills + " "
	                     + json[i].etime + "</li>";
	    $("#zombie-list").append(str);
	}
    });
});