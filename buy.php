<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
$stmt = $pdo->prepare('SELECT p_id,p_name,bidding_price,bidding_t_id FROM player
WHERE  sold=:p');
$stmt->execute(array( ':p' =>"No"));
$row = $stmt->fetch();
if($row['bidding_t_id']==$_SESSION['t_id']){
  $stmt = $pdo->prepare('UPDATE player set t_id=:t ,sold=:s,Sold_Price=:sp where p_id=:p');
  $stmt->execute(array(
    ':t'=>$_SESSION['t_id'],
    ':s'=>"Yes",
    ':sp'=>$row['bidding_price'],
    ':p'=>$row['p_id'])
);
echo("<h2 id="."b".">".$row['p_name']." is Sold to You</h2>");
}
else{
  if($row['bidding_t_id']!=0){
  $stmt = $pdo->prepare('SELECT t_name FROM team
  WHERE  t_id=:t');
  $stmt->execute(array( ':t' =>$row['bidding_t_id']));
  $rows = $stmt->fetch();
  //echo ("<p id="."b".">Last Bid Was From ".$rows['t_name']."</p>");
  echo("<h2 id="."b".">Bid Again(2 sec left)</h2>");
}}

?>
<style>
#b{
  display:inline;
}
</style>
