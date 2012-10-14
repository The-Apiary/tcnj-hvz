$.getJSON("assets/php/getscores.php", function(json) {
    if(json == undefined){return;}
    else {
	$("#zombie-count").html("Zombies: "+json.zombies);
	$("#human-count").html("Humans: "+json.humans);
	
	if(json.leaders.length > 0) {
	    $("#zombie-list").html("");
	} else {
	    $("#zombie-list").html("<p>No zombies have been revealed!</p>");
	}
	
	for(var i = 0; i < json.leaders.length; i++) {
	    var str = "<li>" + json.leaders[i].username + " "
                + json.leaders[i].kills.length + " "
                + json.leaders[i].etime + "</li>";
	    $("#zombie-list").append(str);
	}
    }
});
