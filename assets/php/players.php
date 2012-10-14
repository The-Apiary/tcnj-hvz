<?php

require "admin-auth.php";

$mongo = new Mongo();
$db = $mongo->hvz;
$players = $db->players;

$cursor = $players->find()->sort(array("status"=>-1));

$arr = array();
foreach($cursor as $player) {
  $arr[] = array(
    "username"=>$player['username'],
    "first"=>$player['first'],
    "last"=>$player['last'],
    "email"=>$player['email'],
    "etime"=>$player['etime'],
    "id"=>$player['id'],
    "status"=>$player['status'],
    "score"=>count($player['kills']),
    "kills"=>$player['kills'],
    "warnings"=>$player['warnings']
  );
}

echo json_encode($arr);

?>