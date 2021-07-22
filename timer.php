<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
?>
<span1 id="countdowntimer" >1</span1>
<style>
#countdowntimer{
  font-size: 2000%;
  margin-top:50px;
}
</style>
<script type="text/javascript">
    var timeleft = 1;
    var downloadTimer = setInterval(function(){
    timeleft++;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft > 2)
        clearInterval(downloadTimer);
    },1000);
</script>
