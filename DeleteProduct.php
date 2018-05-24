<?php
include 'dbms.php';

    $id=$_GET['q'];
    
    $sql4="DELETE FROM `product` WHERE product_id=$id " ;
    $res4=mysqli_query($conn,$sql4);
    if(!$res4)
    {
        echo "$sql4";
    }
    else
    {
        header("location:product.php");
  
    }
    
    

