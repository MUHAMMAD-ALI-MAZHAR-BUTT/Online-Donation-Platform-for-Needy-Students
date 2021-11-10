<?php
session_start();

if(!$_SESSION['admin_username'])
{

    header("Location: ../index.php");//redirect to login page to secure the welcome page without login access.
}

?>

<?php
include("db_conection.php");
if(isset($_POST['item_save']))
{
$prod_name = $_POST['prod_name'];
$prod_price = $_POST['prod_price'];
$prod_quantity = $_POST['prod_quantity'];
$prod_sold = $_POST['prod_sold'];
$item_ID = $_POST['item_ID'];


 
 $check_item="select * from recycledproducts WHERE prod_name='$prod_name'";
    $run_query=mysqli_query($dbcon,$check_item);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Item is already exist, Please try another one!')</script>";
 echo"<script>window.open('index.php','_self')</script>";
exit();
    }
 
$imgFile = $_FILES['item_image']['name'];
$tmp_dir = $_FILES['item_image']['tmp_name'];
$imgSize = $_FILES['item_image']['size'];

$upload_dir = 'item_images/';
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
$itempic = rand(1000,1000000).".".$imgExt;


				
	
			if(in_array($imgExt, $valid_extensions)){			
		
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$itempic);
					$saveitem="insert into recycledproducts (prod_name,prod_quantity,prod_sold,prod_price,item_ID,item_image) VALUE ('$prod_name','$prod_quantity','$prod_sold','$prod_price', '$item_ID','$itempic')";
					mysqli_query($dbcon,$saveitem);
					 echo "<script>alert('Data successfully saved!')</script>";				
					 echo "<script>window.open('items.php','_self')</script>";
				}
				else{
					
					 echo "<script>alert('Sorry, your file is too large.')</script>";				
					 echo "<script>window.open('items.php','_self')</script>";
				}
			}
			else{
				
				 echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";				
					 echo "<script>window.open('items.php','_self')</script>";
				
			}
		
	
		

}

?>









