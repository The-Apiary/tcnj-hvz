<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$notifications = $db->notifications;

$time = time()-(12*60*60);

$cursor = $notifications->find();
//array("time"=>array("$gt"=>$time)));

$cursor->sort(array("time"=>-1))->limit(1);

foreach($cursor as $doc) {
  echo json_encode($doc);
}

?>