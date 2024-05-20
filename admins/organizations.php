<?php

require_once "../config/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PainsBoard Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css"> -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.ico" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="dashboard.php?period=1"><img src="images/logo3_new.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php?period=1"><img src="images/logo3_new.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button> -->
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/user.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              
            <a href="index.php" class="dropdown-item" >
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
        </ul>
        
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php?period=1">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="organizations.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Organizations</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Resources</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="blogs.php">Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="ebooks.php">Free eBooks</a></li>
                <li class="nav-item"> <a class="nav-link" href="articles.php">Articles</a></li>
                <li class="nav-item"> <a class="nav-link" href="videos.php">Videos</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Organizations</h3>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Organizations List</p>
                  <div class="row">
                    <div class="col-12">
                      <!-- <div class="table-responsive"> -->
                      <table id="example2"  class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Registration No</th>
                                            <th>Email</th>
                                            <th>Contact Person</th>
                                            <th>Contact Person Phone No</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            
                                        $sql = "SELECT * FROM organization where status = '1'";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo "<tr>";
                                                            echo "<td>" . $row['org_name'] . "</td>";
                                                            echo "<td>" . $row['org_reg_number'] . "</td>";
                                                            echo "<td>" . $row['org_email'] . "</td>";
                                                            echo "<td>" . $row['contact_person'] . "</td>";
                                                            echo "<td>" . $row['contact_person_phone'] . "</td>";
                                                        // echo "<td>" . $row['event_organizer'] . "</td>";
                                                        // echo "<td><img src='https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=" . $row['event_id'] . "&choe=UTF-8'/></td>";
                                                            echo "<td width='15%'>";
                                                               
                                                                echo '<a href="participants.php?id='.$row['id'].'" class="mr-3" title="View Participant" data-toggle="tooltip"><span class="mdi mdi-account-multiple"></span></a>';
                                                                echo '<a href="subscriptions.php?id='.$row['id'].'" class="mr-3" title="View Subscriptions" data-toggle="tooltip"><span class="mdi mdi-account-card-details"></span></a>';
                                                                echo '<a href="api/extend_subscriptions.php?id='.$row['id'].'" class="mr-3" onclick="return confirm(\'Are you sure to extend '.$row['org_name'] .'?\')" title="Extend 1 year subscription" data-toggle="tooltip"><span class="mdi mdi-account-convert"></span></a>';
                                                                echo '<a href="api/delete_org.php?id='.$row['id'].'" onclick="return confirm(\'Are you sure to remove '.$row['org_name'] .'?\')" class="mr-3" title="Remove Organization" data-toggle="tooltip"><span class="mdi mdi-delete"></span></a>';
                                                            echo "</td>";
                                                        echo "</tr>";
                                                    }

                                                // Free result set
                                                mysqli_free_result($result);
                                            } 
                                            
                                        } 

                                        // Close connection
                                        mysqli_close($link);
                                    ?>
                                        
                                        
                                    </tbody>
                                
                            </table>
                      <!-- </div> -->
                    </div>
                  </div>
                  </div>
                </div>

                
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2022 All Rights Reserved by <a href="index.php">PainsBoard</a></span>
            
          </div>
         
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- <script src="vendors/chart.js/Chart.min.js"></script> -->
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- <script src="../assets/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/datatable/datatables/datatable.custom.js"></script> -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <script>
        $(document).ready(function() {
            $('#example2').DataTable();
        } );
    </script>
</body>

</html>

