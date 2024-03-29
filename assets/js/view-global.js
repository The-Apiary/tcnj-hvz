// Load scoreboard (if present)
if($("#score-span").length != 0) {
    $.getJSON('assets/php/global-scores.php', function(json) {
	if(json != null) {
	    $("#score-span #human-count").text("Humans: "+json.humans);
	    $("#score-span #zombie-count").text("Humans: "+json.zombies);
	    $("#score-span #zombie-list").text("");
	    for(var i = 0; i < json.leaders.length; i++) {
		var dat = "<li>"+json.leaders[i].kills.length+
		    " | "+json.leaders[i].username+"</li>";
		$("#score-span #zombie-list").append(dat);
	    }
	}
    });
}

// Load most recent announcement (if present)
if($("#notify-div").length != 0) {
    $.getJSON('assets/php/global-announcement-active.php', function(json) {
	if(json != null) {
	    var ann =
'<div class="alert alert-error">'+
'  <button type="button" class="close" data-dismiss="alert">x</button>'+
'  <h4 class="alert-heading">'+json.head+'</h4>'+
'  <p>'+json.msg+'</p>'+
'</div>';
	    $("#notify-div").html(ann);
	}
    });
}

// Handle quick kill input
$("#quick-kill").click(function() {
    var form = "<h3>BLAH</h3>";
    $(this).html(form);
});