<?php

require "user-auth.php";

$err = array();
if(!isset($_POST['pass'], $_POST['npass1'], $_POST['npass2'])) {
  $err[] = "A field was left blank.";
} else if($_POST['npass1'] != $_POST['npass2']) {
  $err[] = "New passwords do not match.";
} else if(!valid_credentials($_POST['pass'],$_SESSION['email'])) {
  $err[] = "The password you entered was incorrect.";
}

if(count($err) != 0) die(json_encode(array('err'=>$err)));

$users->update(array("email"=>$_SESSION['email'],
		     "pass"=>sha1($_POST['pass'])),
	       array('$set'=>array('pass'=>sha1($_POST['npass1']))));

echo json_encode(array('err'=>$err));

?>