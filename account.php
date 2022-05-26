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
		<title>J & J | Account </title>
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
	    <h2>My Account</h2>
      <div style="background-color: white; padding: 20px; font-size: 13px">
		  <?php 
      $con = mysqli_connect("localhost","root","","janet & joyce");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM customer WHERE c_id ='".$_SESSION['c_id']."'";	
		$result = mysqli_query($con,$sql);
		
		if(mysqli_num_rows($result)> 0)
		{
			
			while($row = mysqli_fetch_assoc($result))
			{
				$customer_id=$_SESSION['c_id'];
				$customer_name=$row['c_name'];
				$customer_email=$row['c_email'];
				$customer_mobile=$row['c_mobile'];
				$customer_address=$row['c_address'];
				$customer_city=$row['c_city'];
				$customer_post=$row['c_postcode'];
				?>
		  <table width="100%" border="0">
  <tbody>
    <tr>
      <td><h3>Account ID</h3></td>
      <td><h3><?php echo $customer_id ?></h3></td>
    </tr>
    <tr>
      <td><h3>Name</h3></td>
      <td><h3><?php echo $customer_name ?></h3></td>
    </tr>
    <tr>
      <td><h3>Email Address</h3></td>
      <td><h3><?php echo $customer_email ?></h3></td>
    </tr>
    <tr>
      <td><h3>Mobile Number</h3></td>
      <td><h3><?php echo $customer_mobile ?></h3></td>
    </tr>
    <tr>
      <td><h3>Address</h3></td>
      <td><h3><?php echo $customer_address ?></h3></td>
    </tr>
    <tr>
      <td><h3>City</h3></td>
      <td><h3><?php echo $customer_city ?></h3></td>
    </tr>
    <tr>
      <td><h3>Post Code</h3></td>
      <td><h3><?php echo $customer_post ?></h3></td>
    </tr>
  </tbody>
</table>
		  <br>
		  <a href="logout.php" class="button2 button1">Sign Out</a>
		  <?php 
			}
		}
        ?>

</div><br>
		  <h2>Order Details</h2>
		  <div style="background-color: white; padding: 20px; font-size: 13px">
			  <table width="100%" border="0">
  		<tbody>
			<tr>
      			<td><h3>Order Number</h3></td>
      			<td><h3>Product Name</h3></td>
      			<td><h3>Quantity</h3></td>
      			<td><h3>Price</h3></td>
      			<td><h3>Order Date</h3></td>
				<td><h3>Order Status</h3></td>
    			</tr>
		<?php   
		$sql_2 ="SELECT * FROM orderbook INNER JOIN products ON orderbook.p_id = products.p_id WHERE c_id='".$_SESSION['c_id']."'";	
		$result2 = mysqli_query($con,$sql_2);
		
		if(mysqli_num_rows($result2)> 0)
		{
			
			while($row = mysqli_fetch_assoc($result2))
			{
				$order_on=$row['order_no'];
				$product_id=$row['p_id'];
				$product_name=$row['p_name'];
				$product_que=$row['que'];
				$product_price=$row['total'];
				$order_date=$row['date'];
				$order_status=$row['order_status'];
				?>
				<tr>
      			<td>#<?php echo $order_on ?></td>
      			<td><?php echo $product_name ?></td>
      			<td><?php echo $product_que ?></td>
      			<td><?php echo $product_price ?></td>
      			<td><?php echo $order_date ?></td>
				<td style="color: green"><?php echo $order_status ?></td>
    			</tr>
				<?php
			}
		}else{
			echo 'No Orders Yet';
		}
		?>
		</tbody>
		</table>
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
              <td colspan="3" class="notice">© 2021 Janet & Joyce Designed by IT20080044              </td>
            </tr>
          </tbody>
    </table>
	</div>


</body>
</html>