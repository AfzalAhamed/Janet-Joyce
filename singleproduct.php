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
		<title>J & J | Single Product </title>
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
	    <p style="font-size: 14px"><a href="index.php" class="links">Home</a> / <a href="shop.php" class="links">Products</a> / </p>
      <div style="background-color: white; padding: 20px; font-size: 13px">
		  
		<?php 
            $con = mysqli_connect("localhost","root","","janet & joyce");
		      if(!$con)
		          {	
			         die("Cannot connect to DB server");		
		          }
		   $sql ="SELECT * FROM `Products` WHERE p_id=".$_GET['p_id']."";	
				
		  $result = mysqli_query($con,$sql);
		  if(mysqli_num_rows($result)> 0)
		  {
			while($row = mysqli_fetch_assoc($result))
			{
            ?>  
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="50%"><div style="width: 241px; margin: auto"><img src="images/<?php echo $row['p_image'];?>" width="241" height="" alt="product"/></div></td>
      <td width="50%">
		<form action="singleproduct.php?p_id=<?php echo $row['p_id']; ?>" method="post">
			<h1><?php echo $row['p_name'];?></h1>
			<h3>Rs.<?php echo $row['p_price'];?>.00</h3><hr>
			<p><strong>Category : </strong><?php echo $row['p_category'];?></p>
			<p><strong>Description :</strong><br><br><?php echo $row['p_des'];?></p>
			<?php
			$category=$row['p_category'];
			$pid=$row['p_id'];
			$p_price=$row['p_price'];
            }
          }else{
              echo "No Product in database";
          }
        ?>
		<input class="input2" type="number" id="txtque" name="txtque" style="width: 45px" value="1" min="1">
        <input class="button2 button1" type="submit" name="btaddtocart" id="btaddtocart" value="Add to cart">
		<a href="addwishlist.php?p_id=<?php echo $pid ?>" class="button3 button1"><img src="images/heart.png" width="20" height="" alt=""/></a>
		</form>
		  <?php      
        if(isset($_POST["btaddtocart"]))
        {
        $que=$_POST["txtque"];
        $totprice=(int)$que*(int)$p_price;
        $con=mysqli_connect("localhost","root","","janet & joyce");
        if(!$con)
        {
            die("sorry we are facing a techincal issue");
        }
        $sql="INSERT INTO `cart` (`cart_no`, `c_id`, `p_id`, `que`, `total`) VALUES (NULL, '".$_SESSION["c_id"]."', '".$pid."', '".$que."', '".$totprice."');";
        mysqli_query($con,$sql);
        
        }
    ?>
		</td>
    </tr>
  </tbody>
</table>
</div><br>
		  <h2>Reviews</h2>
		 <div style="background-color: white; padding: 20px; font-size: 13px">
			  <?php 
		$sql4 ="SELECT * FROM review WHERE p_id='".$pid."'";	
		$result4 = mysqli_query($con,$sql4);
		if(mysqli_num_rows($result4)> 0)
		{
			
			while($row = mysqli_fetch_assoc($result4))
			{
			
			$name=$row['name'];
			$message=$row['message'];
			$rating=$row['stars'];
			echo $row['name'] ?> | 
			 <?php
				 if($rating==1){
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
				 }elseif($rating==2){
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
				 }elseif($rating==3){
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
				 }elseif($rating==4){
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
				 }elseif($rating==5){
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
					 ?><img src="images/star.png" alt=""/ width="20px"><?php
				 }
				 
				 ?>
			 <br>
			<?php echo $message ?><br><hr><br
			 
			 <?php   
			}
		}else{ ?>
			<strong><p style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><?php echo 'No Ratings'; ?><p></strong>
		<?php }
        ?>
			 <br><hr><br>
		   <form class="input2" action="singleproduct.php?p_id=<?php echo $pid ?>" method="post">
		  <h2>Post Your Reviews </h2>
        <input class="text" type="text" id="txtname" name="txtname" placeholder="Name" required><br>
		<select class="text" name="txtrating" id="txtrating" style="width: 100px;">
			<option value="1">1 Star</option>
			<option value="2">2 Stars</option>
			<option value="3">3 Stars</option>
			<option value="4">4 Stars</option>
  			<option value"5">5 Stars</option>
		</select><br>
		<textarea class="text" id="txtmessage" name="txtmessage" rows="4" cols="50" placeholder="Type Here..." required></textarea><br>
		<input class="button2 button1" type="submit" name="btnsubmit" id="btnsubmit" value="Submit">
    </form>
          <?php
          
            if(isset($_POST["btnsubmit"]))
            {
              		$name=$_POST["txtname"];
					$rating=$_POST["txtrating"];
				  	$message=$_POST["txtmessage"];
                    $sql3="INSERT INTO `review` (`r_no`, `p_id`, `name`, `message`, `stars`) VALUES (NULL, '".$pid."', '".$name."', '".$message."', '".$rating."');";
                    mysqli_query($con,$sql3);
                }
            ?>
	    </div>
<br>
<h2>Related products</h2>
		  <div style="background-color: white; padding: 20px; font-size: 13px">
			  <div><table width="100%" border="0">
  <tbody>
    <tr>
      <td width="1%">&nbsp;</td>
      <td width="99%">
<table width="100%" border="0">
  <tbody>
    <tr>
      <?php 
		
		
		$sql2 ="SELECT * FROM `Products` WHERE p_category='".$category."'";	
		$result2 = mysqli_query($con,$sql2);
		$count=0;
		  if(mysqli_num_rows($result2)> 0)
		  {
			  
              while($row = mysqli_fetch_assoc($result2))
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
              echo "No Related products Found";
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