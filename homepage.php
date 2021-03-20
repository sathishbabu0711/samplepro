<?php
include ('db_config.php');
session_start();
$sql="select * from `product` ORDER BY Category ASC"  ;
$result =mysqli_query($conn,$sql);

$sql1="select count(*) from `Addtocart` WHERE Id='".$_SESSION['user_id']."'";
$result1 =mysqli_query($conn,$sql1);
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

.sliders{
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
        <a class="nav-link" href="homepage.php">Home <span class="sr-only"></span></a>
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
      <a class="nav-link " href="cart.php" >
<span class="material-icons">
shopping_cart
</span>
<?php $row1=mysqli_fetch_array($result1) ;
  echo $row1['count(*)'];
?>
        </a>

  </div>
</nav>
<div >
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 sliders" src="images/banner2.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 sliders" src="images/banner3.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 sliders" src="images/banner4.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="row">
 <?php
  $j=1;
  $cat="";
  while($row=mysqli_fetch_array($result))
  {

    if($cat!=$row['Category']){
        echo "<hr>";
        echo "<div class='col-12'><h3 style='text-align:center;padding-top: 10px'>";
          echo $row['Category'];
        echo "</h3></div>";
      }
  ?>

<div class="card col-2"  style="width: 18rem;padding-bottom: 10px;margin: 20px;padding-top: 10px">
  <form action="addtocart.php" method="POST">

  <img class="card-img-top" style="margin-left:30px;width: 150px;height: 150px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Product_Image']); ?>" alt="Card image cap">
  <div class="card-body" style="padding-bottom: 0px">
    <center><span class="card-title" ><?php echo $row['Product_Name'];?> <span class="card-text" style="color: red"> - <?php echo $row['Price'];?> rs</span></span></center>
 <div class="col-lg-12">

    <div class="form-group">
    <input type="text" class="form-control" name="qty" id="qty" style="
    margin-top: 10px;
" placeholder="Enter quantity">
  </div>
</div>
<input type="hidden" name="price" value="<?php echo $row['Price']; ?>">

<input type="hidden" name="product_id" value="<?php echo $row['Id']; ?>">
<!-- <center><p>Total price - <span id="totalprice"></span></p></center> -->
  </div>
  <center>
  <div class="">
    <input type="submit" class="btn btn-info" value="Add to cart">
  </div>
  </center>

</form>
</div>
<?php
$cat=$row['Category'];
    // echo $cat; 
}
?>
</div>
</body>
</html>