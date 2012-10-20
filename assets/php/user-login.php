<?php

if(isset($_POST['email'], $_POST['pass'])) {
  $mongo = new Mongo();
  $db = $mongo->hvz;
  $users = $db->users;
  $user = $users->findOne(array('email'=>$_POST['email'],
				'password'=>sha1($_POST['pass'])));

  if($user != null) {
    $_SESSION['email'] = $_POST['email'];
  }
}

?>