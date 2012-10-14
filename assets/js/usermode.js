// On page load...
$.getJSON('assets/php/usermode.php', function(json) {
    // Change to switch statement...
    if(json.mode == 'default'){ setDefaultMode(); }
    if(json.mode == 'human'){ setHumanMode(); }
    if(json.mode == 'alpha'){ setAlphaMode(); }
    if(json.mode == 'zombie'){ setZombieMode(json.email); }
    if(json.mode == 'wait'){ setZombieMode(); }
    if(json.mode == 'kicked'){ setKickedMode(); }

    // Input handlers here...
});


// Function defs...
var setHumanMode = function() {

}

var setZombieMode = function(email) {
    $("#banner").addClass("banner-zombie");
    $("#banner h1").text("Greetings ZOMBIE");
    $("#banner p").text("Welcome to the undead...");

    var dd = 
"<ul class='dropdown-menu' role='menu' aria-labelledby='nav-drop'>"+
"  <li><a tabindex='-1' href='assets/php/logout.php'>Logout</a></li>"+
"</ul>";
    $(".navbar .dropdown").append(dd);
    $(".navbar .dropdown > a").html(email+"<c class='caret'></c>");

}

var setAlphaMode = function() {
}

var setWaitMode = function() {
}

var setKickedMode = function() {
}

var setDefaultMode = function() {
    $("#banner").addClass("banner");
    $("#banner h1").text("Humans vs. Zombies");
    $("#banner p").text("HvZ tagline here...");

    var dd = 
"<form class='dropdown-menu' action='assets/php/login.php'"+
"  role='mode' aria-labelledby='nav-drop' method='post' id='df'>"+
"  <input type='text' placeholder='Email' name='email'>"+
"  <input type='password' placeholder='Password' name='pass'>"+
"  <button type='submin' class='btn btn-primary'>Login</input>"+
"</form>";
    $(".navbar .dropdown").append(dd);
}