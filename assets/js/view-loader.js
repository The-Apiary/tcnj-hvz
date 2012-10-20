$.getJSON('assets/php/user-data.php', function(json){
    switch(json.mode) {
    case 'spectator':
	break;
    case 'human':
	break;
    case 'zombie':
	break;
    default:
	load_default_view();	
    }
});  

/* Spectator things
    if(json.mode == 'spectator') {
	$("#banner").addClass("banner-spectator");
	$("#banner h1").text("Humans vs. Zombies");
	$("#banner p").text("HvZ tagline here...");

	var dd =
"<form class='dropdown-menu' action='assets/php/user-login.php'"+
"  role='mode' aria-labelledby='nav-drop' method='post' id='df'>"+
"  <input type='text' placeholder='Email' name='email'>"+
"  <input type='password' placeholder='Password' name='pass'>"+
"  <button type='submin' class='btn btn-primary'>Login</input>"+
	    "</form>";
	$(".navbar .dropdown").append(dd);
    } else {
	var dd =
"<ul class='dropdown-menu' role='menu' aria-labelledby='nav-drop'>"+
"  <li><a tabindex='-1' href='assets/php/user-logout.php'>Logout</a></li>"+
	    "</ul>";
	$(".navbar .dropdown").append(dd);
	$(".navbar .dropdown > a").html(json.email+"<c class='caret'></c>");
    }

    // Zombie things
    if(json.mode == 'zombie') {
	$("#banner").addClass("banner-zombie");
	$("#banner h1").text("Zombie");
	$("#banner p").text("Welcome to the Horde, "+json.username+
			    " Rank: "+json.rank+
			    " Kills: "+json.kills.length+
			    " Time: "+json.etime);
    }
});
*/