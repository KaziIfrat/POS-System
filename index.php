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
</head>

<body id="page-top">
           
       <?php
            include 'dbms.php';
            session_start();

            if(isset($_SESSION["user_name"])){
                header("location:Homepage.php");
            }
                ?> 
   
    <div class="jumbotron">
    <h2 style="text-align: center;">Point Of Sales</h2>
    </div> 
   <div class="content-wrapper">
    <div class="container-fluid">
      
         <div class="card" style="width: 50rem;">
        <div class="card-header">
          <i class="fa fa-user"></i>
          User Login
          </div>
             
        <div class="card-body">
               <form method="post">
                          <div class="form-group">
                           
                                
                                <input class="form-control" id="uname" name="uname" type="text" aria-describedby="nameHelp" placeholder="Username"><br>
                              
                                
                                <input class="form-control" id="pass" name="pass" type="password" aria-describedby="nameHelp" placeholder="Password"><br>
                            
                            <button type="submit" name="submit" class="btn btn-info">Login</button><br>
                        </div>
                        </form>
            
              <?php
                include 'dbms.php';
                if( isset($_POST['submit']) )
                {
                    $uname=$_POST['uname'];
                    $pass=$_POST['pass'];

                    $sql="SELECT user_id, user_name FROM user WHERE user_name='$uname' AND password='$pass'" ;
                    $res=mysqli_query($conn,$sql);
                    if(!$row=mysqli_fetch_assoc($res) )
    	             {
                        echo "<script>alert('Invalid Login. Try again');</script>" ;
                      }
                    else
                    {
                        session_start();
                        $_SESSION['user_name']=$row['user_name'];
                        $_SESSION['user_id']=$row['user_id'];
                        header("location:Homepage.php");

                    }


                } ?>
        
    
          </div>
             
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
