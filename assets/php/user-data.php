<?php

session_start();

$arr = array();
if(isset($_SESSION['email'])) {
  $mongo = new Mongo();
  $db = $mongo->hvz;
  $games = $db->games;
  $users = $db->users;
  $user = $users->findOne(array('email'=>$_SESSION['email']));
  
  // If user exists, retrieve information.  Essentialally an SQL join.
  if($user != null) {
    $arr = $user;
    $js = "function() { if(this.state != 'alive') { return false; } else { for(var i = 0; i < this.players.length; i++) { if(this.players[i]._id == '".$user['_id']."') { return true; }}} return false; }"; 
    $game = $games->findOne(array('$where'=>$js));
    if($game != null) {
      foreach($game['players'] as $player) {
	if($player['_id'] == $user['_id']) {
	  $arr = array_merge($arr,$player);
	  break;
	}
      }
    }
    unset($arr['_id'],$arr['pass'],$arr['ach']);
    die(json_encode($arr));
  }
}
						
$arr['mode'] = 'spectator';
echo json_encode($arr); 

?>