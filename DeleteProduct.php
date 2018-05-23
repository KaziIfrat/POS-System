<?php
include 'dbms.php';

    $id=$_GET['q'];
    
    $sql="DELETE FROM `product` WHERE product_id=$id" ;
    $res=mysqli_query($conn,$sql);
    if(!$res)
    {
        echo "$sql";
    }
    else
    {
        header("location:product.php");
  
    }
    
    

