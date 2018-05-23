<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Point of Sale</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<?php
$invoice=rand();
?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="Homepage.php">Point Of Sales</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sales">
          <a class="nav-link" href="sales.php?invoice=<?php echo $invoice ?>">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Sales</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
          <a class="nav-link" href="product.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Products</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customers">
          <a class="nav-link" href="customer.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Customers</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link" href="user.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
      </ul>
        
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
           <?php
            include 'dbms.php';
            session_start();

            if(!isset($_SESSION["user_name"])){
                header("location:index.php");
            }
                ?> 
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
         <a class="nav-link" data-toggle="modal" data-target="#WModal"><i class="fa fa-fw fa-user"></i> Welcome: <?php echo $_SESSION['user_name'] ?> </a>
        </li>
          
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
         
      </ul>
        
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
        
       <div class="nav-link">
          <h1 style="float: center; margin-left: 250px;"><i class="fa fa-fw fa-shopping-cart"></i>Sales Invoice</h1>
        </div>
        
        <div style="margin-left:75px; margin-top:60px;">
          <?php
          include 'dbms.php' ;
          if(isset($_POST['submit']) )
           {
           $cid=$_POST['cid'];
            $inv=$_GET['invoice'];
           $sql1="SELECT * FROM `customer` WHERE customer_id=$cid";    
           $res1=mysqli_query($conn,$sql1);
           if(!$res1)
              echo "error" ;
            else
            {
                while($ro=mysqli_fetch_assoc($res1))
                { ?>
            <h5>Customer name : <span style="display: inline; color:red; font-size: 20px; font-weight: normal;"><?php echo $ro['first_name'] ?></span></h5>
                      
          <?php }
            }
          } ?>
          <h5>Invoice number : <span style="display: inline;  font-size: 20px; font-weight: normal;"><?php echo $inv ?></span></h5>
        <h5>Date : <span style="display: inline;  font-size: 20px; font-weight: normal;"><?php echo date("y/m/d") ;?></span></h5>
                
        </div>

        
  <div class="row-fluid">
	   <div class="span5" style="float: left; margin-left: 75px;  margin-top: 60px;">
		
        <table class="table table-hover table-striped" id="resultTable" data-responsive="table">
        <thead>
            <tr>
                <th> Brand Name </th>
                <th> Generic </th>
                <th> Category </th>
                <th> Price </th>
                <th> Quantity </th>
                <th> Discount </th>
                <th> Amount </th>
                
                
            </tr>
        </thead>
        <tbody>
        
         <?php
          include 'dbms.php' ;
          if(isset($_POST['submit']) )
           {
            $cid=$_POST['cid'];
            $tk=$_POST['taka'];
           $inv=$_GET['invoice'];
           $sql="SELECT brand_name,Generic,Category,Selling_Price,quantty,Amount,profit FROM `product` NATURAL JOIN sales WHERE invoice_no=$inv" ;    
           $res=mysqli_query($conn,$sql);
           if(!$res)
              echo "error" ;
            while($row=mysqli_fetch_assoc($res))
            { ?>
           <tr>
               <td><?php echo $row['brand_name'] ?></td>
               <td><?php echo $row['Generic'] ?></td>
               <td><?php echo $row['Category'] ?></td>
               <td><?php echo $row['Selling_Price'] ?></td>
               <td><?php echo $row['quantty'] ?></td>
               <td>0.00</td>
               <td><?php echo $row['Amount'] ?> </td>
             
           </tr>
        
      <?php  } ?>
     
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			
			<th> Total : </th>
	
                    <?php 
                     $sql1="SELECT sum(Amount),sum(profit) FROM `product` NATURAL JOIN sales WHERE invoice_no=$inv" ;
                       $res1=mysqli_query($conn,$sql1);
                       if(!$res1)
                            echo "error" ;
                      else
                      {
                          $row=mysqli_fetch_assoc($res1);  ?>
               
                          <td colspan="1"><strong style="font-size: 20px; color: #222222;"> <?php echo $row['sum(Amount)'] ?> </strong></td>
                          
                 
         
            <tr>
             <th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
            <th> Cash Tendered:</th>
                <td><strong style="font-size: 20px; color: #222222;"><?php echo $tk ?></strong></td>
            </tr>
            
            <tr>
             <th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
            <th> Change:</th>
                <td><strong style="font-size: 20px; color: #222222;"><?php echo $tk-$row['sum(Amount)'] ?></strong></td>
            <?php 
                      }
          }?>
            </tr>
   
	</tbody>
</table>
        
		<button class="btn btn-secondary btn-lg btn-block" style="margin-left:1px; background-color: gray"; ><i class="fa fa-print"></i> Print</button><br>
		</div>
           
        </div>

      </div>
      
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
         
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
      
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Welcome Modal-->
    <div class="modal fade" id="WModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
               <?php
               include 'dbms.php' ;
                $uid=$_SESSION['user_id'];
               $sql="SELECT * FROM `user` WHERE user_id=$uid" ;
                $res=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($res); ?>
              <table>
                  <tr>
                      <th style="width: 150px;">UserID : </th>
                      <td><?php echo $row['user_id'] ?></td>
                  </tr>
                  <tr>
                      <th>User Name : </th>
                      <td><?php echo $row['user_name'] ?></td>
                  </tr>
                    <tr>
                      <th>Position : </th>
                      <td><?php echo $row['position'] ?></td>
                  </tr>
              </table>      
            </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
      
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>
<style>    
    
    #result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}

.suggestionsBox {
	position: absolute;
	left: 10px;
	margin: 0;
	width: 268px;
	top: 40px;
	padding:0px;
	background-color: #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}


.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
.combopopup{
	padding:3px;
	width:268px;
	border:1px #CCC solid;
}

    .btn-info {
    color: #fff;
    background-color: #28a745d6;
    border-color: rgba(0,123,255,.5);
}
#resultTable {
    border-collapse: separate;
	background-color: #FFFFFF;
    border-spacing: 0;
    max-width: 100%;
}
#resultTable {
	color: #666666;
    
	width: 100%;
	border: 1px solid black;
	
	margin-top: 13px;
}
#resultTable thead tr th {
    background: none repeat scroll 0 0 gray;
    color: #ffffff;
    padding: 10px 14px;
    text-align: left;
	border-top: 0 none;
	font-size: 13px;
}

#resultTable tbody tr td{
	font:  13px ;
	
    text-align: left;
	padding: 10px 14px;
	border-top: 1px solid #999999;
}

	#resultTable td{ 
		padding:7px; border:gray 1px solid;
	}
	#resultTable tr{
		background: #fff;
	}
   
	
    
</style>

</html>
