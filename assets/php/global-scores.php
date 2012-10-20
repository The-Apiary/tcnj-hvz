<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$players = $db->players;

$h = $players->find(array("mode"=>"human"))->count();
$z = $players->find(array(
  "mode"=>array(
    '$in'=>array('alpha','zombie'))))->count();

$js = "function() {
  return this.mode == 'zombie' ||
         (this.mode == 'alpha' && this.rkills > 3);
}";

$cursor = $players->find(array('$where'=>$js))->limit(25)->sort(array('rkills'=>-1));

$arr = array(
  'humans'=>$h,
  'zombies'=>$z
);

$l = array();
foreach($cursor as $doc) {
  $l[] = array(
    "username"=>$doc['username'],
    "kills"=>$doc['kills']
  );
}

$arr['leaders'] = $l;

echo json_encode($arr);

?>