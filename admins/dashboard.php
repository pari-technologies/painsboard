<?php

require_once "../config/config.php";

$period = $_GET['period'];

$organization_count = 0;
$sub_organization_count = 0;
$participant_count = 0;
$complaint_count = 0;

$months = array("Jan","Feb","Mar","Apr","Mei","June","Jul","Aug","Sep","Oct","Nov","Dec");
$basic_gross = array("0","0","0","0","0","0","0","0","0","0","0","0");
$int_gross = array("0","0","0","0","0","0","0","0","0","0","0","0");
$adv_gross = array("0","0","0","0","0","0","0","0","0","0","0","0");

$org_arr = array("0","0","0","0","0","0","0","0","0","0","0","0");
$participant_arr = array("0","0","0","0","0","0","0","0","0","0","0","0");

$complaints_arr = array("0","0","0","0","0","0","0","0","0","0","0","0");
$comments_arr = array("0","0","0","0","0","0","0","0","0","0","0","0");

$local_org_arr = array("0","0","0","0","0","0","0","0","0","0","0","0");
$foreign_org_arr = array("0","0","0","0","0","0","0","0","0","0","0","0");

$basic_p = 1900;
$int_p = 4900;
$adv_p = 9900;

$basic_total = 0;
$int_total = 0;
$adv_total = 0;
$gross_total = 0;
$org_total = 0;
$participant_total = 0;
$complaints_total = 0;
$comments_total = 0;
$local_org_total = 0;
$foreign_org_total = 0;

$malaysia_total = 0;
$overseas_total = 0;

$today_date = date("Y/m/d");
if($period == "1"){
    $fortnight_date = date('Y/m/d', strtotime('-30 day', strtotime($today_date)));
    $show_fortnight_date = date('d/m/Y', strtotime('-30 day', strtotime($today_date)));
    $days_period = "30 days";
} if($period == "2"){
    $fortnight_date = date('Y/m/d', strtotime('-90 day', strtotime($today_date)));
    $show_fortnight_date = date('d/m/Y', strtotime('-90 day', strtotime($today_date))); 
    $days_period = "3 months";
} if($period == "3"){
    $fortnight_date = date('Y/m/d', strtotime('-180 day', strtotime($today_date)));
    $show_fortnight_date = date('d/m/Y', strtotime('-180 day', strtotime($today_date)));
    $days_period = "6 months";
} if($period == "4"){
    $fortnight_date = date('Y/m/d', strtotime('-365 day', strtotime($today_date)));
    $show_fortnight_date = date('d/m/Y', strtotime('-365 day', strtotime($today_date)));
    $days_period = "12 months";
}

$sql = "SELECT count(*) as org_count FROM organization where CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' and status = '1'";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $organization_count = $row['org_count'];

                  }
              }
          }

$sql = "SELECT COUNT(DISTINCT org_id) as org_count FROM subscription where sub_type != '30-Days FREE Trial' and sub_type != 'Free 1 Year' and CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."'";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $sub_organization_count = $row['org_count'];

                  }
              }
          }

$sql = "SELECT count(*) as par_count FROM users where CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' ";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $participant_count = $row['par_count'];

                  }
              }
          }

$sql = "SELECT count(*) as com_count FROM complaints where CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."'";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    $complaint_count = $row['com_count'];

                  }
              }
          }


