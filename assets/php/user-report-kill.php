<?php

require "user-auth.php";

$err = array();
if(!isset($_POST['code'],$_POST['place'])) {
  $err[] = "Woah, did you forget to fill something out?";
} else if($_SESSION['mode'] != 'zombie') {
  $err[] = "Hold on a tic - you're not a zombie!  No can do!";
} else if(zombie_check($_SESSION['code'])) {
  $err[] = "Either no game or no zombie.";
}
if(count($err)!=0) die(json_encode(array('err'=>$err)));



?>