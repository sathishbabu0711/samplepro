<?php
include ('db_config.php');
session_start();
$username=$_POST['username'];

// echo $username;

$_SESSION['username']=$username;
$password=$_POST['password'];

$email=$_POST['email'];
echo $_POST['address'];
echo $_POST['contact'];
$sql="INSERT INTO `user`(`Username`,`Password`,`Email`,`Address`,`Contact`)VALUES('".$username."','".$password."','".$email."','".$_POST['address']."','".$_POST['contact']."')";
if(mysqli_query($conn, $sql)){
	 header("Location:login.php");
}

 else{
 	echo "failed";
 }

?> 