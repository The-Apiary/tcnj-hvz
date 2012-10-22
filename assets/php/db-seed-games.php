<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$users = $db->users;
$games = $db->games;

$chars = str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");

$ids = array();
$cursor = $users->find()->limit(10);
foreach($cursor as $user) {
  $ids[] = $user['_id'];
}

// build the player list
$p = array();
$i = 0;
foreach($ids as $id) {
  if(rand(0,1)==0) { // human
    $p[] = array('_id'=>$id,
		 'code'=>substr($chars,$i,8),
		 'mode'=>'human',
		 'etime'=>-1,
		 'rkills'=>0);
  } else { // zombie
    $p[] = array('_id'=>$id,
		 'code'=>substr($chars,$i,8),
		 'mode'=>'zombie',
		 'etime'=>12345678,
		 'rkills'=>0);
  }
  $i++;
}

$doc = array('state'=>'alive',
	     'stime'=>time()-3600,
	     'etime'=>time()+3600,
	     'players'=>$p,
	     'kills'=>array());

$games->remove(array());
$games->insert($doc);

echo "SUPERWAVEMAN";

?>