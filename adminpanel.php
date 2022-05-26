<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>J & J | Admin Panel </title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="30%">&nbsp;</td>
      <td width="10%">
      <div class="user-box">
		  
	<form class="register" action="adminpanel.php" method="post">
        <br><br>
<br>	<h2>Admin Login</h2>
        <input class="text" type="username" id="txtusername" name="txtusername" placeholder="Username" required><br>
        <input class="text" type="password" id="txtpassword" name="txtpassword" placeholder="Password" required><br>
		<input class="button" type="submit" name="btnsignin" id="btnsignin" value="Sign In">
    </form>
          
          <?php 
            if(isset($_POST["btnsignin"]))
            {
                $username=$_POST["txtusername"];
                $password=$_POST["txtpassword"];
        
            $con=mysqli_connect("localhost","root","","janet & joyce");
            if(!$con)
            {
                die("sorry we are facing a techincal issue");
            }
            $sql="SELECT * FROM `adminpanel` WHERE username='".$username."' AND password='".$password."';";
            $result=mysqli_query($con,$sql);
        	
            if(mysqli_num_rows($result)>0)
            {
				while($row = mysqli_fetch_assoc($result))
				{
					$_SESSION["username"]=$row['username'];
				}
			header('Location:admin.php');
            }else{
                echo "Please Enter a correct Username and password"; ?> 
                <br><br><br> <?php
            }
            }
            ?>
		  
		  </div>
        </td>
		
      <td width="30%">&nbsp;</td>
    </tr>
  </tbody>
</table>
<br><br><br><br><br>
</body>
</html>
