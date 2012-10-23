function countDown(time) {
    var u = time - Math.round((new Date()).getTime() / 1000);
    var s = Math.floor(u % 60);
    var m = Math.floor((u / 60) % 60);
    var h = Math.floor(u / 60 / 60);
    //var d = Math.floor(u / 24 / 60 / 60);
    
    if(u > 0) {
	var std = '<td>'+s+'</td>';
	var mtd = '<td>'+m+'</td>';
	var htd = '<td>'+h+'</td>';
	$("#countdown .table-times").html(htd+mtd+std);
	setTimeout(function() {countDown(time)}, 500);
    } else {
	location.reload();
    }
}

// Query server for current game
$.getJSON('assets/php/game-data.php', function(json) {
    switch(json.mode){
	// pre-zombocalypse subheader
    case 'pre-game':
	$("div.canvas-overlay > h1").text("BEWARE THE ZOMBOCALYPSE!");
	$("div.canvas-overlay > p").html("The crazy begins in...");
	countDown(json.stime);
	break;

	// active zombocalpyse subheader
    case "game": 
	$("div.canvas-overlay > h1").text("OUTBREAK");
	$("div.canvas-overlay > p").html("INFECTED <span>"+json.zombies+" | "+json.humans+"</span> SURVIVORS");
	countDown(json.etime);
	break;

	// post-zombocalpyse subheader
    case 'post-game':
	$("div.canvas-overlay > h1").text("GAME OVER");
	$("div.canvas-overlay > p").html("And here's some funny text about how badly the humans were slaughtered...");
	$("div.canvas-overlay div#countdown").hide();
	break;

	// no-zombocalypse subheader
    default:
	$("div.canvas-overlay > h1").text("HUMANS vs. ZOMBIES");
	$("div.canvas-overlay > p").text("HvZ tagline here...");
	$("div.canvas-overlay div#countdown").hide();
    }    
});

