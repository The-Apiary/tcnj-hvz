$.getJSON("assets/php/notify.php", function(json) {
    if(json.txt == undefined) {return;}

    var str = '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">x</button><h4 class="alert-heading">Important!</h4><p>' + json.txt  + '</p></div>';
    $("#notify-div").append(str);
});