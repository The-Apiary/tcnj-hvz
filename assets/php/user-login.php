<?php

session_start();

$err = array();
if(!isset($_POST['email'], $_POST['pass'])) {
  $err[] = "One of the fields was left blank!";
} else if($_POST['email'] == '' || $_POST['pass'] == '') {
  $err[] = "One of the fields was empty!";
} else {
  $mongo = new Mongo();
  $db = $mongo->hvz;
  $users = $db->users;
  $user = $users->findOne(array('email'=>$_POST['email'],
				'pass'=>sha1($_POST['pass'])));
  
  if($user == null) {
    $err[] = "No match was found!";
  } else {
    $_SESSION['email'] = $_POST['email'];
  }
}

echo json_encode(array('err'=>$err));

?>