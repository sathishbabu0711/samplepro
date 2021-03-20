<?php
include ('db_config.php');
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

// echo($_SESSION['username']);
$sql="SELECT * FROM `user`";
$res=mysqli_query($conn,$sql);
// print_r($res);
// $row=mysqli_fetch_array($res);
// print_r($row['username']);
$flag=0;
while($row=mysqli_fetch_array($res))
{
	if($row['Email']==$username and $row['Password']==$password) {
	$flag=1;
	$_SESSION['user_id']=$row['Id'];
		$_SESSION['username']=$row['Username'];
		header("Location:homepage.php");
	}
	}
	if($flag==0){	
	header ("Location:index.php");
}


?>