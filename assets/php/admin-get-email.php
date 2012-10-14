<?php

require "admin-auth.php";

if(!isset($_GET["a"])) die("SEACUCUMBER");

$mongo = new Mongo();
$db = $mongo->hvz;
$players = $db->players;

switch($_GET["a"]) {
case "all":
  $cursor = $players->find();
  break;
case "human":
  $cursor = $players->find(array("status"=>"human"));
  break;
case "alpha":
  $cursor = $players->find(array("status"=>"alpha"));
  break;
case "zombie":
  $cursor = $players->find(array("status"=>array('$in'=>array("zombie","alpha"))));
  break;
case "wait":
  $cursor = $players->find(array("status"=>"wait"));
  break;
case "kicked":
  $cursor = $players->find(array("status"=>"kicked"));
  break;
default:
  die("SEACUCUMBER");
}

foreach($cursor as $doc) {
  echo $doc["email"]."<br>";
}

?>