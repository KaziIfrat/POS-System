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
          <a class="nav-link" href="Homepage.php">
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
          <a class="nav-link" href="#collapseExamplePages">
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
          <h1><i class="fa fa-fw fa-dashboard"></i>Dashboard</h1>
        </div>
        
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="Hompage.php">Dashboard</a>
        </li>
        
      </ol>
  
      
      <hr>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">No of Customers</div>
                <?php
               include 'dbms.php' ;
                $sql="SELECT count(customer_id) FROM `customer` WHERE 1" ;
                    $res=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($res);
                 ?>
                <h1><?php echo $row['count(customer_id)'] ?> </h1>
              </div>
          </div>
        </div>
              
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">Categories</div>
            </div>
            <span class="card-footer text-white clearfix small z-1" >
                <?php
               include 'dbms.php' ;
                $sql="SELECT category_name FROM `product_category` WHERE 1" ;
                    $res=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($res)){ ?>
              
                  <span><?php echo $row['category_name'] ?> |</span>
                <?php } ?>
              </span>
          </div>
        </div>
          
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">No of Products</div>
                <?php
               include 'dbms.php' ;
                $sql="SELECT count(product_id) FROM `product` WHERE 1" ;
                    $res=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($res);
                 ?>
                <h1><?php echo $row['count(product_id)'] ?> </h1>
              </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cart"></i>
              </div>
              <div class="mr-5">Total Sale</div>
                <?php
               include 'dbms.php' ;
                $sql="SELECT sum(Amount) FROM `sales` WHERE 1" ;
                    $res=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($res);
                 ?>
                <h1><?php echo $row['sum(Amount)'] ?> TK </h1>
              </div>
          </div>
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

</html>
