<?php
if(isset($_POST["btnregister"]))
            {
                $password=$_POST["txtpassword"];
                $repassword=$_POST["txtre-password"];
                if($password==$repassword)
                {
                    $name=$_POST["txtname"];
                    $c_email=$_POST["txtemail"];
                    $number=$_POST["txtmobile"];
                    $address=$_POST["txtaddress"];
                    $city=$_POST["txtcity"];
                    $post=$_POST["txtpostcode"];
                    $con=mysqli_connect("localhost","root","","janet & joyce");
                    if(!$con)
                    {
                        die("sorry we are facing a techincal issue");
                    }
                    $sql="INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `c_mobile`, `c_address`, `c_city`, `c_postcode`, `c_password`) VALUES (NULL, '".$name."', '".$c_email."', '".$number."', '".$address."', '".$city."', '".$post."', '".$password."')";
                    mysqli_query($con,$sql);
                    mysqli_close($con);
                    header('Location:signin.php'); 
                }else{
                    echo 'Password Do not match';
                }
                
            }
            ?>