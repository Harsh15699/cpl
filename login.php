<?php // Do not put any HTML above this line
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
if ( isset($_POST['Register'] ) ) {
    header("Location: team_registeration.php");
    return;
}

$salt = 'XyZzy12*_';
// Check to see if we have some POST data, if we do process it
if ( isset($_POST['uname']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['uname']) < 1 || strlen($_POST['pass']) < 1 ) {
        echo"Username and password are required";
        header("Location: login.php");
        return;
    }
    else {
        $check = hash('md5', $salt.$_POST['pass']);
        $stmt = $pdo->prepare('SELECT t_name,t_id,username, password FROM team
          WHERE  username= :u AND password = :pw');
        $stmt->execute(array( ':u' => $_POST['uname'], ':pw' => $check));
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //header("Location: view.php?name=".urlencode($_POST['email']));
            if ( $row !== false ) {
              $_SESSION['t_name'] = $row['t_name'];
              $_SESSION['t_id'] = $row['t_id'];
              header("Location: team_view.php");
              return;
            }
            else{
              echo"<script type>
              alert('Username Or Password is Incorrect');</script>";

          }

        }
    }


// Fall through into the View
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="image/cpl_logo.jpg" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Team Login</title>
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

</header>
<?php
if ( isset($_SESSION['success']) ) {
  echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
  unset($_SESSION['success']);
}
 ?>
<main>
<h2 id="h2">Team Login For CPL</h2>
<form method="post">


<div class="container">
<p>Please Login to go to Dashboard</p>
<hr>
<label for="uname"><b>Username</b></label>
<input type="text" placeholder="Enter Username" name="uname" id="uname" required>
<label for="pass"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="pass" id="pass" required>

</hr>
<button type="submit" class="registerbtn">Login</button>
</div>
<div class="container signin">
  <p>Don't have an account? <a href="team_registeration.php">Register</a>.</p>
</div>
</form>
</main>
<div class='footer'>
  <p>This site is under development.Stay Tuned for more updates</p>
</div>
</body>
</html>
