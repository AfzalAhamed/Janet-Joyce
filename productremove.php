<?php session_start();
if(!isset($_SESSION["username"]))
{
    header('Location:adminpanel.php');
}
?>
<?php 
$con = mysqli_connect("localhost","root","","janet & joyce");
if(!$con)
{	
	die("Cannot connect to DB server");		
}
$sql ="DELETE FROM products WHERE p_id=".$_GET['p_id']."";	
$result = mysqli_query($con,$sql);
header('Location:admin.php');
?>
