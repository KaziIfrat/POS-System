   <?php
   include 'dbms.php' ;
   
        $inv = $_GET['invoice'];
        $sid=$_GET['sid']; 
       $sql="SELECT * FROM `sales` WHERE sales_id=$sid" ;
     
        $res=mysqli_query($conn,$sql);
        if(!$res)
            echo "error3";
        else
        {
            $row=mysqli_fetch_assoc($res);
            $pid=$row['product_id'];
            $qty=$row['quantty'];
            $amount=$row['Amount'];
          
        $sql1="DELETE FROM `sales` WHERE `sales_id` =$sid";
         $res1=mysqli_query($conn,$sql1);
         if(!$res1)
            echo "$sql1";
             
            
            $sql2= "UPDATE `product` SET `Quantity_Left`= Quantity_Left+$qty ,`Total_BDT`=Total_BDT+$amount WHERE product_id=$pid" ;
            $res2= mysqli_query($conn,$sql2);
            if(!$res2)        
                 echo "$pid" ;
            else
                header("location:sales.php?invoice=$inv");
            }
            
        

    
?>