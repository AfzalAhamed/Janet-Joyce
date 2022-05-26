<?php session_start();
if(!isset($_SESSION["username"]))
{
    header('Location:adminpanel.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>J & J | ADMIN </title>
<link href="css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0">
	  <tbody>
	    <tr>
	    <td width="14%" class="nav">
	        <table width="100%" border="0">
	          <tbody class="fixed">
	            <tr>
	              <td><a href="#products" class="nav-list">Products</a></td>
                </tr>
	            <tr>
	              <td><a href="#orders" class="nav-list">Orders</a></td>
                </tr></a>
	            <tr>
	              <td><a href="#notification" class="nav-list">Notification</a></td>
                </tr></a>
	            <tr>
	              <td><a href="#customer" class="nav-list">Customers</a></td>
                </tr></a>
              </tbody>
            </table>
	      </td>
	    <td width="86%">
		  	<div id="products" class="panel">
		  	  <div class="topic">Products</div>
			  	<div class="content">
					<h2>Product Details	&nbsp; <a href="#p_add" class="btn">Add Products</a></h2>
					<table class="table">
  						  <tr class="tr">
							<th class="th">Product ID</th>
							<th class="th">Product Name</th>
							<th class="th">Product Price</th>
							<th class="th">Product Category</th>
							<th class="th">Product Image</th>
							<th class="th">Product Description</th>
							<th class="th"></th>
					  	  </tr>
							<?php 
								$con = mysqli_connect("localhost","root","","janet & joyce");
								  if(!$con){	
										 die("Cannot connect to DB server");		
									  }
								  $sql ="SELECT * FROM `Products`";	
								  $result = mysqli_query($con,$sql);
								  if(mysqli_num_rows($result)> 0){
									while($row = mysqli_fetch_assoc($result))
									{
										?>
										<tr class="tr">
										<td class="td"><?php echo $row['p_id']; ?></td>
										<td class="td"><?php echo $row['p_name']; ?></td>
										<td class="td"><?php echo $row['p_price']; ?></td>
										<td class="td"><?php echo $row['p_category']; ?></td>
										<td class="td"><?php echo $row['p_image']; ?></td>
										<td class="td"><?php echo $row['p_des']; ?></td>
										<td class="td"><a href="productremove.php?p_id=<?php echo $row['p_id']; ?>">Remove</a></td>
									  	</tr>
										<?php
									}
							  	  }else{
								  	 echo "No Product in database";
							  	  }
						    ?>
				</table>
				</div>
				<div class="panel">
				<br><hr id="p_add"><br>
				<h2>Add Product</h2>
				<form action="addproduct.php" method="post">
					<table class="table">
  						  <tr class="tr">
							<th class="th">Product Name</th>
							<th class="th">Product Price</th>
							<th class="th">Product Category</th>
							<th class="th">Product Image</th>
							<th class="th">Product Description</th>
					  	  </tr>
						  <tr class="tr">
								<td class="td"><input class="input" type="text" id="txtname" name="txtname" placeholder="Product Name" required></td>
								<td class="td"><input class="input" type="number" id="txtprice" name="txtprice" placeholder="Product Price" required></td>
								<td class="td"><select class="input" id="txtcategory" name="txtcategory">
												<option value="Null">Not Set</option>
												<option value="Mens Cloths">Mens Cloths</option>
												<option value="Womens Cloths">Womens Cloths</option>
												<option value="Home Accessories">Home Accessories</option>
												<option value="Day to Day Accessories">Day to Day</option>
												<option value="Other Electronics">Other Electronics</option>
												<option value="Mobile">Mobile</option>
												</select>
								</td>
								<td class="td"><input class="input" type="text" id="txtimage" name="txtimage" placeholder="Image Name" required></td>
								<td class="td"><textarea class="input" type="text" id="txtdes" name="txtdes" placeholder="Description" rows="4" cols="50"></textarea></td>
							</tr>
						</table>
						<br><br>
					<input class="btn" type="submit" name="btnaddproduct" id="btnaddproduct" value="Add to Database">
					</form>
				</div>
            </div>
		  	<div id="orders" class="panel">
				<div class="topic">Orders</div>
				<h2>Order Details &nbsp; <a href="#cancle_request" class="btn">Requests</a></h2>
					<table class="table">
  						  <tr class="tr">
							<th width="10%" class="th">Order Number</th>
							<th width="8%" class="th">Customer ID</th>
							<th width="7%" class="th">Product ID</th>
							<th width="10%" class="th">Product Quantity</th>
							<th width="8%" class="th">Date</th>
							<th width="22%" class="th">Address</th>
							<th width="24%" class="th">Status</th>
							<th width="11%" class="th"></th>
					  	  </tr>
							<?php 
								  $sql2 ="SELECT * FROM `orderbook`";	
								  $result2 = mysqli_query($con,$sql2);
								  if(mysqli_num_rows($result2)> 0){
									while($row = mysqli_fetch_assoc($result2))
									{
										?>
										<tr class="tr">
										<td class="td"><?php $order_no=$row['order_no']; echo $order_no ?></td>
										<td class="td"><?php echo $row['c_id']; ?></td>
										<td class="td"><?php echo $row['p_id']; ?></td>
										<td class="td"><?php echo $row['que']; ?></td>
										<td class="td"><?php echo $row['date']; ?></td>
										<td class="td"><?php echo $row['address']; ?></td>
										<td class="td"><?php echo $row['order_status']; ?></td>
										<td class="td"></td>
									  	</tr>
										
										<tr class="tr">
										<td class="td"></td>
										<td class="td"></td>
										<td class="td"></td>
										<td class="td"></td>
										<td class="td"></td>
										<td class="td"></td>
										<form action="updateorder.php?cart_no=<?php echo $order_no ?>" method="post">
										<td class="td">
											<select class="input2" id="txtstatus" name="txtstatus">
											  <option value="Processing" selected></option>
											  <option value="Processing">Processing</option>
											  <option value="Packing">Packing</option>
											  <option value="On The Way">On The Way</option>
											  <option value="Delivered">Delivered</option>
											  <option value="Canceled">Canceled</option>
											</select>
										</td>
										<td class="td"><input class="" type="submit" name="btnupdateorder" id="btnupdateorder" value="Update">
										</td>
										</form>
									  	</tr>
										<?php
									}
							  	  }else{
								  	 echo "No Orders in Order Book";
							  	  }
						    ?>
				</table>
				<div class="content">
				<br><hr id="cancle_request"><br>
				<h2>Cancle Requests</h2>
					
				</div>
			</div>
			<div id="notification" class="panel">
				<div class="topic">Notification</div>
				<h2>Forum Messages</h2>
				<table class="table">
  						  <tr class="tr">
							<th width="15%" class="th">Forum Number</th>
							<th width="17%" class="th">Person Name</th>
							<th width="22%" class="th">Person Email</th>
							<th width="19%" class="th">Mobile Number</th>
							<th width="27%" class="th">Message</th>
					  	  </tr>
							<?php 
								  $sql3 ="SELECT * FROM `forum`";	
								  $result3 = mysqli_query($con,$sql3);
								  if(mysqli_num_rows($result3)> 0){
									while($row = mysqli_fetch_assoc($result3))
									{
										?>
										<tr class="tr">
										<td class="td"><?php echo $row['forum_no']; ?></td>
										<td class="td"><?php echo $row['person_name']; ?></td>
										<td class="td"><?php echo $row['person_email']; ?></td>
										<td class="td"><?php echo $row['person_mobile']; ?></td>
										<td class="td"><?php echo $row['message']; ?></td>
									  	</tr>
										<?php
									}
							  	  }else{
								  	 echo "No Notification in Database";
							  	  }
						    ?>
				</table>
			</div>
		  	<div id="customer" class="panel">
				<div class="topic">Customer</div>
				<h2>Customers</h2>
				<table class="table">
  						  <tr class="tr">
							<th width="8%" class="th">Customer ID</th>
							<th width="13%" class="th">Customer Name</th>
							<th width="14%" class="th">Customer Email</th>
							<th width="15%" class="th">Mobile Number</th>
							<th width="21%" class="th">Customer Address</th>
							<th width="15%" class="th">City</th>
							<th width="14%" class="th">Post Code</th>
					  	  </tr>
							<?php 
								  $sql4 ="SELECT * FROM `customer`";	
								  $result4 = mysqli_query($con,$sql4);
								  if(mysqli_num_rows($result4)> 0){
									while($row = mysqli_fetch_assoc($result4))
									{
										?>
										<tr class="tr">
										<td class="td"><?php echo $row['c_id']; ?></td>
										<td class="td"><?php echo $row['c_name']; ?></td>
										<td class="td"><?php echo $row['c_email']; ?></td>
										<td class="td"><?php echo $row['c_mobile']; ?></td>
										<td class="td"><?php echo $row['c_address']; ?></td>
										<td class="td"><?php echo $row['c_city']; ?></td>
									    <td class="td"><?php echo $row['c_postcode']; ?></td>
									  	</tr>
										<?php
									}
							  	  }else{
								  	 echo "No Orders in Order Book";
							  	  }
						    ?>
				</table>
		  	</div>
		</td>
        </tr>
  </tbody>
</table>
</body>
</html>
