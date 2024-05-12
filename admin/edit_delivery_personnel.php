

<!DOCTYPE html>
<html lang="en">
<?php
// Include the database connection file
include("../connection/connect.php");

// Check if the form is submitted for updating delivery personnel
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    
    // Update delivery person in the database
    $sql = "UPDATE delivery_persons SET name='$name', phone='$phone', email='$email' WHERE id='$id'";
    if (mysqli_query($db, $sql)) {
        header("Location: manage_delivery_personnel.php");
        exit();
    } else {
        echo "Error updating delivery person: " . mysqli_error($db);
    }
}

// Fetch delivery person details based on ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM delivery_persons WHERE id='$id'";
    $result = mysqli_query($db, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $personnel = mysqli_fetch_assoc($result);
    } else {
        echo "Delivery person not found.";
        // Handle error or redirect accordingly
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
                                <h4 class="m-b-0 text-white">All Restaurant</h4>
                            </div>
								
                                <div>
                                    
<!-- Form to edit delivery personnel -->
<form method="post">
    <input type="hidden" name="id" value="<?php echo isset($personnel['id']) ? $personnel['id'] : ''; ?>">
    <input type="text" name="name" value="<?php echo isset($personnel['name']) ? $personnel['name'] : ''; ?>" required><br>
    <input type="text" name="phone" value="<?php echo isset($personnel['phone']) ? $personnel['phone'] : ''; ?>" required><br>
    <input type="email" name="email" value="<?php echo isset($personnel['email']) ? $personnel['email'] : ''; ?>" required><br>
    <input type="submit" name="submit" value="Update Personnel">
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
 
