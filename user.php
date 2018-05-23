<!DOCTYPE html>
<?php
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Point Of Sale</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User</li>
      </ol>
        
        <div class="container">
            <div class="row">
               <div class="col-sm">
                   <a  href="register.html" class="btn btn-secondary btn-lg active" data-toggle="modal" data-target="#theModal"  role="button" aria-pressed="true">ADD USER</a>
                   </div>   
                </div>
            </div><br>
                   
                 <div class="modal fade" id="theModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                        
                      <div class="modal-body">
                          
                        <form method="post">
                          <div class="form-group">
                           
                            
                                <input class="form-control" id="uname" name="uname" type="text" aria-describedby="nameHelp" placeholder="Username"><br>
                             
                           
                                <input class="form-control" id="pos" name="pos" type="text" aria-describedby="nameHelp" placeholder="Position"><br>
                              </div>
                          
                        

                          <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-6">
                                
                                <input class="form-control" id="password1" name="password1" type="password" placeholder="Password">
                              </div>
                              <div class="col-md-6">
                                
                                <input class="form-control" id="password" name="password" type="password" placeholder="Confirm password">
                              </div>
                            </div>
                          </div>
                      <button type="submit" name="submit" class="btn btn-info">ADD USER</button>
                    </form>
                          <?php
                        include 'dbms.php';
                        if( isset($_POST['submit']) )
                        {
                            $uname=$_POST['uname'];
                            $pass=$_POST['password'];
                            $pos=$_POST['pos'];
                            
                
                            $sql="INSERT INTO `user`(`user_name`, `password`, position ) VALUES ('$uname','$pass','$pos')" ;

                            $res=mysqli_query($conn,$sql);
                            if(!$res)
                            {
                                echo "error";
                            }
                            else
                            {
                               header("location:user.php");

                            }


} ?>
             
                        </div>
                      
                      </div>
                     </div>
                   </div>
                   
                
            
        
      <!-- Example DataTables Card-->
       
      <div class="card mb-3">
          
        <div class="card-header">
          <i class="fa fa-user"></i>
          List of Customers
          </div>
        <div class="card-body">
          <div class="table-responsive">
              
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" on>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                 
                </tr>
              </thead>
                
             
                
              <tbody>
                  <?php
                  include 'dbms.php' ;
                  $sql="SELECT * FROM `user` WHERE 1" ;
                  $res=mysqli_query($conn,$sql);
                  if(!$res)
                      echo "error" ;
                  
                  while($row=mysqli_fetch_assoc($res))
                  {?>
                  <tr>
                  <td><?php echo $row['user_name'] ?></td>
                  <td><?php echo $row['position'] ?></td>
        
                  </tr>    
                  <?php }
                  ?>
    
              </tbody>
            </table>
              
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>
</html>
