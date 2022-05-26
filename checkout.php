<?php session_start();
if(!isset($_SESSION["c_id"]))
{
    header('Location:signin.php');
}
?>
<!doctype html>
<html>
    <head>
		<meta charset="utf-8">
		<title>J & J | Checkout </title>
        <link href="css/admin.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <table width="100%" border="0">
      <tbody>
        <tr>
          <td><div class="notice">We are committed to provide service 24 X 7</div></td>
        </tr>
      </tbody>
    </table>
	<div class="top-header">	
    <table width="100%" border="0" class="top-header-table">
          <tbody>
            <tr>
              <td><img src="logo/logo3.png" width="195" height="101" alt=""/></td>
              <td>
				<div class="menu-nav">
          		<a href="cart.php" class="menu">Cart</a>
          		<a href="account.php" class="menu">My Account</a>
          		<a href="index.php" class="menu">Home</a>
          		<a href="shop.php" class="menu">Shop</a>
          		<a href="wishlist.php" class="menu">Wishlist</a>
        		</div>
			 </td>
              <td><a href="contact.php"><img src="images/contact.png" width="29" height="29" style="float: left;"></a></td>
              <td width="21%"><strong>
				  <a href="contact.php">
                <p class="callto"><strong>Call To</strong> +94 77 123 45678<br>
			  Email : <br>
					support@janetandjoyce.com</p></a></td>
            </tr>
			<tr>
              <td width="15%">
				 </td>
			<form class="" action="search.php" method="post">
              <td width="61%"><div class="search"><input class="input3" placeholder="Search for Product" type="text" id="search" name="search">
				  <input class="button2 button1" type="submit" name="btnsearch" id="btnsearch" value="Search">
				  </div></td>
			</form>
              <td width="3%"></td>
				<?php 
	
		if(isset($_SESSION["c_id"]))
		{
			$con = mysqli_connect("localhost","root","","janet & joyce");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM cart WHERE c_id='".$_SESSION['c_id']."'";	
		$result = mysqli_query($con,$sql);
		$subtotal=0;
		$count=0;
			if(mysqli_num_rows($result)> 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$total=$row['total']; 
					$subtotal=$subtotal+$total;
					$count=$count+1;
				}?>
			
		<td width="21%"><a href="cart.php"><div class="cart-total"><img src="images/cart.jpg" width="27" height="26" alt=""/> | <?php echo $count ?> items | Rs.<?php echo $subtotal ?>.00</div></a></td>
				
		<?php	
			}
		}else{ ?>
			<td width="21%"><a href="cart.php"><div class="cart-total"><img src="images/cart.jpg" width="27" height="26" alt=""/> | 0 items | Rs.0.00</div></a></td> <?php
		}
		?>
            </tr>
          </tbody>
    </table>
	</div>
<table width="100%" border="0" class="top-header-table">
  <tbody>
    <tr>
      <td width="22%" class="side">
		  <div class="side-panel">
		<button class="accordion">Category</button>
				<div class="dpanel"><br>
					<a href="product.php?p_category=Mens Cloths" class="cate">Men's Cloths</a><hr>
         			<a href="product.php?p_category=Womens Cloths" class="cate">Women's Cloths</a><hr>
          			<a href="product.php?p_category=Home Accessories" class="cate">Home Accessories</a><hr>
          			<a href="product.php?p_category=Day to Day Accessories" class="cate">Daily Use Accessories</a><hr>
          			<a href="product.php?p_category=Mobile" class="cate">Mobile</a></li><hr>
          			<a href="product.php?p_category=Other Electronics" class="cate">Other Electronics</a><br><br>
				</div>
				
		  </div>
	  <br>
  		<div class="top-rated">
				    <h3>Top Rated Products</h3><br>
		  			<?php 
            $con = mysqli_connect("localhost","root","","janet & joyce");
		      if(!$con)
		          {	
			         die("Cannot connect to DB server");		
		          }
			$sql5 ="SELECT * FROM review INNER JOIN products ON review.p_id = products.p_id";
				
		  $result5 = mysqli_query($con,$sql5);
		  if(mysqli_num_rows($result5)> 0)
		  {
			  
              while($row = mysqli_fetch_assoc($result5))
				{
				 ?>
				<a href="singleproduct.php?p_id=<?php echo $row['p_id']; ?>">
				  <table width="100%" border="0">
				  <tbody>
					<tr>
					  <td width="30%"><img src="images/<?php echo $row['p_image'];?>" width="40px" height=""></td>
					  <td width="70%" style="color: black; font-size: 14px;"><?php echo $row['p_name']; ?></td>
					</tr>
				  </tbody>
				</table>
				</a>  
                <?php
              	}
				 	
		  }else{
              echo "No Rated Products";
          }
        
        mysqli_close($con);
      ?>
				</div>
		  </div>
		</td>
      <td width="78%" class="body_inner side">
	    <h2>Checkout</h2>
      <div style="background-color: white; padding: 20px; font-size: 13px">
		  <form class="" action="checkout.php" method="post">
		  <table width="100%" border="0">
  <tbody>
    <tr>
      <td width="50%" class="side">
         <h2>Billing Details</h2>
        <input class="input3" type="text" id="txtname" name="txtname" placeholder="Name" required><br>
		<input class="input3" type="text" id="txtstreet" name="txtstreet" placeholder="Street address" required><br>
		<input class="input3" type="text" id="txtcity" name="txtcity" placeholder="City" required><br>
		<input class="input3" type="text" id="txtpost" name="txtpost" placeholder="Post Code" required><br>
		<input class="input3" type="text" id="txtcountry" name="txtcountry" value="Sri Lanka" disabled><br>
		<input class="input3" type="text" id="txtmobile" name="txtmobile" placeholder="Mobile Number" required><br>
        <input class="input3" type="email" id="txtemail" name="txtemail" placeholder="Email" required><br>
    </td>
    <td width="50%" class="side">
		<h2>Your Order</h2>
	    <table width="100%" border="0">
  <tbody>
    <tr>
	   <td width="30%"><strong>Product</strong></td>
      <td width="40%"></td>
      <td width="30%"><strong>Subtotal</strong></td>
    </tr>
	  
	  <?php 
      $con = mysqli_connect("localhost","root","","janet & joyce");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM cart INNER JOIN products ON cart.p_id = products.p_id WHERE c_id='".$_SESSION['c_id']."'";	
		$result = mysqli_query($con,$sql);
		$subtotal=0;
	  	$pid=array();
		$pque=array();
		$ptotal=array();
		$count=0;
		if(mysqli_num_rows($result)> 0)
		{
			
			while($row = mysqli_fetch_assoc($result))
			{
			$p_name=$row['p_name'];
         	$p_id=$row['p_id'];
            $que=$row['que'];  
            $total=$row['total']; 
			$subtotal=$subtotal+$total;
				$pid[$count] = $row['p_id'];
				$pque[$count] = $row['que'];
				$ptotal[$count] = $row['total'];
				$count=$count+1;
			
		?>
    <tr>
	  <td><?php echo $p_name; ?></td>
      <td>x <?php echo $que; ?></td>
      <td>Rs.<?php echo $total; ?>.00</td>
    </tr>
	  
	  <?php   
			}
		}
        ?>
  </tbody>
