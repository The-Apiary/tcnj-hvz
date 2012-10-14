<?php

session_start();
$lin = isset($_SESSION['id'], $_SESSION['email'], $_SESSION['mode']);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Humans vs Zombies @ TCNJ</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
	<ul class="nav">
	  <li class="active"><a href="#welcome-tab" data-toggle="tab" class="brand">HvZ@TCNJ</a></li>
	  <li><a id="score-link" href="#score-tab" data-toggle="tab">Scoreboard</a></li>
	  <li><a href="#map-tab" data-toggle="tab">Campus Map</a></li>
<?php if($lin) {?>
	  <li><a href="#profile-tab" data-toggle="tab">My Profile</a></li>
<?php }?>
	</ul>
	<ul class="nav pull-right">
	  <li class="dropdown">
<?php if(!$lin) {?>
	    <a href="#" id="login-drop" role="button" class="dropdown-toggle" data-toggle="dropdown">Login<span class="caret"></span></a>
	    <form action="assets/php/login.php" method="post" class="dropdown-menu" role="menu" aria-labelledby="login-drop">
	      <input type="text" class="input" placeholder="Email" name="email">
	      <input type="password" class="input" placeholder="Password" name="pass">
	      <button type="submit" class="btn btn-primary">Login</button>
	    </form>
<?php }else{?>
            <a href="#" id="logout-drop" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['email'];?><span class="caret"></span></a>
	    <ul class="dropdown-menu" role="menu" aria-labelledby="logout-drop">
              <li><a href="assets/php/logout.php">Logout</a></li>
            </ul>
<?php }?>
	  </li>
	</ul>
      </div>
    </div>
    <div id="notify-div"></div>
    <div class="tabbable">
      <div class="tab-content">
	<div class="tab-pane active" id="welcome-tab">
	  This is a description of what Manhunt is and what HvZ is.  You could have a link to the rules page here.  In fact, that sounds like a fabululous page.  There should definately be one of those!
	</div>
	<div class="tab-pane" id="score-tab">
	  <div class="span4">
	    <h3>Zombie Leader Board</h3>
	    <span id="zombie-count-active"></span>
	    <span id="zombie-count-starved"></span>
	    <span id="human-count"></span>
	    <ol id="zombie-list"><p>No zombies have been revealed!</p></ol>
	  </div>
	  <div class="span4">
n	    <h3>HvZ@TCNJ Twitter Feed</h3>
	    <a class="twitter-timeline" href="https://twitter.com/TCNJ" data-widget-id="256840155980234752">Tweets by @TCNJ</a>
	    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	  </div>
	</div>
	<div class="tab-pane" id="map-tab">
	  map
	</div>
<?php if($lin) {?>
	<div class="tab-pane" id="profile-tab">
          <div class="row">
            <ul class="thumbnails">
              <li class="span3">
	        <div id="add-kill" class="thumbnail">
	          <img src="http://placehold.it/200x200">
	          <h3><a>Add Kill...</a></h3>
	        </div>
              </li>
	      <li class="span3">
		<div id="zombify-self" class="thumbnail">
		  <img src="http://placehold.it/200x200">
		  <h3><a>Zombify Self...</a></h3>
		</div>
	      </li>
	      <li class="span3">
		<div id="mod-ticket" class="thumbnail">
		  <img src="http://placehold.it/200x200">
		  <h3><a>Call a Mod</a></h3>
		</div>
	      </li>
            </ul>
          </div>
	</div>
<?php }?>
      </div>
      <footer class="pagination-centered">
	Author | Nicholas Vitovitch
      </footer>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/scores.js"></script>
    <script src="assets/js/notifications.js"></script>
  </body>
</html>
