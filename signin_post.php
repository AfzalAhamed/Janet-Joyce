 <?php 
session_start();
            if(isset($_POST["btnsignin"]))
            {
                $email=$_POST["txtemail"];
                $password=$_POST["txtpassword"];
        
            $con=mysqli_connect("localhost","root","","janet & joyce");
            if(!$con)
            {
                die("sorry we are facing a techincal issue");
            }
            $sql="SELECT * FROM `customer` WHERE c_email='".$email."' AND c_password='".$password."';";
            $result=mysqli_query($con,$sql);
        	
            if(mysqli_num_rows($result)>0)
            {
				while($row = mysqli_fetch_assoc($result))
				{
					$c_id=$row['c_id'];
				}
            $_SESSION["c_id"]= $c_id;
			header('Location:account.php');
            }else{
                echo "Please Enter a correct email and password";
            }
            }
            ?>