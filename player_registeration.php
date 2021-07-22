<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
if(isset($_POST['name'])&&isset($_POST['age'])&&isset($_POST['country'])&&isset($_POST['nat'])&&isset($_POST['skill'])&&isset($_POST['bprice'])&&isset($_POST['email'])&&isset($_POST['number']))
{


  if((strlen($_POST['name'])<1)||(strlen($_POST['age'])<1)||(strlen($_POST['country'])<1)||(strlen($_POST['nat'])<1)||(strlen($_POST['skill'])<1)||(strlen($_POST['bprice'])<1)||(strlen($_POST['email'])<1)||(strlen($_POST['number'])<1)){
        echo"All fields are required";
        return;}
  else{
    $stmt = $pdo->prepare('INSERT INTO player
    (p_name,p_age,p_country,nationality,skill,base_price,p_email,p_number)
    VALUES ( :n, :a, :c ,:nat,:s,:b,:e,:m)');

  $stmt->execute(array(
    ':n' => $_POST['name'],
    ':a' => $_POST['age'],
    ':c' => $_POST['country'],
    ':nat' => $_POST['nat'],
    ':s' => $_POST['skill'],
    ':b' => $_POST['bprice'],
    ':e'=>$_POST['email'],
    ':m'=>$_POST['number'])
  );
  $_SESSION['success']=$_POST['name'].",You have registered Successfully";
  header("Location:index.php");
}

}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="image/cpl_logo.jpg" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="player_registeration.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Player Registration</title>
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
<div id="h2">
  <h2>Player Registration For CPL</h2>
</div>
<form name='player_registeration' method="post">

<div class="container">
  <p>Please fill in this form to register for CPL Auction.</p>
  <hr>

  <label for="name"><b>Name</b></label>
  <input type="text" placeholder="Enter Name" name="name" id="name" pattern="[A-Za-z]+" oninput="myfunction1()" title="Name Should Only Contain Alphabet" required>
  <div id="d1" style="color:red;"></div>
  <label for="age"><b>Age</b></label>
  <input type="text" placeholder="Enter Age" name="age" id="age"pattern="[0-9]{1,2}" oninput="myfunction2()" title="Age should be numeric and between 1 and 100" required max=100 min=1 >
  <div id="d2" style="color:red;"></div>
  <label for="country"><b>Country</b></label>
  <input type="text" placeholder="Enter Country" name="country" id="country" pattern="[A-Za-z]+" oninput="myfunction3()" title="Country Name Should Only Contain Alphabet" required>
  <div id="d3" style="color:red;"></div>
  <p><b>Nationality</b><br><br>
  <input type="radio" id="n1" name="nat" value="Domestic" oninput="myfunction4()" >
  <label for="n1">Domestic</label>
  <input type="radio" id="n2" name="nat" value="Foreign" oninput="myfunction4()">
  <label for="n2">Foreign</label></p>
    <div id="d4" style="color:red;"></div>
  <p><b>Skill-Set</b><br><br>
    <input type="radio" id="s1" name="skill" value="Batsman" required>
    <label for="s1">Batsman</label>
    <input type="radio" id="s2" name="skill" value="Bowler">
    <label for="s2">Bowler</label>
    <input type="radio" id="s3" name="skill" value="All-Rounder">
    <label for="s3">All-Rounder</label>
  </p>
  <label for="bprice"><b>Base Price</b></label>
  <input type="text" placeholder="Enter Base Price" name="bprice" id="bprice" pattern="[0-9]{1,8}" oninput="myfunction5()" title="Base Price Should be Numeric and Not Greater than INR 20000000" required>
  <div id="d5" style="color:red;"></div>
  <label for="email"><b>Email</b></label>
  <input type="email" placeholder="Enter Email" name="email" id="email" pattern="^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$" oninput="myfunction6()" title=" Email must Contain @ and then ." required>
  <div id="d6" style="color:red;"></div>
  <label for="number"><b>Phone Number</b></label>
  <input type="text" placeholder="Enter Phone Number" name="number" id="number" pattern="[0-9]{10}" oninput="myfunction7()" title="Mobile Number must be of Ten Digits" maxlength="10" required>
    <div id="d7" style="color:red;"></div>
</hr>
  <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

  <button type="submit" class="registerbtn" >Register</button>
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

      document.getElementById("d1").innerHTML="<b>*Name Should Not Be Empty And Must Contain Only Alphabet</b>";
  }
}
function myfunction2(){
var y=document.getElementById("age").value;

  if (isNaN(y) || y < 1 || y > 99) {
    document.getElementById("d2").innerHTML="<b>*Age should be numeric and between 1 and 100</b>";
  }
  else{
    document.getElementById("d2").innerHTML="";
  }
}
function myfunction3(){
  var x = document.getElementById("country").value;
  if (/^[A-Za-z]+$/.test(x)) {
    document.getElementById("d3").innerHTML="";}
  else{
      document.getElementById("d3").innerHTML="<b>*Country Name Should Not Be Empty And Must Contain Only Alphabet</b>";
  }
}
function myfunction4(){
  var x = document.getElementById("country").value;
  var y = document.getElementById("n2");
  if(document.getElementById("n2").checked==true && /India/i.test(x)){
      document.getElementById("d4").innerHTML="<b>Indian Player Can't choose nationality as foreign</b>";
  }
  else{
      document.getElementById("d4").innerHTML="";
  }
}
function myfunction5(){
var y=document.getElementById("bprice").value;

  if (isNaN(y) || y > 20000000) {
    document.getElementById("d5").innerHTML="<b>*Base Price Should be Numeric and Not Greater than INR 20000000</b>";
  }
  else{
    document.getElementById("d5").innerHTML="";
  }
}
function myfunction6(){
  var x = document.getElementById("email").value;
  if (/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/.test(x)) {
      document.getElementById("d6").innerHTML="";}
  else{
      document.getElementById("d6").innerHTML="<b>*Email must Contain @ and then .</b>";
  }
}
function myfunction7(){
var y=document.getElementById("number").value;

  if (y.toString().length!=10){
    document.getElementById("d7").innerHTML="<b>*Mobile Number must be of Ten Digits</b>";
  }
  else{
    document.getElementById("d7").innerHTML="";
  }
}
</script>
</body>
</html>
