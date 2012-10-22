// Query server for current game
$.getJSON('assets/php/game-data.php', function(json) {
    switch(json.mode){
	// pre-zombocalypse subheader
    case 'pre-game':
	$("div.canvas-overlay > h1").text("BEWARE THE ZOMBOCALYPSE!");
	$("div.canvas-overlay > p").html("The crazy begins in <span>CLOCK</span>");
	break;

	// active zombocalpyse subheader
    case "game": 
	$("div.canvas-overlay > h1").text("OUTBREAK");
	$("div.canvas-overlay > p").html("INFECTED <span>"+json.zombies+" | "+json.humans+"</span> SURVIVORS");
	break;

	// post-zombocalpyse subheader
    case 'post-game':
	$("div.canvas-overlay > h1").text("GAME OVER");
	$("div.canvas-overlay > p").html("And here's some funny text about how badly the humans were slaughtered...");
	break;

	// no-zombocalypse subheader
    default:
	$("div.canvas-overlay > h1").text("HUMANS vs. ZOMBIES");
	$("div.canvas-overlay > p").text("HvZ tagline here...");
    }    
});

