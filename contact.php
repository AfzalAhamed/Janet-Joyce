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
		<title>J & J | Contact </title>
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
	    <h2>Contact Us</h2>
      <div style="background-color: white; padding: 20px; font-size: 13px">
		  
		  <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=464&amp;height=580&amp;hl=en&amp;q=colombo&amp;t=p&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fridaynightfunkin.net/friday-night-funkin-mods-fnf-play-online/">FNF Mods</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:580px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:580px;}.gmap_iframe {height:580px!important;}</style></div>
		  <br>
		  <table width="100%" border="0">
  <tbody>
    <tr>
      <td width="50%">
		  <form class="" action="contact.php" method="post">
           <h2>Tell Us somthing..</h2>
        <input class="input3" type="text" id="txtname" name="txtname" placeholder="Name" required><br>
        <input class="input3" type="email" id="txtemail" name="txtemail" placeholder="Email" required><br>
        <input class="input3" type="text" id="txtmobile" name="txtmobile" placeholder="Mobile Number" required><br>
		<textarea class="input3" id="txtmessage" name="txtmessage" rows="4" cols="50" placeholder="Type Here..." required></textarea><br>
		<input class="button2 button1" type="submit" name="btnsubmit" id="btnsubmit" value="Submit">
    </form>
          <?php
          
            if(isset($_POST["btnsubmit"]))
            {
              		$name=$_POST["txtname"];
					$email=$_POST["txtemail"];
					$number=$_POST["txtmobile"];
				  	$message=$_POST["txtmessage"];
                    $con=mysqli_connect("localhost","root","","janet & joyce");
                    if(!$con)
                    {
                        die("sorry we are facing a techincal issue");
                    }
                    $sql="INSERT INTO `forum` (`forum_no`, `person_name`, `person_email`, `person_mobile`, `message`) VALUES (NULL, '".$name."', '".$email."', '".$number."', '".$message."');";
                    mysqli_query($con,$sql);
                    mysqli_close($con);
                }
                
            
            ?></td>
      <td width="50%">
		<table width="100%" border="0">
  <tbody>
    <tr>
      <td><img src="images/contact.png" width="50" height="" alt=""/></td>
      <td>0771234567</td>
    </tr>
    <tr>
      <td><img src="images/location.png" width="50" height="" alt=""/></td>
      <td>colombo, Srilnaka</td>
    </tr>
    <tr>
      <td><img src="images/email.png" width="50" height="" alt=""/></td>
      <td>janetandjoyce@gmail.com</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
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