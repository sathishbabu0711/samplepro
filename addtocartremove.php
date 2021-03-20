<?php 

include ('db_config.php');
session_start();

$sql="DELETE from Addtocart WHERE cartid='".$_GET['cart_id']."' and Id='".$_SESSION['user_id']."'";
if(mysqli_query($conn, $sql)){
	 header("Location:cart.php");
}

 else{
 	echo "failed";
 }

?> 
