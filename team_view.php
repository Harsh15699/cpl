<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="image/cpl_logo.jpg" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="team_view.css?version=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .nav{
    background-color: blue;
    border:2px solid #000000;
    border-radius: 5px;
  }
  </style>
<title>Team Dashboard</title>
</head>
<body>
  <header>
    <div><img src="image/cpl_logo.jpg" id="logo">
    <h1 id="h1">Online Auction</h1></div>
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
  <a class="nav" href="auction.php">Player Auction</a>
    <a  href="logout.php">Logout</a>
</div>
<div id="sidebar">
<div id="mySidepanel" class="sidepanel">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="index.php">Home</a>
  <a href="player_registeration.php">Player Registration</a>
  <a href="team_registeration.php">Team Registration</a>
  <a href="login.php">Team Login</a>
  <a href="#">Contact Us</a>
  <a class="nav" href="auction.php">Player Auction</a>
    <a  href="logout.php">Logout</a>
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
if (!isset($_SESSION['t_name']) ) {
  die('Not logged in');
}
else{
  echo "<h2 id="."h2".">Team Dashboard of ";
  echo htmlentities($_SESSION['t_name']);
  echo "</h2>\n";

}
echo "<h2 id="."h".">"."<u>";
echo htmlentities($_SESSION['t_name'])."'s"." Squad";

echo "</u></h2>\n";
if(isset($_SESSION['t_id'])){
    $j=$_SESSION['t_id'];}
$stmt = $pdo->prepare('SELECT p_name,p_age,p_country,skill,nationality ,sold_price FROM player
  WHERE  t_id=:t');
  $stmt->execute(array( ':t' =>$j));
  $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($stmt->rowCount()>0){
echo"<table>";
$c=0;
foreach ( $row as $rows ) {
    if($c%5==0){
      echo"<tr>";}
    echo "<td>";
    echo("<b>Name:-</b>"."<b>".htmlentities($rows['p_name'])."</b>");
    echo"<br><br>";
    echo("<spam><b>Age:-</b>"."<b>".htmlentities($rows['p_age'])."</b></spam>");
    echo"<br><br>";
    echo("<b>Country:-</b>"."<b>".htmlentities($rows['p_country'])."</b>");
    echo"<br><br>";
    echo("<spam><b>Nationality:-</b>"."<b>".htmlentities($rows['nationality'])."</b></spam>");
    echo"<br><br>";
    echo("<b>Skill-Set:-</b>"."<b>".htmlentities($rows['skill'])."</b>");
    echo"<br><br>";
    echo("<spam><b>Sold Price:-</b>"."<b>".htmlentities($rows['sold_price'])."</b></spam>");
    echo("</td>");
    $c++;
    if($c%5==0){
      echo"</tr>";}
  }
    echo "</table>";
}
else {
  echo("No Player yet :-GO FOR PLAYER AUCTION"."<br><br>");
}
if($stmt->rowCount()<5){
  echo"<style> table{all:unset; border-spacing: 10px;}  td{
    width:180px;
  }</style>";
}
 ?>
 <div class='footer'>
   <p>This site is under development.Stay Tuned for more updates</p>
 </div>
</body>
</html>
