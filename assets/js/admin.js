var status_class = {
  "wait":"info",
  "human":"success",
  "alpha":"warning",
  "zombie":"warning",
  "kicked":"error",
};

// handle input
$("body").click(function() {
    $(".player-dropdown").remove();
});

$(".dd").click(function() {
    var id = $(this).parent().attr("id").substr(7);
    console.log(id);
});

$("#players-btn").click(function() {
  $.getJSON("assets/php/players.php", function(json) {
    if(json.length > 0) {
      $("#players-tab p").hide();
    }else{
      $("#players-tab p").unhide();
    }
    var table =
"<table class=table>"+
"  <thead>"+
"    <tr>"+
"      <th>ID</th>"+
"      <th>Username</th>"+
"      <th>Name</th>"+
"      <th>Email</th>"+
"      <th>Expire Time</th>"+
"      <th>K/W</th>"+
"    </tr>"+
"  </thead>"+
"<tbody>";
    for(var i=0; i<json.length; i++) {
      var str = 
"<tr class="+status_class[json[i].status]+" id=player-"+json[i].id+">"+
"  <td>"+json[i].id+"</td>"+
"  <td>"+json[i].username+"</td>"+
"  <td>"+json[i].first+" "+json[i].last+"</td>"+
"  <td>"+json[i].email+"</td>"+
"  <td>"+json[i].etime+"</td>"+
"  <td>"+
"    <span class='badge'>"+json[i].kills.length+"</span>"+
"    <span class='badge badge-inverse'>"+json[i].warnings.length+"</span>"+
"  </td>"+
"  <td class='dd'><i class='icon-chevron-down'></i></td>"+
"</tr>";
      table += str;
    }
    table += "</tbody></table>";
    $("#player-table").html(table);
  });
});