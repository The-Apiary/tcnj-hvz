<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$users = $db->users;

// Clear database...
$users->remove(array());

// Field seeds...
$fname = array("Pinkie","Twilight","Apple","Flutter","Mack","Spike","Rainbow");
$lname = array("Pie","Sparkle","Jack","Shy","Intosh","Narwhal","Dash");
$alpha = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

for($i = 0; $i < 25; $i++) {
  // static account info
  $f = $fname[array_rand($fname)];
  $l = $lname[array_rand($lname)];
  $u = $f.$l.rand(1,99);
  $e = $u."@gmail.com";
  $p = sha1($u);

  // legacy information
  $ltk = rand(0,50); // total kills
  $ltr = rand(0,5);  // total rounds played
  $lrd = 12345678;   // registration date

  // achievements
  $a = array();
  for($j = rand(0,10); $j > 0; $j--) {
    $a[] = array('id'=>rand(0,50),
		 'num'=>rand(1,5),
		 'time'=>12345678);
  }

  // build doc
  $doc = array('fname'=>$f,
	       'lname'=>$l,
	       'uname'=>$u,
	       'email'=>$e,
	       'pass'=>$p,

	       'legacy_kills'=>$ltk,
	       'legacy_rounds'=>$ltr,
	       'create_time'=>$lrd,

	       'ach'=>$a);

  $users->insert($doc);
}

echo "SuperWaveMan";

?>