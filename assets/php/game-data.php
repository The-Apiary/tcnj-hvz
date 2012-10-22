<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$games = $db->games;

$game = $games->findOne(array("state"=>"alive"));

$arr = array();
if($game==null) {
  $arr['mode'] = 'no-game';
} else if ($game['stime'] > time()) {
  $arr['mode'] = 'pre-game';
} else if ($game['etime'] < time()) {
  $arr['mode'] = 'post-game';
} else {
  $arr['mode'] = 'game';
  $arr['zombies'] = 0;
  foreach($game['players'] as $player) {
    if($player['mode'] == 'zombie') { $arr['zombies']++; }
  }
  $arr['humans'] = count($game['players'])-$arr['zombies'];
  $arr['etime'] = $game['etime'];   
}

echo json_encode($arr);

?>