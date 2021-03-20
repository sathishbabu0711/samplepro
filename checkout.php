<?php
include ('db_config.php');
session_start();
$sql="SELECT product.Product_Image,Addtocart.cartid,Addtocart.Productid,Addtocart.quantity,Addtocart.total_price,product.Product_Name,product.Price FROM `Addtocart`,`product`  WHERE Addtocart.Id='".$_SESSION['user_id']."' and Addtocart.Productid=product.Id"  ;
$result =mysqli_query($conn,$sql);

$sql1="select count(*) from `Addtocart` WHERE Id='".$_SESSION['user_id']."'";
$result1 =mysqli_query($conn,$sql1);

$sql3="select * from `user` WHERE Id='".$_SESSION['user_id']."'";
$result3 =mysqli_query($conn,$sql3);

$sql2="SELECT SUM(total_price) FROM `Addtocart`,`product`  WHERE Addtocart.Id='".$_SESSION['user_id']."' and Addtocart.Productid=product.Id"  ;
$result2 =mysqli_query($conn,$sql2);
?>
<html>
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    </style>
</head>

<body>
 <?php
 $row3=mysqli_fetch_array($result3);
  ?>
        
    <div class="invoice-box">
                            <div style="float: left;">
                               Address: <?php echo $row3['Address']; ?>
                            </div>
                            
                            <div style="float: right;">

                               Customer name  : <?php echo $row3['Username']; ?><br>
                			   Customer email :<?php echo $row3['Email']; ?><br>
                			   Contact no     :<?php echo $row3['Contact']; ?>
                            </div>

 
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Product bame</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
 <?php
  $j=1;
  while($row=mysqli_fetch_array($result))
  {
  ?>
 
    <tr>
      <th scope="row"><?php echo $j; ?></th>
                <td>
                   <?php echo $row['Product_Name'];?>
                </td>
            <td><?php echo $row['quantity'];?></td>    
                <td>
                   <?php echo $row['Price'];?>
                </td>
 
    </tr>

    <?php 
    $j++;
}
?>
<?php $row1=mysqli_fetch_array($result1) ;
$row2=mysqli_fetch_array($result2);
  // echo $row1['count(*)'];
?>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td>Total :</td>
      <td><?php echo $row2['SUM(total_price)'] ?> Rs</td>
    </tr>
  </tbody>
</table> 
<div>Payment method : Cash on Delivery</div>   
    </div>
</body>
</html>
