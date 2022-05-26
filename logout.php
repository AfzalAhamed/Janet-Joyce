<?php 
session_start();
unset($_SESSION["c_id"]);
header('Location:signin.php');
?>