$sql = "SELECT *, month(create_date) as months FROM subscription where CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."'";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    if($row['sub_type'] == "Basic"){
                      if($row['months'] == "1"){
                        $basic_gross[0]+=$basic_p;
                      }
                      if($row['months'] == "2"){
                        $basic_gross[1]+=$basic_p;
                      }
                      if($row['months'] == "3"){
                        $basic_gross[2]+=$basic_p;
                      }
                      if($row['months'] == "4"){
                        $basic_gross[3]+=$basic_p;
                      }
                      if($row['months'] == "5"){
                        $basic_gross[4]+=$basic_p;
                      }
                      if($row['months'] == "6"){
                        $basic_gross[5]+=$basic_p;
                      }
                      if($row['months'] == "7"){
                        $basic_gross[6]+=$basic_p;
                      }
                      if($row['months'] == "8"){
                        $basic_gross[7]+=$basic_p;
                      }
                      if($row['months'] == "9"){
                        $basic_gross[8]+=$basic_p;
                      }
                      if($row['months'] == "10"){
                        $basic_gross[9]+=$basic_p;
                      }
                      if($row['months'] == "11"){
                        $basic_gross[10]+=$basic_p;
                      }
                      if($row['months'] == "12"){
                        $basic_gross[11]+=$basic_p;
                      }

                      $basic_total += $basic_p;
                    }

                    if($row['sub_type'] == "Intermediate"){
                      if($row['months'] == "1"){
                        $int_gross[0]+=$int_p;
                      }
                      if($row['months'] == "2"){
                        $int_gross[1]+=$int_p;
                      }
                      if($row['months'] == "3"){
                        $int_gross[2]+=$int_p;
                      }
                      if($row['months'] == "4"){
                        $int_gross[3]+=$int_p;
                      }
                      if($row['months'] == "5"){
                        $int_gross[4]+=$int_p;
                      }
                      if($row['months'] == "6"){
                        $int_gross[5]+=$int_p;
                      }
                      if($row['months'] == "7"){
                        $int_gross[6]+=$int_p;
                      }
                      if($row['months'] == "8"){
                        $int_gross[7]+=$int_p;
                      }
                      if($row['months'] == "9"){
                        $int_gross[8]+=$int_p;
                      }
                      if($row['months'] == "10"){
                        $int_gross[9]+=$int_p;
                      }
                      if($row['months'] == "11"){
                        $int_gross[10]+=$int_p;
                      }
                      if($row['months'] == "12"){
                        $int_gross[11]+=$int_p;
                      }

                      $int_total += $int_p;
                    }


                    if($row['sub_type'] == "Advance"){
                      if($row['months'] == "1"){
                        $adv_gross[0]+=$adv_p;
                      }
                      if($row['months'] == "2"){
                        $adv_gross[1]+=$adv_p;
                      }
                      if($row['months'] == "3"){
                        $adv_gross[2]+=$adv_p;
                      }
                      if($row['months'] == "4"){
                        $adv_gross[3]+=$adv_p;
                      }
                      if($row['months'] == "5"){
                        $adv_gross[4]+=$adv_p;
                      }
                      if($row['months'] == "6"){
                        $adv_gross[5]+=$adv_p;
                      }
                      if($row['months'] == "7"){
                        $adv_gross[6]+=$adv_p;
                      }
                      if($row['months'] == "8"){
                        $adv_gross[7]+=$adv_p;
                      }
                      if($row['months'] == "9"){
                        $adv_gross[8]+=$adv_p;
                      }
                      if($row['months'] == "10"){
                        $adv_gross[9]+=$adv_p;
                      }
                      if($row['months'] == "11"){
                        $adv_gross[10]+=$adv_p;
                      }
                      if($row['months'] == "12"){
                        $adv_gross[11]+=$adv_p;
                      }

                      $adv_total += $adv_p;
                    }
                    
                    $gross_total = $basic_total + $int_total + $adv_total;

                  }
              }
          }


$sql = "SELECT count(*) as org_count, month(create_date) as months FROM organization where CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' group by month(create_date)";

          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    if($row['months'] == "1"){
                      $org_arr[0] = $row['org_count'];
                    }
                    if($row['months'] == "2"){
                      $org_arr[1] = $row['org_count'];
                    }
                    if($row['months'] == "3"){
                      $org_arr[2] = $row['org_count'];
                    }
                    if($row['months'] == "4"){
                      $org_arr[3] = $row['org_count'];
                    }
                    if($row['months'] == "5"){
                      $org_arr[4] = $row['org_count'];
                    }
                    if($row['months'] == "6"){
                      $org_arr[5] = $row['org_count'];
                    }
                    if($row['months'] == "7"){
                      $org_arr[6] = $row['org_count'];
                    }
                    if($row['months'] == "8"){
                      $org_arr[7] = $row['org_count'];
                    }
                    if($row['months'] == "9"){
                      $org_arr[8] = $row['org_count'];
                    }
                    if($row['months'] == "10"){
                      $org_arr[9] = $row['org_count'];
                    }
                    if($row['months'] == "11"){
                      $org_arr[10] = $row['org_count'];
                    }
                    if($row['months'] == "12"){
                      $org_arr[11] = $row['org_count'];
                    }

                    $org_total = max($org_arr);
                  }
              }
          }

