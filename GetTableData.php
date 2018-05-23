<?php
   include 'dbms.php' ;
   
  
    if(isset($_POST['submit']) )
    {
        $invoice = $_POST['invoice'];
        $pid=$_POST['product'];
        $qty=$_POST['qty'];
        $date=$_POST['date'];
        $sql="SELECT Quantity FROM `product` WHERE product_id=$pid";
        $res=mysqli_query($conn,$sql);
        if(!$res)
            echo "error";
        else
        {
            $row=mysqli_fetch_assoc($res);
            if($row['Quantity'] < $qty)
            {
                  $_SESSION['error'] = "Quantity available" + $row['Quantity']  ;
                     header("location:sales.php?invoice=$invoice");
            }
            else
            {
                
       
        $sql1="INSERT INTO `sales`( `invoice_no`, `product_id`, `quantty`,`Date`) VALUES ($invoice, $pid, $qty, '$date')";
        $res1=mysqli_query($conn,$sql1); 
         if(!$res)        
             echo "error" ;
                 
        else
        	header("location:sales.php?invoice=$invoice");

            
            }
        }

    }
?>
     