<?php

$mongo = new Mongo();
$db = $mongo->hvz;
$announcements = $db->announcements;

$announcements->remove(array());

$head = array('Caution: Rogue Millitant','Free Sock Weapons','Another Alpha');
$msgs = array('You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don\'t know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I\'m breaking now. We said we\'d say it was the snow that killed the other two, but it wasn\'t. Nature is lethal but it doesn\'t hold a candle to man.',
	      'Now that we know who you are, I know who I am. I\'m not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain\'s going to be? He\'s the exact opposite of the hero. And most times they\'re friends, like you and me! I should\'ve known way back when... You know why, David? Because of the kids. They called me Mr Glass.',
	      'Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I\'m in a transitional period so I don\'t wanna kill you, I wanna help you. But I can\'t give you this case, it don\'t belong to me. Besides, I\'ve already been through too much shit this morning over this case to hand it over to your dumb ass.');

for($i = rand(1,4); $i > 0; $i--) {
  $arr = array('time'=> (time() - ($i+4)*60*60),
	       'msg'=>$msgs[rand(0,2)],
	       'head'=>$head[rand(0,2)]);
  $announcements->insert($arr);
}

echo "SUPERWAVEMAN";

?>