$sql = "SELECT count(*) as user_count, month(create_date) as months FROM users where CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' group by month(create_date)";

          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    if($row['months'] == "1"){
                      $participant_arr[0] = $row['user_count'];
                    }
                    if($row['months'] == "2"){
                      $participant_arr[1] = $row['user_count'];
                    }
                    if($row['months'] == "3"){
                      $participant_arr[2] = $row['user_count'];
                    }
                    if($row['months'] == "4"){
                      $participant_arr[3] = $row['user_count'];
                    }
                    if($row['months'] == "5"){
                      $participant_arr[4] = $row['user_count'];
                    }
                    if($row['months'] == "6"){
                      $participant_arr[5] = $row['user_count'];
                    }
                    if($row['months'] == "7"){
                      $participant_arr[6] = $row['user_count'];
                    }
                    if($row['months'] == "8"){
                      $participant_arr[7] = $row['user_count'];
                    }
                    if($row['months'] == "9"){
                      $participant_arr[8] = $row['user_count'];
                    }
                    if($row['months'] == "10"){
                      $participant_arr[9] = $row['user_count'];
                    }
                    if($row['months'] == "11"){
                      $participant_arr[10] = $row['user_count'];
                    }
                    if($row['months'] == "12"){
                      $participant_arr[11] = $row['user_count'];
                    }

                    $participant_total = max($participant_arr);

                  }
              }
          }



$sql = "SELECT count(*) as complaints_count, month(create_date) as months FROM complaints where CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' group by month(create_date)";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          if($row['months'] == "1"){
            $complaints_arr[0] = $row['complaints_count'];
          }
          if($row['months'] == "2"){
            $complaints_arr[1] = $row['complaints_count'];
          }
          if($row['months'] == "3"){
            $complaints_arr[2] = $row['complaints_count'];
          }
          if($row['months'] == "4"){
            $complaints_arr[3] = $row['complaints_count'];
          }
          if($row['months'] == "5"){
            $complaints_arr[4] = $row['complaints_count'];
          }
          if($row['months'] == "6"){
            $complaints_arr[5] = $row['complaints_count'];
          }
          if($row['months'] == "7"){
            $complaints_arr[6] = $row['complaints_count'];
          }
          if($row['months'] == "8"){
            $complaints_arr[7] = $row['complaints_count'];
          }
          if($row['months'] == "9"){
            $complaints_arr[8] = $row['complaints_count'];
          }
          if($row['months'] == "10"){
            $complaints_arr[9] = $row['complaints_count'];
          }
          if($row['months'] == "11"){
            $complaints_arr[10] = $row['complaints_count'];
          }
          if($row['months'] == "12"){
            $complaints_arr[11] = $row['complaints_count'];
          }

          $complaints_total = max($complaints_arr);

        }
    }
}


$sql = "SELECT count(*) as comments_count, month(create_date) as months FROM complaints_comments where CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' group by month(create_date)";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          if($row['months'] == "1"){
            $comments_arr[0] = $row['comments_count'];
          }
          if($row['months'] == "2"){
            $comments_arr[1] = $row['comments_count'];
          }
          if($row['months'] == "3"){
            $comments_arr[2] = $row['comments_count'];
          }
          if($row['months'] == "4"){
            $comments_arr[3] = $row['comments_count'];
          }
          if($row['months'] == "5"){
            $comments_arr[4] = $row['comments_count'];
          }
          if($row['months'] == "6"){
            $comments_arr[5] = $row['comments_count'];
          }
          if($row['months'] == "7"){
            $comments_arr[6] = $row['comments_count'];
          }
          if($row['months'] == "8"){
            $comments_arr[7] = $row['comments_count'];
          }
          if($row['months'] == "9"){
            $comments_arr[8] = $row['comments_count'];
          }
          if($row['months'] == "10"){
            $comments_arr[9] = $row['comments_count'];
          }
          if($row['months'] == "11"){
            $comments_arr[10] = $row['comments_count'];
          }
          if($row['months'] == "12"){
            $comments_arr[11] = $row['comments_count'];
          }

          $comments_total = max($comments_arr);

        }
    }
}

