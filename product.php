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
  <title>Point of Sales</title>
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
        
         <div class="nav-link">
          <h1><i class="fa fa-fw fa-list"></i>Products</h1>
        </div>
        
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Products</li>
      </ol>
        
          <div class="container">
            <div class="row">
               <div class="col-sm">
                   <a  href="#" class="btn btn-secondary btn-lg active" data-toggle="modal" data-target="#PModal"  role="button" aria-pressed="true">ADD PRODUCT</a>
                   </div>   
                </div>
            </div><br>
                   
                 <div class="modal fade" id="PModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close" >
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                        
                      <div class="modal-body">
                          
                        <form method="post" action="product_details.php">
                          <div class="form-group">
                           
                                <input class="form-control" id="Bname" name="bname" type="text" aria-describedby="nameHelp" placeholder="Enter Brand name"><br>
                              
                                
                                <input class="form-control" id="generic" name="generic" type="text" aria-describedby="nameHelp" placeholder="Generic"><br>
                              
                            
                            
                              <select  class="form-control" name="category">
                                   <?php
                                      include 'dbms.php' ;
                                      $sql="SELECT category_name FROM `product_category` WHERE 1" ;
                                      $res=mysqli_query($conn,$sql);
                                      if(!$res)
                                          echo "error" ;
                                  
                                      while($row=mysqli_fetch_assoc($res))
                                        {?>
                                      <option value="<?php echo $row['category_name'] ?> "> <?php echo $row['category_name'] ?></option>
                                      <?php
                                        } ?>
                               </select> <br>
                           
                              
                            Arrival Date:
                            <input class="form-control" id="rdate" name="rdate" type="date" aria-describedby="emailHelp" placeholder="Arrival Date"><br>
                             Expire Date: 
                            <input class="form-control" id="edate" name="edate" type="date" aria-describedby="emailHelp" placeholder="Expire Date"><br>
                          
                            <input class="form-control" id="original_price" name="original_price" type="number" step="0.01" aria-describedby="emailHelp" placeholder="Original Price BDT"><br>
                             
                            <input class="form-control" id="selling_price" name="selling_price" type="number" step="0.01" aria-describedby="emailHelp" placeholder="Selling Price BDT"><br>
                              
                            <input class="form-control" id="quantity" name="quantity" type="number" aria-describedby="emailHelp" placeholder="Ouantity Received"><br>

                            <button type="submit" name="submit" class="btn btn-info">Save Changes</button>
                              
                        </div>
                            </form>
                                
                        </div>
                      </div>
                     </div>
                      </div>
                  
                     
                   
                
            
        
      <!-- Example DataTables Card-->
       
      <div class="card mb-3">
          
        <div class="card-header">
          <i class="fa fa-list"></i>
          List of Products
          </div>
        <div class="card-body">
          <div class="table-responsive col-md-12">
              
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" on>
              <thead>
                <tr>
                  <th>Brand Name</th>
                  <th>Generic</th>
                  <th>Category</th>
                  <th>Arrival Date</th>
                  <th>Expire Date</th>
                  <th>Original Price</th>
                  <th>Selling price</th>
                  <th>Quantity Received</th>
                  <th>Quantity Left</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
            
              <tbody>
                  <?php
                  include 'dbms.php' ;
                  $sql="SELECT * FROM `product` WHERE 1" ;
                  $res=mysqli_query($conn,$sql);
                  if(!$res)
                      echo "error" ;
                  
                  while($row=mysqli_fetch_assoc($res))
                  {?>
                  <tr>
                  <td><?php echo $row['brand_name'] ?></td>
                  <td><?php echo $row['Generic'] ?></td>
                  <td><?php echo $row['Category'] ?></td>
                  <td><?php echo $row['Date_Received'] ?></td>
                  <td><?php echo $row['Date_Expire'] ?></td>
                  <td><?php echo $row['Original_Price'] ?></td>
                  <td><?php echo $row['Selling_Price'] ?></td>
                  <td><?php echo $row['Quantity'] ?></td>
                  <td><?php echo $row['Quantity_Left'] ?></td>
                  <td><?php echo $row['Quantity_Left']*$row['Selling_Price'] ?></td>
                 <td>
                     <a href="#" name="<?php echo $row['product_id'] ?>"  data-toggle="modal" data-target="#EModal" aria-hidden="true"><i class="fa fa-edit" ></i></a>  &nbsp
                     
                     <a href="#" name="<?php echo $row['product_id'] ?>"  data-toggle="modal" data-target="#DModal" aria-hidden="true"><i class="fa fa-trash" ></i> </a>    
         
                </td>
                     
                      
                    <!-- Delete Modal-->
                    <div class="modal fade" id="DModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sure want to delete?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>

                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="DeleteProduct.php?q=<?php echo $row['product_id'] ?>">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                    <!-- Edit Modal-->
                  <div class="modal fade" id="EModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close" >
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                        
                      <div class="modal-body">
                          
                        <form method="post" action="Editproduct.php">
                          <div class="form-group">
                                <?php
                               
                                      $_SESSION['PID']=$row['product_id'];
                                      $p=$row['product_id'];
                                      $sql1="SELECT * FROM `product` WHERE product_id=$p" ;
                                      $res1=mysqli_query($conn,$sql1);
                                      if(!$res1)
                                          echo "error" ;
                                  
                                      while($ro=mysqli_fetch_assoc($res1))
                                        {?>
                           
                                 Brandname:  
                                <input class="form-control" id="Bname" name="bname" type="text" value="<?php echo $ro['brand_name'] ?>">  <br>
                              
                                Generic:
                                <input class="form-control" id="generic" name="generic" type="text"  value="<?php echo $ro['Generic']?>"><br>
                            
                                <select  class="form-control" name="category">
                                   <?php
                                      include 'dbms.php' ;
                                      $sql2="SELECT category_name FROM `product_category` WHERE 1" ;
                                      $res2=mysqli_query($conn,$sql2);
                                      if(!$res2)
                                          echo "error" ;
                                  
                                      while($row2=mysqli_fetch_assoc($res2))
                                        {?>
                                       <option value="<?php echo $row2['category_name'] ?> "> <?php echo $row2['category_name'] ?></option>
                                      <?php
                                        } ?>
                               </select> <br>
                            Arrival Date:
                            <input class="form-control" id="rdate" name="rdate" type="date" value="<?php echo $ro['Date_Received'] ?>"><br>
                             Expire Date: 
                            <input class="form-control" id="edate" name="edate" type="date" value="<?php echo $ro['Date_Expire'] ?>" ><br>
                            
                            Original price:
                            <input class="form-control" id="original_price" name="original_price" type="number" step="0.01" value="<?php echo $ro['Original_Price'] ?>"><br>
                            
                            Selling Price:
                            <input class="form-control" id="selling_price" name="selling_price" type="number" step="0.01" value="<?php echo $ro['Selling_Price'] ?>"><br>
                              
                            Quantity Received:
                            <input class="form-control" id="quantity" name="quantity" type="number" value="<?php echo $ro['Quantity']?>"><br>
                              
                    <?php } ?>

                            <button type="submit" name="submit" class="btn btn-info">Save Changes</button>
                        </div>
                            </form>
                                
                        </div>
                      </div>
                     </div>
                      </div>
                    
                  </tr>    
                  <?php
                                        
                  }
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
    <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>

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
