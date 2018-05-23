<?php
include 'dbms.php';
if( isset($_POST['submit']) )
{
    $bname=$_POST['bname'];
    $generic=$_POST['generic'];
    $category=$_POST['category'];
    $rdate=$_POST['rdate'];
    $edate=$_POST['edate'];
    $original_price=$_POST['original_price'];
    $selling_price=$_POST['selling_price'];
    $quantity=$_POST['quantity'];
    

    $total= $quantity *  $selling_price;
    
    $sql="INSERT INTO `product`(`brand_name`, `Generic`, `Category`, `Date_Received`, `Date_Expire`, `Original_Price`, `Selling_Price`, `Quantity`, `Quantity_Left`, `Total_BDT`) VALUES ('$bname','$generic','$category','$rdate','$edate',$original_price,$selling_price,$quantity,$quantity,$total)" ;
    
    $res=mysqli_query($conn,$sql);
    if(!$res)
    {
        echo "error";
    }
    else
    {
       header("location:product.php");
  
    }
    
    
} ?>
