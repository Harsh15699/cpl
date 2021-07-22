<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$salt = 'XyZzy12*_';
session_start();

if(isset($_POST['name'])&&isset($_POST['owner'])&&isset($_POST['uname'])&&isset($_POST['pass'])&&isset($_POST['email'])&&isset($_POST['number']))
{
  if((strlen($_POST['name'])<1)||(strlen($_POST['owner'])<1)||(strlen($_POST['uname'])<1)||(strlen($_POST['pass'])<1)||(strlen($_POST['email'])<1)||(strlen($_POST['number'])<1)){
        echo"All fields are required";
        return;}


  else{
    $stmt = $pdo->prepare('INSERT INTO Team
    (t_name,owner_name,username,password,t_email,t_number)
    VALUES ( :n, :o,:u,:p,:e,:m)');

  $stmt->execute(array(
    ':n' => $_POST['name'],
    ':o' => $_POST['owner'],
    ':u' => $_POST['uname'],
    ':p' => hash('md5', $salt.$_POST['pass']),
    ':e'=>$_POST['email'],
    ':m'=>$_POST['number'])
  );

$_SESSION['success']=$_POST['name'].",You have registered Successfully as a Team \n Login Now";
header("Location:login.php");}}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="image/cpl_logo.jpg" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="player_registeration.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Team Registration</title>
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

<main>
<h2 id="h2">Team Registration For CPL</h2>
<form method="post">


<div class="container">
  <p>Please fill in this form to participate in CPL Auction.</p>
  <hr>

  <label for="name"><b>Team Name</b></label>
  <input type="text" placeholder="Enter Name" name="name" id="name" pattern="[A-Za-z]+" oninput="myfunction1()" title="Team Name Should Only Contain Alphabet" required>
  <div id="d1" style="color:red;"></div>
  <label for="owner"><b>Owner Name</b></label>
  <input type="text" placeholder="Enter Owner Name" name="owner" id="owner" pattern="[A-Za-z]+" oninput="myfunction2()" title="Owner Name Should Only Contain Alphabet" required>
  <div id="d2" style="color:red;"></div>
  <label for="email"><b>Email</b></label>
  <input type="email" placeholder="Enter Email" name="email" id="email" pattern="^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$" oninput=myfunction3() title=" Email must Contain @ and then ." required>
  <div id="d3" style="color:red;"></div>
  <label for="number"><b>Phone Number</b></label>
  <input type="text" placeholder="Enter Phone Number" name="number" id="number" oninput="myfunction5()" pattern="[0-9]{10}" title="Mobile Number must be of Ten Digits" maxlength="10" required>
  <div id="d5" style="color:red;"></div>
  <label for="uname"><b>Username</b></label>
  <input type="text" placeholder="Enter Username" name="uname" id="uname" pattern="^[a-zA-Z]+[0-9]+$" oninput="myfunction4()" title="Username Can Have Only Alphabet And Number" required>
  <div id="d4" style="color:red;"></div>
  <label for="pass"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="pass" id="pass" oninput="myfunction6()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
  <div id="d6" style="color:red;"></div>
</hr>
  <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

  <button type="submit" class="registerbtn">Register</button>
</div>
<div class="container signin">
    <p>Already have an account? <a href="login.php">Log In</a>.</p>
  </div>
</form>
</main>
<div class='footer'>
  <p>This site is under development.Stay Tuned for more updates</p>
</div>
<script>
function myfunction1(){
  var x = document.getElementById("name").value;
  if (/^[A-Za-z]+$/.test(x)) {
      document.getElementById("d1").innerHTML="";}
  else{
      document.getElementById("d1").innerHTML="<b>Team Name Should Not Be Empty And Must Contain Only Alphabet</b>";
  }
}
function myfunction2(){
  var x = document.getElementById("owner").value;
  if (/^[A-Za-z]+$/.test(x)) {
      document.getElementById("d2").innerHTML="";}
  else{
      document.getElementById("d2").innerHTML="<b>Owner Name Should Not Be Empty And Must Contain Only Alphabet</b>";
  }
  }
function myfunction3(){
  var x = document.getElementById("email").value;
  if (/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/.test(x)) {
      document.getElementById("d3").innerHTML="";}
  else{
      document.getElementById("d3").innerHTML="<b>Email must Contain @ and then .</b>";
  }
}
function myfunction4(){
  var x = document.getElementById("uname").value;
  if (/^[A-Za-z0-9]+$/.test(x)) {
      document.getElementById("d4").innerHTML="";}
  else{
      document.getElementById("d4").innerHTML="<b>Username Can Have Only Alphabet And Number</b>";
  }
}
function myfunction5(){
var y=document.getElementById("number").value;

  if (y.toString().length!=10){
    document.getElementById("d5").innerHTML="<b>*Mobile Number must be of Ten Digits</b>";
  }
  else{
    document.getElementById("d5").innerHTML="";
  }
}
function myfunction6(){
  var x = document.getElementById("pass").value;
  if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(x)) {
      document.getElementById("d6").innerHTML="";}
  else{
      document.getElementById("d6").innerHTML="<b>Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</b>";
  }
  }
</script>
</body>
</html>
