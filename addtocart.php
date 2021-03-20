<?php 

include ('db_config.php');
session_start();

$sql="INSERT INTO `Addtocart`(`Productid`,`Id`,quantity,total_price)VALUES('".$_POST['product_id']."','".$_SESSION['user_id']."','".$_POST['qty']."','".$_POST['price']*$_POST['qty']."')";
if(mysqli_query($conn, $sql)){
	 header("Location:homepage.php");
}

 else{
 	echo "failed";
 }

?> 
