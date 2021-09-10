<?php // Do not put any HTML above this line
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
if (!isset($_SESSION['t_name']) ) {
  die('Not logged in');
}
//Password
//CPL@harshgautam15
else{
    $j=$_SESSION['t_id'];}
$stmt = $pdo->prepare('SELECT p_id,p_name,nationality,skill,base_price,bidding_t_id,bidding_price FROM player
WHERE  sold=:p');
$stmt->execute(array( ':p' =>"No"));
$row = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="image/cpl_logo.jpg" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="auction.css?version=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Player Auction</title>
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
  <a href="team_view.php">View Your Team</a>
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
<h2 id="h2">Welcome to CPL Auction</h2>
<div id="d4" style="color:red;"></div>
<h2 id="h"><u>Next Player For Auction</u></h2>
<?php
if(isset($_POST['bid'])){

  if($row['bidding_price']==0 ){
    $stmt = $pdo->prepare('UPDATE player set bidding_t_id=:t,bidding_price=:b where p_id=:p');
    $stmt->execute(array(
      ':t'=>$_SESSION['t_id'],
      ':b'=>$row['base_price'],
      ':p'=>$row['p_id'])
);
echo("<script src="."'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'"."></script>
 <script>
 $(document).ready(function(){

     $('#auto').load('timer.php');

 });
 </script>"."
 <span id="."'auto'"."></span>");

echo("<script src="."'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'"."></script>
<script type="."'text/javascript'".">
   var timeleft = 1;
   var downloadTimer = setInterval(function(){
   timeleft++;

   if(timeleft > 4){

       clearInterval(downloadTimer);
     $(document).ready(function(){
       $('#auto1').load('buy.php');
     });
     }
   },3000);


</script>
");
  }
  else if($row['bidding_price']!=0 && $row['bidding_t_id']!=$_SESSION['t_id']){

    $stmt = $pdo->prepare('UPDATE player set bidding_t_id=:t,bidding_price=:b where p_id=:p');
    $stmt->execute(array(
      ':t'=>$_SESSION['t_id'],
      ':b'=>$row['bidding_price']+2500000,
      ':p'=>$row['p_id']));
   echo("<script src="."'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'"."></script>
    <script>
    $(document).ready(function(){

        $('#auto').load('timer.php');

    });
    </script>"."
    <span id="."'auto'"."></span>");

   echo("<script src="."'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'"."></script>
  <script type="."'text/javascript'".">
      var timeleft = 1;
      var downloadTimer = setInterval(function(){
      timeleft++;

      if(timeleft > 4){

          clearInterval(downloadTimer);
        $(document).ready(function(){
          $('#auto1').load('buy.php');
        });
        }
      },3000);


  </script>
  ");

}

echo("<span id="."'auto1'"."></span>");

}

?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    setInterval(function(){
      $('#auto').load('player_selection.php');
    },3000);
  });
  </script>
  <span id='auto'></span>
<form method="post" id="form">
<input type="submit" name="bid" class="registerbtn" value="Bid" onclick="start()"/>
</form>
<span id='auto1'></span>
<div class='footer'>
  <p>This site is under development.Stay Tuned for more updates</p>
</div>
</body>
</html>
