<?php 
session_start();
if(!isset($_SESSION["c_id"]))
{
    header('Location:signin.php');
}

$con = mysqli_connect("localhost","root","","janet & joyce");
if(!$con)
{	
	die("Cannot connect to DB server");		
}
$sql ="DELETE FROM cart WHERE cart_no=".$_GET['cart_no']." AND c_id=".$_SESSION["c_id"]."";	
$result = mysqli_query($con,$sql);
header('Location:cart.php');		

?>