</table>
		<br><br>
		<table width="100%" border="0" style="background-color: #f2f2f2; padding: 15px;">
  <tbody>
    <tr>
      <td><strong>Subtotal</strong></td>
      <td>Rs.<?php echo $subtotal; ?>.00</td>
    </tr>
    <tr>
      <td ><strong>Total</strong></td>
      <td>Rs.<?php echo $subtotal; ?>.00</td>
    </tr>
  </tbody>
</table>
		<br><br>
		<input class="input1" type="radio" id="cod" name="cod" value="cashondilivery" checked>
  		<label for="cashondilivery">Cash on dilivery</label><br><br>
		<input class="button2 button1" type="submit" name="btnorder" id="btnorder" value="Place Order">
	</td>
    </tr>
  </tbody>
</table>
</form>
		 <?php
         $i=0;
            if(isset($_POST["btnorder"]))
            {
				$name=$_POST["txtname"];
				$street=$_POST["txtstreet"];
				$city=$_POST["txtcity"];
				$post=$_POST["txtpost"];
				$country="Sri Lanka";
				$email=$_POST["txtemail"];
				$number=$_POST["txtmobile"];
				$address= "$name".", $street".", $city".", $post".", $country".", $number".", $email";
				$date=date("Y-m-d");;
				for ($i; $i<=$count ;$i++)
				{
					$sql_2="INSERT INTO `orderbook` (`order_no`, `c_id`, `p_id`, `que`, `address`, `total`, `date`) VALUES (NULL, '".$_SESSION["c_id"]."', '".$pid[$i]."', '".$pque[$i]."', '".$address."', '".$ptotal[$i]."', '".$date."');";
                	mysqli_query($con,$sql_2);
				}
				$sql_3 ="DELETE FROM cart WHERE c_id=".$_SESSION["c_id"]."";	
				$result = mysqli_query($con,$sql_3);
                mysqli_close($con);
				header('Location:account.php');
             }
            ?>
</div>
</td>
    </tr>
  </tbody>
</table>
<br>
<div class="top-header">
	<br><br>
    <table width="100%" border="0" class="top-header-table">
          <tbody>
            <tr>
              <td width="47%"><img src="logo/logo2.png" width="265" height="60" alt=""/><p><div class="textfooter">we serve our customers whenever and<br>
				  wherever they want to shop with us.</div></p></td>
              <td width="31%">
				<a href="faq.php" class="aa">F. A. Q</a><br> 
				<a href="terms.php" class="aa">Terms and Conditions</a><br>
				<a href="use.php" class="aa">Terms of Use</a><br>
				<a href="privacy.php" class="aa">Privacy Policy</a><br>
	
				</td>
              <td width="22%"><strong>Contact Details</strong><br><br><div class="textfooter">
Address: 3548 Columbia Mine Road,<br>
Wheeling, West Virginia,<br>
26003<br>
Contact : 304-559-3023<br>
304-650-2694<br>
E-mail : shopnow@open2.com<br>
contact@open.com
				  </div>
				</td>
              <td width="0%"></td>
            </tr>
			<tr>
              <td colspan="3" class="notice">© 2021 Janet & Joyce Designed by IT20080044 </td>
            </tr>
          </tbody>
    </table>
	</div>


</body>
</html>