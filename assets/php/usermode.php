<?php

session_start();

if(!isset($_SESSION['id'], $_SESSION['email'], $_SESSION['mode'])) {
  $_SESSION['id'] = -1;
  $_SESSION['email'] = 'Login';
  $_SESSION['mode'] = 'default';
}

echo json_encode(array(
  'id'=>$_SESSION['id'],
  'email'=>$_SESSION['email'],
  'mode'=>$_SESSION['mode']
));

?>