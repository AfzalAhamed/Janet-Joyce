<?php session_start();
if(!isset($_SESSION["username"]))
{
    header('Location:adminpanel.php');
}
?>
<?php
$p_name=$_POST["txtname"];
$p_price=$_POST["txtprice"];
$p_category=$_POST["txtcategory"];
$p_image=$_POST["txtimage"];
$p_des=$_POST["txtdes"];
$con=mysqli_connect("localhost","root","","janet & joyce");
if(!$con)
{
    die("sorry we are facing a techincal issue");
}
$sql="INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_category`, `p_image`, `p_des`) VALUES (NULL, '".$p_name."', '".$p_price."', '".$p_category."', '".$p_image."', '".$p_des."')";
mysqli_query($con,$sql);
header('Location:admin.php');
?>
