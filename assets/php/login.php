<?php

session_start();
if(isset($_SESSION['id'], $_SESSION['email'], $_SESSION['mode'])) {
  header("Location: ../../index.php");
  die();
}

if(!isset($_POST['email'], $_POST['pass'])) {
  die("SEACUCUMBER");
}

$_POST['email']=htmlentities($_POST['email']);

$mongo = new Mongo();
$db = $mongo->hvz;
$players = $db->players;
$player = $players->findOne(array(
  'email'=>$_POST['email'],
  'password'=>sha1($_POST['pass'])
));

if(count($player)>0) {
  $_SESSION['mode'] = $player['status'];
  $_SESSION['id'] = $player['id'];
  $_SESSION['email'] = $_POST['email'];
}

header("Location: ../../index.php");

?>