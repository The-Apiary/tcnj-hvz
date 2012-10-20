<?php

require "user-auth.php";

$err = array();
if(!isset($_POST['pass'], $_POST['uname'])) {
  $err[] = "A field was left empty.";
} else if(!valid_credentials($_POST['pass'],$_SESSION['email'])) {
  $err[] = "Password was incorrect.";
} else if(!username_available($_POST['uname'])) {
  $err[] = "Sorry, that username appears to be taken.";
}
if(count($err) != 0) die(json_encode(array('err'=>$err)));

$s = $users->update(array("email"=>$_SESSION['email'],
			  "pass"=>sha1($_POST['pass'])),
		    array('$set'=>array('username'=>$_POST['uname'])));
if(!$s) {
  $errr[] = "Oops, something went wrong on our end!  Try again later.";
}

echo json_encode(array('err'=>$err));

?>