<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$players = $db->players;

$cursor = $players->find()->limit(25);
$cursor->sort(array('kills'=>-1));

$arr = array();

foreach($cursor as $doc) {
  $arr[] = array(
    "username"=>$doc['username'],
    "kills"=>$doc['kills'],
    "etime"=>$doc['etime']
  );
}

echo json_encode($arr);

?>