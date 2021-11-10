<?php
session_start();

?>
<?php
include("db_conection.php");
if(isset($_POST['register']))
{
$user_email = $_POST['ruser_email'];




$check_user="select * from users WHERE user_email='$user_email'";
    $run_query=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Your account does not exist in out database.!')</script>";
// echo"<script>window.open('index.php','_self')</script>";
exit();
    }
 
$saveaccount="insert into forgetpassword (Email) VALUE ('$ruser_email')";
mysqli_query($dbcon,$saveaccount);
echo "<script>alert('Your request has been sent to admin')</script>";				
echo "<script>window.open('index.php','_self')</script>";


				
	
			
		
	
		

}

?>
