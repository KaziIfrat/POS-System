   <?php
   include 'dbms.php' ;
   
        $inv = $_GET['invoice'];
        $sid=$_GET['sid']; 
        $sql="DELETE FROM `sales` WHERE `sales_id` =$sid";
        $res=mysqli_query($conn,$sql);
        if(!$res)
            echo "error3";
        else
        {
          $sql1="SELECT * FROM `sales` WHERE invoice_no=$inv" ;
         $res1=mysqli_query($conn,$sql1);
         if(!$res1)
            echo "error3";
               $ro=mysqli_fetch_assoc($res1);
               $qty=$ro['quantty'];
               $amount=$ro['Amount'];
               $pid=$ro['product_id'];
            $sql2= "UPDATE `product` SET `Quantity_Left`= Quantity_Left+$qty ,`Total_BDT`=Total_BDT+$amount WHERE product_id=$pid" ;
            $res2= mysqli_query($conn,$sql2);
            if(!$res2)        
                 echo "error1" ;
            else
                header("location:sales.php?invoice=$inv");
            }
            
        

    
?>