<?php
    session_start();
$s=$_SESSION['PID'];
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
    
   
    $total= $quantity * $selling_price;
    
    $sql="UPDATE `product` SET `brand_name`='$bname',`Generic`='$generic',`Category`='$category',`Date_Received`='$rdate',`Date_Expire`='$edate',`Original_Price`=$original_price,`Selling_Price`=$selling_price,`Quantity`=$quantity,`Quantity_Left`=$quantity,`Total_BDT`=$total WHERE product_id=$s" ;
        
    
    $res=mysqli_query($conn,$sql);
    if(!$res)
    {
        echo "error";
    }
    else
    {
       header("location:product.php");
  
    }
    
    
}