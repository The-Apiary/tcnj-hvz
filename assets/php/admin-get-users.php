<?php

require "admin-auth.php";

$mongo = new Mongo();
$db = $mongo->hvz;
$users = $db->users;

$cursor = $users->find();

$arr = array();
foreach($cursor as $user) {
  $arr[] = array('fname'=>$user['fname'],
		 'lname'=>$user['lname'],
		 'uname'=>$user['uname'],
		 'email'=>$user['email']);
}

echo json_encode($arr);

?>