<?php
include 'dbms.php';
if( isset($_POST['submit']) )
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $pass=$_POST['password'];
    
    $sql="INSERT INTO `customer`(`first_name`, `last_name`, `email`, `phone`, `password`) VALUES ('$fname','$lname','$email','$phone','$pass')" ;
    $res=mysqli_query($conn,$sql);
    if(!$res)
    {
        echo "error";
    }
    else
    {
        header("location:customer.php");
  
    }
    
    
}
