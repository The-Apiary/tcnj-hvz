<?php

session_start();

if(!isset($_SESSION['email'], $_SESSION['mode'])) {
  die(json_encode(array('err'=>array('Not in session.'))));
}

$mongo = new Mongo();
$db = $mongo->hvz;
$users = $hvz->users;
$games = $hvz->games;

function valid_credentials($pass, $email) {
  global $users;
  $user = $users->findOne(array('pass'=>sha1($pass),
				'email'=>$email));
  if($user==null) return false;
  return true;
}

function zombie_check($code) {
  global $games;
  $game = $games->findOne(array('state'=>'alive'));

  if($game == null) return true;
 
  for($game['players'] as $player) {
    if($player['code'] == $code) {
      if($player['mode'] == 'zombie') { return true; }
      else { return false; }
    }
  }

  return true;

?>