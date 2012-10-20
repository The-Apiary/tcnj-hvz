<?php

require "user-auth.php";

// If no session info, return spectator mode
if($_SESSION['mode'] == 'default'){
 echo json_encode(array('mode'=>'default'));
 die();
}

$mongo = new Mongo();
$db = $mongo->hvz;
$players = $db->players;

$player = $players->findOne(array("id"=>$_SESSION['id']));

// If no matching player, return spectator mode
if(count($player) == 0) {
  echo json_encode(array('mode'=>'default'));
  die();
}

// These fields are common to all player modes
$arr = array("mode"=>$player['mode'],
	     "username"=>$player['username'],
	     "email"=>$player['email'],
	     "messages"=>$player['messages'],
	     "achievements"=>$player['achievements']);

// zombie/alpha specific
if($player['mode'] == 'zombie' || $player['mode'] == 'alpha') {
  $arr['etime'] = $player['etime'];
  $arr['kills'] = $player['kills'];

  $fa = array('mode'=>array('$in'=>array('zombie','alpha')));
  $sa = array('rkills'=>-1);
  $r = 1;
  $cursor = $players->find($fa)->sort($sa);
  foreach($cursor as $doc) {
    if($doc['id'] == $_SESSION['id']) {
      break;
    } else {
      $r++;
    }
  }
  // This code broke :(
  //for($cursor = $players->find($fa)->sort($sa); $cursor->hasNext()) {
  //  $p = $cursor->getNext();
  //  if($p['id'] == $_SESSION['id']) {break;}else{$r++;}
  //}

  $arr['rank'] = $r;
}

echo json_encode($arr);

?>