<!doctype html>
<html>
    <head>
		<meta charset="utf-8">
		<title>J & J | Home </title>
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
		session_start();
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
		  <div>
		<div class="slideshow-container">
<div class="mySlides fade">
  <img src="images/image1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/image2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/image3.jpg" style="width:100%">
</div>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block"; 
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
	
<div class="aboutus"><h1>ABOUT US</h1><p style="font-size: 15px;">We don't do fashion like anyone else does fashion. Our J & J Brands, created by our London design team, look between the lines to bring you the freshest clothing, shoes, accessories and gifts. When it comes to our curation of brands at J & J, we select the best of those to give you the biggest variety, amazing exclusives and coolest collaborations. And in case that wasn't enough, we've also got a range of first-rate Face + Body products you can express yourself with, too. There are no rules – just endless ways to be you.<br>Giving you the confidence to express your individuality, J & J DESIGN interprets major trends, adding that next-level J & J spin. Representing in our size ranges (J & J Curve, Tall, Petite and Maternity), we've got all the stuff you need to invent a style that’s all yours… making every day, night and everything in-between as extraordinary as you are.

</p></div></div>
	<div>
		<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="1%">&nbsp;</td>
      <td width="99%">
<table width="100%" border="0">
  <tbody>
    <tr>
      <?php 
            $con = mysqli_connect("localhost","root","","janet & joyce");
		      if(!$con)
		          {	
			         die("Cannot connect to DB server");		
		          }
		      $sql ="SELECT * FROM `Products`";	
				
		  $result = mysqli_query($con,$sql);
		$count=0;
		  if(mysqli_num_rows($result)> 0)
		  {
			  
              while($row = mysqli_fetch_assoc($result))
				{
				 $count=$count+1;
           		?>
				
                <td style="max-width: 241px">
				<div class="product">
					<a href="singleproduct.php?p_id=<?php echo $row['p_id']; ?>">
					<img src="images/<?php echo $row['p_image'];?>" width="241px" height=""><br>
					<div style="max-width: 241px; color: #808080; font-size: 14px; text-align: center; background-color: white"><br><?php echo $row['p_name']; ?><br><br>
					<div style="color: green;">Rs.<?php echo $row['p_price']; ?>.00</div><br></div>
					</a>
				</div>
				</td>
                <?php
				 if($count%3==0)
				 {
					 ?>
			  		</tr>
  					</tbody>
					</table>
		  			<br>
		  			<table width="100%" border="0">
  					<tbody>
   					<tr>
		  			<?php
				 }
              	}
				 	
		  }else{
              echo "No Product in database";
          }
        
        mysqli_close($con);
      ?>
    </tr>
  </tbody>
</table>
</td>
      <td width="0%">&nbsp;</td>
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