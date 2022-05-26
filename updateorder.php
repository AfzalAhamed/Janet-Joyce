<?php session_start();
if(!isset($_SESSION["username"]))
{
    header('Location:adminpanel.php');
}
?>
<?php
$order_no=$_GET['cart_no'];
$order_status=$_POST["txtstatus"];
$con=mysqli_connect("localhost","root","","janet & joyce");
if(!$con)
{
    die("sorry we are facing a techincal issue");
}
$sql="UPDATE `orderbook` SET `order_status` = '".$order_status."' WHERE `orderbook`.`order_no` = ".$order_no."";
mysqli_query($con,$sql);
header('Location:admin.php#orders');
?>
