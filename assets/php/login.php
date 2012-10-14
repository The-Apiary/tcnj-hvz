<?php

session_start();

if(isset($_POST['email'], $_POST['pass'])) {
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
  } else {
    $_SESSION['id'] = -1;
    $_SESSION['email'] = 'Login';
    $_SESSION['mode'] = 'default';
  }
} else {
  $_SESSION['id'] = -1;
  $_SESSION['email'] = 'Login';
  $_SESSION['mode'] = 'default';
}

header('Location: ../../');

?>