<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$players = $db->players;

$players->remove(array());

$fname = array("Pinkie","Twilight","Apple","Flutter","Mack","Spike");
$lname = array("Pie","Sparkle","Jack","Shy","Intosh","Narwhal");
$alpha = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$status = array("wait","human","zombie","alpha","kicked");

for($i = 0; $i < 50; $i++) {
  $f = $fname[rand(0,5)];
  $l = $lname[rand(0,5)];
  $u = $f.".".$l;
  $e = $u."@gmail.com";
  $c = "";
  $s = $status[rand(0,4)];
  for($j = 0; $j < 8; $j++) {
    $c.= $alpha[rand(0,61)];
  } 
  $doc = array(
    "id"=>$c,
    "email"=>$e,
    "status"=>$s,
    "password"=>$c,
    "first"=>$f,
    "last"=>$l,
    "username"=>$u,
    "lmessage"=>0,
    "etime"=>"n/a",
    "score"=>0,
    "kills"=>array(),
    "warnings"=>array()
  );

  $players->insert($doc);
}

echo "SuperWaveMan";

?>