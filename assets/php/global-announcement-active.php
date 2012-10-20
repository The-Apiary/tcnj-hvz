<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$announcements = $db->announcements;

$time = time()-(6*60*60);

$cursor = $announcements->find(array('time'=>array('$gt'=>$time)));
$cursor->sort(array("time"=>-1))->limit(1);

foreach($cursor as $doc) {
  echo json_encode($doc);
}

?>