$sql = "SELECT count(*) as org_count, month(create_date) as months FROM organization where contact_person_phone LIKE '+60%' and CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' and status='1' group by month(create_date)";

          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    if($row['months'] == "1"){
                      $local_org_arr[0] = $row['org_count'];
                    }
                    if($row['months'] == "2"){
                      $local_org_arr[1] = $row['org_count'];
                    }
                    if($row['months'] == "3"){
                      $local_org_arr[2] = $row['org_count'];
                    }
                    if($row['months'] == "4"){
                      $local_org_arr[3] = $row['org_count'];
                    }
                    if($row['months'] == "5"){
                      $local_org_arr[4] = $row['org_count'];
                    }
                    if($row['months'] == "6"){
                      $local_org_arr[5] = $row['org_count'];
                    }
                    if($row['months'] == "7"){
                      $local_org_arr[6] = $row['org_count'];
                    }
                    if($row['months'] == "8"){
                      $local_org_arr[7] = $row['org_count'];
                    }
                    if($row['months'] == "9"){
                      $local_org_arr[8] = $row['org_count'];
                    }
                    if($row['months'] == "10"){
                      $local_org_arr[9] = $row['org_count'];
                    }
                    if($row['months'] == "11"){
                      $local_org_arr[10] = $row['org_count'];
                    }
                    if($row['months'] == "12"){
                      $local_org_arr[11] = $row['org_count'];
                    }

                    $local_org_total = max($local_org_arr);
                    $malaysia_total += $row['org_count'];
                  }
              }
          }


