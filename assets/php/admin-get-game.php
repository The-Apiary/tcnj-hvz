<?php

require "admin-auth.php";

$mongo = new Mongo();
$db = $mongo->hvz;
$games = $db->games;
$cursor = $games->find(array('state'=>'alive'));

foreach($cursor as $game) {
  echo json_encode(array('stime'=>$game['stime'],
			 'etime'=>$game['etime']));
}

?>