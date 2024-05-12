





<!DOCTYPE html>
<html lang="en">
<?php
// Include the database connection file
include("../connection/connect.php");

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    // Perform database query
    $sql = "INSERT INTO delivery_persons (name, phone, email) VALUES ('$name', '$phone', '$email')";
    $result = mysqli_query($db, $sql); // Use $db for executing queries
    
    if ($result) {
        // Redirect or display success message
        header("Location: manage_delivery_personnel.php");
        exit();
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($db);
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Restaurants</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar">
  
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
   
    <div id="main-wrapper">
       
         <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        
                        <span>ON DEMAND FOOD DELIVERY</span>
                    </a>
                </div>
                <div class="navbar-collapse">
           
                    <ul class="navbar-nav mr-auto mt-md-0">
               
                        
                     
                       
                    </ul>
             
                    <ul class="navbar-nav my-lg-0">

                       
                    
                        <li class="nav-item dropdown">
                           
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                     
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ON DEMAND FOOD DELIVERY</a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                   
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
  
        <div class="left-sidebar">
          
            <div class="scroll-sidebar">
        
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Restaurants</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_restaurant.php">All Restaurant</a></li>
								<li><a href="add_category.php">Add Category</a></li>
                                <li><a href="add_restaurant.php">Add Restaurant</a></li>
                                
                            </ul>
                        </li>
                        <li> 
    <a class="has-arrow" href="#" aria-expanded="false">
        <i class="fa fa-users"></i><span>Delivery Personnel</span>
    </a>
    <ul aria-expanded="false" class="collapse">
        <li><a href="manage_delivery_personnel.php">Manage Personnel</a></li>
        <li><a href="add_delivery_personnel.php">Add New Personnel</a></li>
    </ul>
</li>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Menues</a></li>
								<li><a href="add_menu.php">Add Menu</a></li>
                              
                                
                            </ul>
                        </li>
                      <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Menues</a></li>
								<li><a href="add_menu.php">Add Menu</a></li>
                              
                                
                            </ul>
                        </li>
						 <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                         
                    </ul>
                </nav>
            
            </div>
    
        </div>
     
        <div class="page-wrapper">

            
        
            <div class="container-fluid">
         
                <div class="row">
                    <div class="col-12">
                        
                       
                      
                       
						
						
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Delivery Persons</h4>
                            </div>
								
                                <div>                               



                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                    <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Delivery Person Name</label>
                                                    <input type="text" name="name" placeholder="Name" required>
                                                   </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Phone No</label>
                                                    <input type="text" name="phone" placeholder="Phone" required><br>
                                                    </div>
                                            </div>
                                     
                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email </label>
                                                    <input type="email" name="email" placeholder="Email" required><br>
                                                   </div>
                                            </div>
                                  
                                      
                                            <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Add Personnel"> 
                                       
                                    </div>
    
    </form>

 
                                </div>
                            </div>
                        </div>
												
						
						
						
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
         
            <footer class="footer"> © 2024 - On Demand food Delivery </footer>
     
        </div>

    </div>
   
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>
