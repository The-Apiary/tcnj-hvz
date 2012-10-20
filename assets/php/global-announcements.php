<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$announcements = $db->announcements;

$cursor = $announcements->find()->sort(array("time"=>-1));

$arr = array();
foreach($cursor as $doc) {
  $arr[] = $doc;
}

echo json_encode($arr);

?>