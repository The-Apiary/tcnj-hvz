// Query server for current game
var mode = 'game';

switch(mode){
// pre-zombocalypse subheader
case 'pregame':
    break;

// active zombocalpyse subheader
case 'game': 
    $("div.canvas-overlay > h1").text("OUTBREAK");
    $("div.canvas-overlay > p").html("INFECTED <span>023 | 043</span> SURVIVORS");
    break;

// post-zombocalpyse subheader
case 'postgame':
    break;

// no-zombocalypse subheader
default:
    $("div.canvas-overlay > h1").text("HUMANS vs. ZOMBIES");
    $("div.canvas-overlay > p").text("HvZ tagline here...");
}