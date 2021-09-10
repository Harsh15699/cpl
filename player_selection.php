<?php // Do not put any HTML above this line
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
?>

<?php
$stmt = $pdo->prepare('SELECT p_id,p_name,nationality,skill,base_price,bidding_t_id,bidding_price FROM player
WHERE  sold=:p');
$stmt->execute(array( ':p' =>"No"));
$row = $stmt->fetch();
echo "<table><tr><td>";
echo("<b>Name:-</b>"."<b>".htmlentities($row['p_name'])."</b>");
echo"<br><br>";
echo("<spam><b>Nationality:-</b>"."<b>".htmlentities($row['nationality'])."</b></spam>");
echo"<br><br>";
echo("<b>Skill-Set:-</b>"."<b>".htmlentities($row['skill'])."</b>");
echo"<br><br>";
echo("<b>Base Price:-</b>"."<b>".htmlentities($row['base_price'])."</b>");
echo"<br><br>";
echo("<spam><b>Current Bidding Price:-</b>"."<b>".htmlentities($row['bidding_price'])."</b></spam>");
echo("</td></tr></table>");
?>
