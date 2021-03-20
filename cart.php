<?php
include ('db_config.php');
session_start();
$sql="SELECT product.Product_Image,Addtocart.cartid,Addtocart.Productid,Addtocart.quantity,Addtocart.total_price,product.Product_Name,product.Price FROM `Addtocart`,`product`  WHERE Addtocart.Id='".$_SESSION['user_id']."' and Addtocart.Productid=product.Id"  ;
$result =mysqli_query($conn,$sql);

$sql1="select count(*) from `Addtocart` WHERE Id='".$_SESSION['user_id']."'";
$result1 =mysqli_query($conn,$sql1);

$sql2="SELECT SUM(total_price) FROM `Addtocart`,`product`  WHERE Addtocart.Id='".$_SESSION['user_id']."' and Addtocart.Productid=product.Id"  ;
$result2 =mysqli_query($conn,$sql2);
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<style type="text/css">
.tales {
  width: 100%;
}
.carousel-inner{
  width:100%;
  max-height: 240px !important;
}
</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SHOPPING</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
      <!-- <li class="nav-item   " style="float: right;"> -->
      
      <!--   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->
    </ul>
   <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div style="
    padding-left: 10px;
">Welcome <?php echo $_SESSION['username'];?></div>
      <a class="nav-link " href="#" >
<span class="material-icons">
shopping_cart
</span>
<?php $row1=mysqli_fetch_array($result1) ;
$row2=mysqli_fetch_array($result2);
  echo $row1['count(*)'];
?>
        </a>

  </div>
</nav>
<div >

</div>

<div class="" data-spy="scroll" data-target="#navbar-example2" data-offset="0">
<div class="row">
  <div class="col-10">
<h5 style="
    padding: 10px;
    font-size: 25px;
">Your cart items</h5>
</div>
<div class="col" style="
    padding-top: 10px;">
<!-- <a href="buynow.php" type="button" class="btn btn-success">Buy now</a> -->
</div>
</div>
<div class="row" style="
    height: 400px;
    overflow-y: scroll;
    overflow-x: hidden;
    box-shadow: 0px 0px 5px black;
">
 <?php
  $j=1;
  while($row=mysqli_fetch_array($result))
  {
  ?>
<div class="card col-2"  style="width: 18rem;padding-bottom: 10px;margin: 20px;padding-top: 10px;height: max-content;">
<img class="card-img-top" style="margin-left:30px;width: 150px;height: 150px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Product_Image']); ?>" alt="Card image cap">
   
 <div class="card-body">
    <h5 class="card-title"><center><?php echo $row['Product_Name'];?></center></h5>
<center><p class="card-text" style="color: red"><?php echo $row['Price'];?> rs x <?php echo $row['quantity'];?> qty = <?php echo $row['total_price'];?> rs</p></center>
 
  </div>
  <center>
  <div class="">
    <a href="addtocartremove.php?cart_id=<?php echo $row['cartid']; ?>" class="btn btn-danger">Remove</a>
  </div>
  </center>
</div>
<?php 
}
?>
</div>
</div>
<div class="row">
 
<div class="col-12" style="
    padding-top: 10px;float: right;">
<span><h4 style="
    text-align: right;
    margin-right: 60px;
">Total : <?php echo $row2['SUM(total_price)'] ?> Rs</h4></span>
</div>
<div class="col-12" style=" padding-top: 10px;float: right;">
<a style="
    text-align: right;
    margin-right: 60px;
    float: right;
" href="checkout.php" type="button" class="btn btn-success">Buy now</a>
</div>
</div>
</body>
</html>