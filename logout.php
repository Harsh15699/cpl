<?php
session_start();
unset($_SESSION['t_name']);
unset($_SESSION['t_id']);
header('Location: login.php');
?>
