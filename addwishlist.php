<?php session_start();
if(!isset($_SESSION["c_id"]))
{
    header('Location:signin.php');
}
?>
<?php
$con=mysqli_connect("localhost","root","","janet & joyce");
if(!$con)
{
    die("sorry we are facing a techincal issue");
}
$sql="INSERT INTO `wishlist` (`wishlist_no`, `c_id`, `p_id`) VALUES (NULL, '".$_SESSION["c_id"]."', '".$_GET["p_id"]."')";
mysqli_query($con,$sql);
header('Location:wishlist.php');
?>
