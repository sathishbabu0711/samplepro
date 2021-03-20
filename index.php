
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
	body{
/*		background-size:100%;
		background-image: url("images/img1.jpg");
		background-size: cover;
	   background-repeat:no-repeat;
*/	}

form{
	width:380px	;
 	margin:auto; 
 	/*opacity: 0.5;*/
 	/*padding-bottom: 70px;*/
 	/*height: 400px;*/
 }
 /*form{
 	height: 400px;
 }*/
 #main {

 	 background:rgba(255,255,255,0.7);
	/*border-radius: 1000px; 	*/
	box-shadow: 0px 0px 10px black;
 		margin-top: 140px;
 		margin-bottom: 159.5px;


 }

 #username,#password{
 	border-bottom: 1px solid black;
 	color:black;
 }

 #username:focus,#password:focus{
border:none;
/* 	border-bottom: 1px solid black;
*/ 	color:black;
 }
  #username:active,#password:active{
border:none;
/* 	border-bottom: 1px solid black;
*/ 	color:black;
 }

  /*#uname:visited,#pass:hover{
 	border-bottom: 1px solid black;
 	color:black;
 }*/
.a{
	background-color:#008080;

}
strong{

	opacity: 1;
	font-weight:bold;

}
.wrapper {
    text-align: center;
}
input[type='text']{
 margin:0 auto;
}
button {
    position: absolute;
    top: 50%;
   }
   a{
   	margin: 0px auto;
  	width:200px;
   	margin-top: 15px;
   	margin-right: 10px;
   }
</style>

</head>
<body>
<form id="main" method="post" action="login.php" class="" style="
    padding-bottom: 20px;
    border: none;
    border-radius: 10px;
">
	<center>
<div class="a" style="
    height: 30px;
">
<h5 class="card	 py-4" style="
    padding-top: 5px;
    color: white;
">
        <strong>LOGIN</strong>
    </h5>
    </div>
    <center>
    <div class="col-lg-12">

    <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="username" id="username" placeholder="Enter email">
  </div>
</div>
<div class="col-lg-12">

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password"  id="password" placeholder="Enter password">
  </div>
</div>
</center>
<input type="submit" class="btn btn-default btn-md active" role="button" name="but" aria-pressed="true" value="Log in"><br>
<a class="btn btn-danger   btn-md active" role="button" href="register.php" aria-pressed="true">Sign Up</a>

</center>

</form>


</body>
</html>