$sql = "SELECT count(*) as org_count, month(create_date) as months FROM organization where contact_person_phone NOT LIKE '+60%' and CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' and status='1' group by month(create_date)";

          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    if($row['months'] == "1"){
                      $foreign_org_arr[0] = $row['org_count'];
                    }
                    if($row['months'] == "2"){
                      $foreign_org_arr[1] = $row['org_count'];
                    }
                    if($row['months'] == "3"){
                      $foreign_org_arr[2] = $row['org_count'];
                    }
                    if($row['months'] == "4"){
                      $foreign_org_arr[3] = $row['org_count'];
                    }
                    if($row['months'] == "5"){
                      $foreign_org_arr[4] = $row['org_count'];
                    }
                    if($row['months'] == "6"){
                      $foreign_org_arr[5] = $row['org_count'];
                    }
                    if($row['months'] == "7"){
                      $foreign_org_arr[6] = $row['org_count'];
                    }
                    if($row['months'] == "8"){
                      $foreign_org_arr[7] = $row['org_count'];
                    }
                    if($row['months'] == "9"){
                      $foreign_org_arr[8] = $row['org_count'];
                    }
                    if($row['months'] == "10"){
                      $foreign_org_arr[9] = $row['org_count'];
                    }
                    if($row['months'] == "11"){
                      $foreign_org_arr[10] = $row['org_count'];
                    }
                    if($row['months'] == "12"){
                      $foreign_org_arr[11] = $row['org_count'];
                    }

                    $foreign_org_total = max($foreign_org_arr);
                    $overseas_total += $row['org_count'];
                  }
              }
          }

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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.ico" />
  <style>
    /* basic positioning */
    .legend { list-style: none; }
    .legend li { float: left; margin-right: 10px; }
    .legend span { border: 1px solid #ccc; float: left; width: 12px; height: 12px; margin: 8px; }
    /* your colors */
    .legend .basic { background-color: #4747A1; }
    .legend .intermediate { background-color: #F09397; }
    .legend .advance { background-color: #008000; }
    .legend .malaysia { background-color: #4747A1; }
    .legend .overseas { background-color: #F09397; }
  </style>
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
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome Admin</h3>
                  <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <?php if($period == "1"){?>
                     <i class="mdi mdi-calendar"></i> 30 days
                      <?php }
                         if($period == "2"){
                      ?>
                       <i class="mdi mdi-calendar"></i> 3 months
                       <?php }
                         if($period == "3"){
                      ?>
                       <i class="mdi mdi-calendar"></i> 6 months
                       <?php }
                         if($period == "4"){
                      ?>
                       <i class="mdi mdi-calendar"></i> 12 months
                       <?php }
                        
                      ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="dashboard.php?period=1">30 days</a>
                      <a class="dropdown-item" href="dashboard.php?period=2">3 months</a>
                      <a class="dropdown-item" href="dashboard.php?period=3">6 months</a>
                      <a class="dropdown-item" href="dashboard.php?period=4">12 months</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-3 mb-3 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Registered Organizations</p>
                      <p class="fs-30 mb-2"><?php echo $organization_count;?></p>
                      <p>10.00% (<?php echo $days_period;?>)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-3 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Subscribed Organizations</p>
                      <p class="fs-30 mb-2"><?php echo $sub_organization_count;?></p>
                      <p>22.00% (<?php echo $days_period;?>)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-3 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Registered Participants</p>
                      <p class="fs-30 mb-2"><?php echo $participant_count;?></p>
                      <p>2.00% (<?php echo $days_period;?>)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-3 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Complaints</p>
                      <p class="fs-30 mb-2"><?php echo $complaint_count;?></p>
                      <p>0.22% (<?php echo $days_period;?>)</p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="row">
            
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Gross Revenue</p>
                    <p class="font-weight-500">Gross Revenue for <?php echo $days_period;?></p>
                    <div class="d-flex flex-wrap mb-5">
                      <div class="mr-5 mt-3">
                        <p class="text-muted">Basic</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?php echo $basic_total;?></h3>
                      </div>
                      <div class="mr-5 mt-3">
                        <p class="text-muted">Intermediate</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?php echo $int_total;?></h3>
                      </div>
                      <div class="mr-5 mt-3">
                        <p class="text-muted">Advance</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?php echo $adv_total;?></h3>
                      </div>
                      <div class="mt-3">
                        <p class="text-muted">Total</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?php echo $gross_total;?></h3>
                      </div> 
                    </div>
                    
                    <canvas id="revenue-chart"></canvas>
                    <ul class="legend">
                        <li><span class="basic"></span> Basic</li>
                        <li><span class="intermediate"></span> Intermediate</li>
                        <li><span class="advance"></span> Advance</li>
                    </ul>

                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="card-title">No of Participants & Organizations</p>
                    <!-- <a href="#" class="text-info">View all</a> -->
                  </div>
                    <p class="font-weight-500">The total number of participants & organizations within the date range.</p>
                    <div id="org-legend" class="chartjs-legend mt-4 mb-2"></div>
                    <canvas id="org-chart"></canvas>
                  </div>
                </div>
              </div>
            
          </div>
          <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="card-title">No of Complaints & Comments</p>
                    <!-- <a href="#" class="text-info">View all</a> -->
                  </div>
                    <p class="font-weight-500">The total number of complaints and comments within the date range.</p>
                    <div id="complaint-legend" class="chartjs-legend mt-4 mb-2"></div>
                    <canvas id="complaint-chart"></canvas>
                  </div>
                </div>
              </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">No of Organization based on location</p>
                    <p class="font-weight-500">The total number of organization based on location within the date range.</p>
                    <div class="d-flex flex-wrap mb-5">
                      <div class="mr-5 mt-3">
                        <p class="text-muted">Malaysia</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?php echo $malaysia_total;?></h3>
                      </div>
                      <div class="mr-5 mt-3">
                        <p class="text-muted">Overseas</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?php echo $overseas_total;?></h3>
                      </div>
                      <!-- <div class="mr-5 mt-3">
                        <p class="text-muted">Item 3</p>
                        <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                      </div>
                      <div class="mt-3">
                        <p class="text-muted">Total</p>
                        <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                      </div>  -->
                    </div>
                    <canvas id="location-chart"></canvas>
                    <ul class="legend">
                        <li><span class="malaysia"></span> Malaysia</li>
                        <li><span class="overseas"></span> Overseas</li>
                    </ul>
                  </div>
                </div>
              </div>
            
              
            
          </div>
          <div class="row">
            <!-- <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Detailed Reports</p>
                              <h1 class="text-primary">$34040</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                            </div>  
                            </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                    <tr>
                                      <td class="text-muted">Illinois</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Washington</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Mississippi</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">California</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Maryland</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Alaska</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                              <div class="col-md-6 mt-3">
                                <canvas id="north-america-chart"></canvas>
                                <div id="north-america-legend"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Detailed Reports</p>
                              <h1 class="text-primary">$34040</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                            </div>  
                            </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                    <tr>
                                      <td class="text-muted">Illinois</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Washington</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Mississippi</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">California</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Maryland</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Alaska</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                              <div class="col-md-6 mt-3">
                                <canvas id="south-america-chart"></canvas>
                                <div id="south-america-legend"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
          <!-- <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Top Products</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <tr>
                          <td>Search Engine Marketing</td>
                          <td class="font-weight-bold">$362</td>
                          <td>21 Sep 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                        </tr>
                        <tr>
                          <td>Search Engine Optimization</td>
                          <td class="font-weight-bold">$116</td>
                          <td>13 Jun 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                        </tr>
                        <tr>
                          <td>Display Advertising</td>
                          <td class="font-weight-bold">$551</td>
                          <td>28 Sep 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                        </tr>
                        <tr>
                          <td>Pay Per Click Advertising</td>
                          <td class="font-weight-bold">$523</td>
                          <td>30 Jun 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                        </tr>
                        <tr>
                          <td>E-Mail Marketing</td>
                          <td class="font-weight-bold">$781</td>
                          <td>01 Nov 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-danger">Cancelled</div></td>
                        </tr>
                        <tr>
                          <td>Referral Marketing</td>
                          <td class="font-weight-bold">$283</td>
                          <td>20 Mar 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                        </tr>
                        <tr>
                          <td>Social media marketing</td>
                          <td class="font-weight-bold">$897</td>
                          <td>26 Oct 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">To Do Lists</h4>
									<div class="list-wrapper pt-2">
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom">
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Meeting with Urban Team
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li class="completed">
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" checked>
														Duplicate a project for new customer
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Project meeting with CEO
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li class="completed">
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" checked>
														Follow up of team zilla
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Level up for Antony
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
										</ul>
                  </div>
                  <div class="add-items d-flex mb-0 mt-2">
										<input type="text" class="form-control todo-list-input"  placeholder="Add new task">
										<button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
									</div>
								</div>
							</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Projects</p>
                  <div class="table-responsive">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th class="pl-0  pb-2 border-bottom">Places</th>
                          <th class="border-bottom pb-2">Orders</th>
                          <th class="border-bottom pb-2">Users</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="pl-0">Kentucky</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">65</span>(2.15%)</p></td>
                          <td class="text-muted">65</td>
                        </tr>
                        <tr>
                          <td class="pl-0">Ohio</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">54</span>(3.25%)</p></td>
                          <td class="text-muted">51</td>
                        </tr>
                        <tr>
                          <td class="pl-0">Nevada</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">22</span>(2.22%)</p></td>
                          <td class="text-muted">32</td>
                        </tr>
                        <tr>
                          <td class="pl-0">North Carolina</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">46</span>(3.27%)</p></td>
                          <td class="text-muted">15</td>
                        </tr>
                        <tr>
                          <td class="pl-0">Montana</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">17</span>(1.25%)</p></td>
                          <td class="text-muted">25</td>
                        </tr>
                        <tr>
                          <td class="pl-0">Nevada</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">52</span>(3.11%)</p></td>
                          <td class="text-muted">71</td>
                        </tr>
                        <tr>
                          <td class="pl-0 pb-0">Louisiana</td>
                          <td class="pb-0"><p class="mb-0"><span class="font-weight-bold mr-2">25</span>(1.32%)</p></td>
                          <td class="pb-0">14</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Charts</p>
                      <div class="charts-data">
                        <div class="mt-3">
                          <p class="mb-0">Data 1</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="progress progress-md flex-grow-1 mr-4">
                              <div class="progress-bar bg-inf0" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">5k</p>
                          </div>
                        </div>
                        <div class="mt-3">
                          <p class="mb-0">Data 2</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="progress progress-md flex-grow-1 mr-4">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">1k</p>
                          </div>
                        </div>
                        <div class="mt-3">
                          <p class="mb-0">Data 3</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="progress progress-md flex-grow-1 mr-4">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">992</p>
                          </div>
                        </div>
                        <div class="mt-3">
                          <p class="mb-0">Data 4</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="progress progress-md flex-grow-1 mr-4">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">687</p>
                          </div>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
                <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                  <div class="card data-icon-card-primary">
                    <div class="card-body">
                      <p class="card-title text-white">Number of Meetings</p>                      
                      <div class="row">
                        <div class="col-8 text-white">
                          <h3>34040</h3>
                          <p class="text-white font-weight-500 mb-0">The total number of sessions within the date range.It is calculated as the sum . </p>
                        </div>
                        <div class="col-4 background-icon">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Notifications</p>
                  <ul class="icon-data-list">
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face1.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">Isabella Becker</p>
                          <p class="mb-0">Sales dashboard have been created</p>
                          <small>9:30 am</small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face2.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">Adam Warren</p>
                          <p class="mb-0">You have done a great job #TW111</p>
                          <small>10:30 am</small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                      <img src="images/faces/face3.jpg" alt="user">
                     <div>
                      <p class="text-info mb-1">Leonard Thornton</p>
                      <p class="mb-0">Sales dashboard have been created</p>
                      <small>11:30 am</small>
                     </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face4.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">George Morrison</p>
                          <p class="mb-0">Sales dashboard have been created</p>
                          <small>8:50 am</small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face5.jpg" alt="user">
                        <div>
                        <p class="text-info mb-1">Ryan Cortez</p>
                        <p class="mb-0">Herbs are fun and easy to grow.</p>
                        <small>9:00 am</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Advanced Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>Quote#</th>
                              <th>Product</th>
                              <th>Business type</th>
                              <th>Policy holder</th>
                              <th>Premium</th>
                              <th>Status</th>
                              <th>Updated at</th>
                              <th></th>
                            </tr>
                          </thead>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                
              </div>
            </div>
        </div> -->
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
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="js/dashboard.js"></script> -->
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  <script>
    (function($) {
  'use strict';
  $(function() {
    if ($("#revenue-chart").length) {
      var areaData = {
        labels: <?php echo json_encode($months); ?>,
        datasets: [
          {
            data: <?php echo json_encode($basic_gross);?>,
            borderColor: [
              '#4747A1'
            ],
            borderWidth: 2,
            fill: false,
            label: "Basic"
          },
          {
            data: <?php echo json_encode($int_gross);?>,
            borderColor: [
              '#F09397'
            ],
            borderWidth: 2,
            fill: false,
            label: "Intermediate"
          },
          {
            data: <?php echo json_encode($adv_gross);?>,
            borderColor: [
              '#008000'
            ],
            borderWidth: 2,
            fill: false,
            label: "Advance"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              padding: 10,
              fontColor:"#6C7383"
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 1000,
              min: 0,
              max: <?php echo max(array($basic_total, $int_total, $adv_total));?>,
              padding: 18,
              fontColor:"#6C7383"
            },
            gridLines: {
              display: true,
              color:"#f2f2f2",
              drawBorder: false
            }
          }],
         
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: .35
          },
          point: {
            radius: 0
          }
        }
      }
      var revenueChartCanvas = $("#revenue-chart").get(0).getContext("2d");
      
      var revenueChart = new Chart(revenueChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
      
    }
    
    if ($("#org-chart").length) {
      var SalesChartCanvas = $("#org-chart").get(0).getContext("2d");
      var SalesChart = new Chart(SalesChartCanvas, {
        type: 'bar',
        data: {
          labels:  <?php echo json_encode($months); ?>,
          datasets: [{
              label: 'Organizations',
              data: <?php echo json_encode($org_arr); ?>,
              backgroundColor: '#98BDFF'
            },
            {
              label: 'Participants',
              data: <?php echo json_encode($participant_arr); ?>,
              backgroundColor: '#4B49AC'
            }
          ]
        },
        options: {
          cornerRadius: 5,
          responsive: true,
          maintainAspectRatio: true,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 20,
              bottom: 0
            }
          },
          scales: {
            yAxes: [{
              display: true,
              gridLines: {
                display: true,
                drawBorder: false,
                color: "#F2F2F2"
              },
              ticks: {
                display: true,
                min: 0,
                max: <?php echo max(array($participant_total, $org_total));?>,
                callback: function(value, index, values) {
                  return  value  ;
                },
                autoSkip: true,
                maxTicksLimit: 10,
                fontColor:"#6C7383"
              }
            }],
            xAxes: [{
              stacked: false,
              ticks: {
                beginAtZero: true,
                fontColor: "#6C7383"
              },
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
                display: false
              },
              barPercentage: 1
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        },
      });
      document.getElementById('org-legend').innerHTML = SalesChart.generateLegend();
    }

    if ($("#complaint-chart").length) {
      var SalesChartCanvas = $("#complaint-chart").get(0).getContext("2d");
      var SalesChart = new Chart(SalesChartCanvas, {
        type: 'bar',
        data: {
          labels:  <?php echo json_encode($months); ?>,
          datasets: [{
              label: 'Complaints',
              data: <?php echo json_encode($complaints_arr); ?>,
              backgroundColor: '#98BDFF'
            },
            {
              label: 'Comments',
              data: <?php echo json_encode($comments_arr); ?>,
              backgroundColor: '#4B49AC'
            }
          ]
        },
        options: {
          cornerRadius: 5,
          responsive: true,
          maintainAspectRatio: true,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 20,
              bottom: 0
            }
          },
          scales: {
            yAxes: [{
              display: true,
              gridLines: {
                display: true,
                drawBorder: false,
                color: "#F2F2F2"
              },
              ticks: {
                display: true,
                min: 0,
                max: <?php echo max(array($comments_total, $complaints_total));?>,
                callback: function(value, index, values) {
                  return  value  ;
                },
                autoSkip: true,
                maxTicksLimit: 10,
                fontColor:"#6C7383"
              }
            }],
            xAxes: [{
              stacked: false,
              ticks: {
                beginAtZero: true,
                fontColor: "#6C7383"
              },
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
                display: false
              },
              barPercentage: 1
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        },
      });
      document.getElementById('complaint-legend').innerHTML = SalesChart.generateLegend();
    }

    if ($("#location-chart").length) {
      var areaData = {
        labels: <?php echo json_encode($months); ?>,
        datasets: [
          {
            data: <?php echo json_encode($local_org_arr);?>,
            borderColor: [
              '#4747A1'
            ],
            borderWidth: 2,
            fill: false,
            label: "Malaysia"
          },
          {
            data: <?php echo json_encode($foreign_org_arr);?>,
            borderColor: [
              '#F09397'
            ],
            borderWidth: 2,
            fill: false,
            label: "Overseas"
          }
          
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              padding: 10,
              fontColor:"#6C7383"
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 1000,
              min: 0,
              max: <?php echo max(array($local_org_total, $foreign_org_total));?>,
              padding: 18,
              fontColor:"#6C7383"
            },
            gridLines: {
              display: true,
              color:"#f2f2f2",
              drawBorder: false
            }
          }],
         
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: .35
          },
          point: {
            radius: 0
          }
        }
      }
      var revenueChartCanvas = $("#location-chart").get(0).getContext("2d");
      var revenueChart = new Chart(revenueChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }
   
   
    

    


  
  });
})(jQuery);

  </script>
</body>

</html>

