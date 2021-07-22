<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Cricket Premier League</title>
<link rel="icon" href="image/cpl_logo.jpg" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <header>
    <div><img src="image/cpl_logo.jpg" id="logo">
    <h1>Online Auction</h1></div>
  <div class="navbar">
  <a href="index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Registration
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="player_registeration.php">Player</a>
      <a href="team_registeration.php">Team</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Login
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="login.php">Team</a>
    </div>
  </div>
  <a href="#">Contact Us</a>
</div>
<div id="sidebar">
<div id="mySidepanel" class="sidepanel">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="index.php">Home</a>
  <a href="player_registeration.php">Player Registration</a>
  <a href="team_registeration.php">Team Registration</a>
  <a href="login.php">Team Login</a>
  <a href="#">Contact Us</a>
</div>

<button class="openbtn" onclick="openNav()">☰ </button>
<script>
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
</script>
</div>
</header>


<?php
if ( isset($_SESSION['success']) ) {
  echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
  unset($_SESSION['success']);
}
 ?>
<main>
  <img src="image/game1.jpg" id="game">
<h2>Overview Of Cricket</h2>
<div class="overview"><p>Cricket is a bat-and-ball game played between two teams of eleven
  players on a field at the centre of which is a 22-yard (20-metre) pitch with a wicket
  at each end, each comprising two bails balanced on three stumps. The batting side scores
  runs by striking the ball bowled at the wicket with the bat (and running between the wickets),
  while the bowling and fielding side tries to prevent this (by preventing the ball from leaving
   the field, and getting the ball to either wicket) and dismiss each batter (so they are "out").
   Means of dismissal include being bowled, when the ball hits the stumps and dislodges the bails,
    and by the fielding side either catching the ball after it is hit by the bat and before it
     hits the ground, or hitting a wicket with the ball before a batter can cross the crease in
     front of the wicket. When ten batters have been dismissed, the innings ends and the teams swap roles.
     The game is adjudicated by two umpires, aided by a third umpire and match referee in international
     matches. They communicate with two off-field scorers who record the match's statistical information
  <br>
  <br>
  Forms of cricket range from Twenty20, with each team batting for a single innings of 20 overs,
  to Test matches played over five days. Traditionally cricketers play in all-white kit,
  but in limited overs cricket they wear club or team colours. In addition to the basic kit,
  some players wear protective gear to prevent injury caused by the ball, which is a hard,
  solid spheroid made of compressed leather with a slightly raised sewn seam enclosing a cork core layered with tightly wound string.

</p></div>

<div id="h2">
  <h2 id="h">Overview of Cricket Premier League</h2>
  <div>
    <p>Cricket Premier League is one the biggest T20 leagues played around the world.
      The Cricket Premier League (CPL) is a professional Twenty20 cricket league,
      contested by eight teams based out of eight different Indian cities.
      The CPL is the most-attended cricket league in the world
      Currently, with eight teams, each team plays each other twice in a
      home-and-away round-robin format in the league phase. At the conclusion of the league stage,
       the top four teams will qualify for the playoffs. The top two teams from the league
       phase will play against each other in the first Qualifying match, with the winner going
        straight to the CPL final and the loser getting another chance to qualify for the
        CPL final by playing the second Qualifying match. Meanwhile, the third and fourth place
        teams from league phase play against each other in an eliminator match and the winner from
        that match will play the loser from the first Qualifying match. The winner of the second
        Qualifying match will move onto the final to play the winner of the first Qualifying match
        in the CPL Final match, where the winner will be crowned the Indian Premier League champions.</p>
      </div></div>
      <div id="div">
        <h2>About Online Auction</h2>
          <div>
            <p>
              The CPL auction is a yearly event to auction the cricket players to various franchisees.
              A dedicated auctioneer controls the proceedings of this multi-day event.
              CPL franchises fiercely bid for the listed players. The auction ends with a settled squad for
              every CPL team.

Although the auction process happens for a couple of days, there is a lot that goes on behind the
scenes for months. Teams complete the pre-auction analysis and work on the strategy to be employed during
the auction. The remaining budget, the type of player needed, players’ international commitment, injuryhistory,
 his equation with the coach, everything matters when a franchise decides to bid for a player.</p></div></div>
</main>
<div class='footer'>
  <p>Designed and Developed for Cricket League Auction &copy 2021 Harsh Gautam</p>
</div>

</body>
</html>
