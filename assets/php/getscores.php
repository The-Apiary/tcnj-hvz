<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$players = $db->players;

$h = $players->find(array("status"=>"human"))->count();
$z = $players->find(array(
  "status"=>array(
    '$in'=>array('alpha','zombie'))))->count();

$js = "function() {
  return this.status == 'zombie' ||
         (this.status == 'alpha' && this.kills.length > 3);
}";

$cursor = $players->find(array('$where'=>$js))->limit(25)->sort(array('kills'=>-1));

$arr = array(
  'humans'=>$h,
  'zombies'=>$z
);

$l = array();
foreach($cursor as $doc) {
  $l[] = array(
    "username"=>$doc['username'],
    "kills"=>$doc['kills'],
    "status"=>$doc['status'],
    "etime"=>$doc['etime']
  );
}

$arr['leaders'] = $l;

echo json_encode($arr);

?>