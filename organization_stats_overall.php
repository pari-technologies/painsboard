<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "config/config.php";

$id = $_GET['id'];
$year_count = [];
$cat_count = [];
$res_count = [];
$colcount = "1";
$company_name = "";

$sql = "SELECT * FROM organization where id = '".$id."'";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $company_name = $row['org_name'];

                        }
                    }
                    // else{
                    //     $total_complaints = "0";
                    // }
                }

$sql7 = "SELECT year(create_date) as year_count FROM complaints where org_id = '".$id."' group by year(create_date)";
                if($result7 = mysqli_query($link, $sql7)){
                    if(mysqli_num_rows($result7) > 0){
                        while($row7 = mysqli_fetch_assoc($result7)){
                            $year_count[] = $row7['year_count'];
                        }
                    }
                    $colcount = count($year_count);
                   
                }

$sql8 = "SELECT * from complaints_type where org_id = '".$id."' order by name";
                if($result8 = mysqli_query($link, $sql8)){
                    if(mysqli_num_rows($result8) > 0){
                        while($row8 = mysqli_fetch_assoc($result8)){
                            $cat_count[] = $row8;
                        }
                    }
                   
                }

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/font-size/css/rvfs.css">
    <!-- icon css-->
    <link rel="stylesheet" href="assets/elagent-icon/style.css">
    <link rel="stylesheet" href="assets/font-awesome/css/all.css">
    <link rel="stylesheet" href="assets/niceselectpicker/nice-select.css">
    <link rel="stylesheet" href="assets/animation/animate.css">
    <link rel="stylesheet" href="assets/prism/prism.css">
    <link rel="stylesheet" href="assets/prism/prism-coy.css">
    <link rel="stylesheet" href="assets/mcustomscrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>PainsBoard</title>
    <link rel="stylesheet" href="scss/_header.scss">
    <link rel="stylesheet" href="scss/_doclist.scss">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <style>
        th {
        border-top: 1px solid #dddddd;
        border-bottom: 1px solid #dddddd;
        border-right: 1px solid #dddddd;
        }
        
        th:first-child {
        border-left: 1px solid #dddddd;
        }
        </style>
</head>

<body data-spy="scroll" data-target="#navbar-example3" data-offset="86" class="full-width-doc sticky-nav-doc doc">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="img/logo_painsboard/logo3.jpeg" alt="" height="80">
                </div>
            </div>
            <!-- <h2 class="head">Did You Know?</h2>
            <p></p> -->
        </div>
    </div>
    <div class="body_wrapper sticky_menu">
        <nav class="navbar navbar-expand-lg menu_one display_none" id="stickyTwo">
            <div class="container-fluid pl-60 pr-60">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo_painsboard/logo3.jpeg"  alt="logo" height="50">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu_toggle">
                        <span class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="hamburger-cross">
                            <span></span>
                            <span></span>
                        </span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav menu ml-auto">
                        <li class="nav-item dropdown submenu active">
                            <a href="index.php" class="nav-link dropdown-toggle" >Home</a>
                            
                        </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="api/org_logout.php" class="nav-link dropdown-toggle" >Logout</a>
                            
                        </li>
  
                    </ul>
                    <ul class="list-unstyled menu_social">
                        <li class="search">
                            <form action="#" method="get" class="search_form">
                                <input type="search" class="form-control" placeholder="Search for">
                                <button type="submit"><i class="icon_search"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mobile_main_menu" id="sticky">
            <div class="container">
                <div class="mobile_menu_left">
                    <button type="button" class="navbar-toggler mobile_menu_btn">
                        <span class="menu_toggle ">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>
                    <!-- <a class="navbar-brand" href="index.html">
                        <img src="img/logo.png" srcset="img/logo-w2x.png 2x" alt="logo">
                    </a> -->
                </div>
                <div class="mobile_menu_right">
                    <form action="#" method="get" class="search_form">
                        <input type="search" class="form-control" placeholder="Search for">
                        <button type="submit"><i class="icon_search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="click_capture"></div>
        <div class="side_menu">
            <div class="mobile_menu_header">
                <div class="close_nav">
                    <i class="arrow_left"></i>
                    <i class="icon_close"></i>
                </div>
                <!-- <div class="mobile_logo">
                    <a href="#"><img src="img/logo.png" alt="logo"></a>
                </div> -->
            </div>
            <div class="mobile_nav_wrapper">
                <nav class="mobile_nav_top">
                    <ul class="navbar-nav menu ml-auto">
                        <li class="nav-item dropdown submenu">
                            <a href="index.php" class="nav-link dropdown-toggle" >Home</a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
                        </li>
                        <li class="nav-item dropdown submenu">
                        <a href="api/org_logout.php" class="nav-link dropdown-toggle" >Logout</a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
                        </li>
                      

                    </ul>
                </nav>

                <div class="mobile_nav_bottom">
                    <aside class="doc_left_sidebarlist">
                    <div class="scroll">
                                <ul class="list-unstyled nav-sidebar">
                                    <li class="nav-item">
                                        <a href="organization_profile.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/home.png" alt="">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="organization_participant.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/account.png" alt="">Participant</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="organization_subscription.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/document2.png" alt="">Subscription Status</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><img src="img/side-nav/briefcase.png" alt="briefcase">Organization Profile</a>
                                        <span class="icon"><i class="arrow_carrot-down"></i></span>
                                        <ul class="list-unstyled dropdown_nav">
                                            <li><a href="organization_detail.php?id=<?php echo $id;?>">View Profile</a></li>
                                            <li><a href="organization_logo.php?id=<?php echo $id;?>">Change Logo</a></li>
                                            <li><a href="organization_password.php?id=<?php echo $id;?>" >Change Password</a></li>
                                        </ul>
                                    </li>
                                </ul>
                               
                                <ul class="list-unstyled nav-sidebar coding_nav">
                                    <li class="nav-item">
                                        <a href="organization_complaint_category.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/document.png" alt="">Concern Category</a><i class="fa fa-info-circle" style="display: inline-block;top: 0;right: 20px;line-height: 20px;font-size: 18px;position: absolute;" data-container="body" data-toggle="popover" data-placement="right" data-content="Complaint Categories should be based on your organization value chain. It should covers four main key areas, namely the organization culture, internal processes, marketing and customers.  An example of a university value chain categories are administration, human resources, marketing, finance, facilities, academic, and R&D."></i>
                                    </li>
                                    <li class="nav-item">
                                        <a href="organization_participant_category.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/account.png" alt="">Participant Category</a><i class="fa fa-info-circle" style="display: inline-block;top: 0;right: 20px;line-height: 20px;font-size: 18px;position: absolute;" data-container="body" data-toggle="popover" data-placement="right" data-content="Participant Categories should be based on your organization’s stakeholders. It should covers internal and external stakeholders.  Examples of a university participant categories are undergraduate students, postgraduate students, academic staff, administrative & support staff, alumni, parents, employers, and the public"></i>
                                    </li>
                                </ul>

                                <ul class="list-unstyled nav-sidebar coding_nav">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><img src="img/side-nav/briefcase.png" alt="briefcase">Announcements</a>
                                        <span class="icon"><i class="arrow_carrot-down"></i></span>
                                        <ul class="list-unstyled dropdown_nav">
                                            <li><a href="organization_statement.php?id=<?php echo $id;?>">Statements</a></li>
                                            <li><a href="organization_books.php?id=<?php echo $id;?>">Books</a></li>
                                            <li><a href="organization_ebooks.php?id=<?php echo $id;?>" >Free eBooks</a></li>
                                            <li><a href="organization_articles.php?id=<?php echo $id;?>" >Articles</a></li>
                                            <!-- <li><a href="organization_videos.php?id=<?php echo $id;?>" >Videos</a></li> -->
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="organization_stats_overall.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/book.png" alt="">Statistics</a>
                                        </li>
                                        <li class="nav-item">
                                        <a href="organization_stats_issue_summary.php?id=<?php echo $id;?>&period=1" class="nav-link"><img src="img/side-nav/book.png" alt="">Summary of Issues</a>
                                        </li>
                                        <li class="nav-item">
                                        <a href="organization_stats_trending.php?id=<?php echo $id;?>&period=1" class="nav-link"><img src="img/side-nav/book.png" alt="">Trending Data</a>
                                        </li>
                                </ul>
                                
                                
                            </div>
                    </aside>
                </div>

                
            </div>
        </div>
        <section class="doc_documentation_area doc_documentation_full_area body_fixed">
            <div class="overlay_bg"></div>
            <div class="container-fluid pl-60 pr-60">
                <div class="row">
                    <div class="col-lg-2 doc_mobile_menu">
                        <aside class="doc_left_sidebarlist">
                            <div class="scroll">
                                <ul class="list-unstyled nav-sidebar">
                                    <li class="nav-item">
                                        <a href="organization_profile.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/home.png" alt="">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="organization_participant.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/account.png" alt="">Participant</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="organization_subscription.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/document2.png" alt="">Subscription Status</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><img src="img/side-nav/briefcase.png" alt="briefcase">Organization Profile</a>
                                        <span class="icon"><i class="arrow_carrot-down"></i></span>
                                        <ul class="list-unstyled dropdown_nav">
                                            <li><a href="organization_detail.php?id=<?php echo $id;?>">View Profile</a></li>
                                            <li><a href="organization_logo.php?id=<?php echo $id;?>">Change Logo</a></li>
                                            <li><a href="organization_password.php?id=<?php echo $id;?>" >Change Password</a></li>
                                        </ul>
                                    </li>
                                </ul>
                               
                                <ul class="list-unstyled nav-sidebar coding_nav">
                                    <li class="nav-item">
                                        <a href="organization_complaint_category.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/document.png" alt="">Concern Category</a><i class="fa fa-info-circle" style="display: inline-block;top: 0;right: 20px;line-height: 20px;font-size: 18px;position: absolute;" data-container="body" data-toggle="popover" data-placement="right" data-content="Complaint Categories should be based on your organization value chain. It should covers four main key areas, namely the organization culture, internal processes, marketing and customers.  An example of a university value chain categories are administration, human resources, marketing, finance, facilities, academic, and R&D."></i>
                                    </li>
                                    <li class="nav-item">
                                        <a href="organization_participant_category.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/account.png" alt="">Participant Category</a><i class="fa fa-info-circle" style="display: inline-block;top: 0;right: 20px;line-height: 20px;font-size: 18px;position: absolute;" data-container="body" data-toggle="popover" data-placement="right" data-content="Participant Categories should be based on your organization’s stakeholders. It should covers internal and external stakeholders.  Examples of a university participant categories are undergraduate students, postgraduate students, academic staff, administrative & support staff, alumni, parents, employers, and the public"></i>
                                    </li>
                                </ul>

                                <ul class="list-unstyled nav-sidebar coding_nav">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><img src="img/side-nav/briefcase.png" alt="briefcase">Announcements</a>
                                        <span class="icon"><i class="arrow_carrot-down"></i></span>
                                        <ul class="list-unstyled dropdown_nav">
                                            <li><a href="organization_statement.php?id=<?php echo $id;?>">Statements</a></li>
                                            <li><a href="organization_books.php?id=<?php echo $id;?>">Books</a></li>
                                            <li><a href="organization_ebooks.php?id=<?php echo $id;?>" >Free eBooks</a></li>
                                            <li><a href="organization_articles.php?id=<?php echo $id;?>" >Articles</a></li>
                                            <!-- <li><a href="organization_videos.php?id=<?php echo $id;?>" >Videos</a></li> -->
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                    <a href="organization_stats_overall.php?id=<?php echo $id;?>" class="nav-link"><img src="img/side-nav/book.png" alt="">Statistics</a>
                                </li>
                                <li class="nav-item">
                                <a href="organization_stats_issue_summary.php?id=<?php echo $id;?>&period=1" class="nav-link"><img src="img/side-nav/book.png" alt="">Summary of Issues</a>
                                        </li>
                                <li class="nav-item">
                                <a href="organization_stats_trending.php?id=<?php echo $id;?>&period=1" class="nav-link"><img src="img/side-nav/book.png" alt="">Trending Data</a>
                                </li>
                                </ul>
                                
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div id="post" class="documentation_info">
     
                            <article class="documentation_body" id="documentation">
                                <h4>Overall Trend of KPPI over the Years</h4>
                                <b>Name of Organization:</b> <?php echo $company_name;?><br>
                                <b>Date of Report:</b> <?php echo date("d/m/Y");?>
                                <table id="example" class="display cell-border" style="width:100%">
                                    <thead>
                                        <!-- <tr>
                                            <td colspan="<?php echo $colcount+2;?>" >
                                                Name of Organization: <?php echo $company_name;?><br>
                                                Date of Report: <?php echo date("d/m/Y");?>

                                            </td>
                                        </tr> -->
                                        
                                    
                                        <tr>
                                            <th rowspan="2" >Category</th>
                                            <th rowspan="2" >Indicator</th>
                                            <th colspan="<?php echo $colcount;?>">Year </th>
                                        </tr>
                                        <tr>
                                       
                                            <?php
                                            $sql6 = "SELECT year(create_date) as year_count FROM complaints where org_id = '".$id."' group by year(create_date)";
                                            if($result6 = mysqli_query($link, $sql6)){
                                                if(mysqli_num_rows($result6) > 0){
                                                    while($row6 = mysqli_fetch_array($result6)){
                                                        echo '<th><a style="color:blue" href="organization_stats_details.php?id='.$id.'&year='.$row6['year_count'].'">'.$row6['year_count'].'</a></th>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
                                    <?php
                            
                                        $total_kppi_2021 = 0;
                                        $total_resolved_kppi_2021 = 0;
                                        $total_net_kppi_2021 = 0;

                                        $total_kppi_2022 = 0;
                                        $total_resolved_kppi_2022 = 0;
                                        $total_net_kppi_2022 = 0;

                                        $total_kppi_2023 = 0;
                                        $total_resolved_kppi_2023 = 0;
                                        $total_net_kppi_2023 = 0;

                                        $total_kppi_2024 = 0;
                                        $total_resolved_kppi_2024 = 0;
                                        $total_net_kppi_2024 = 0;

                                        $total_kppi_2025 = 0;
                                        $total_resolved_kppi_2025 = 0;
                                        $total_net_kppi_2025 = 0;

                                        $total_kppi_2026 = 0;
                                        $total_resolved_kppi_2026 = 0;
                                        $total_net_kppi_2026 = 0;

                                        $total_kppi_2027 = 0;
                                        $total_resolved_kppi_2027 = 0;
                                        $total_net_kppi_2027 = 0;

                                        $total_kppi_2028 = 0;
                                        $total_resolved_kppi_2028 = 0;
                                        $total_net_kppi_2028 = 0;

                                        $total_kppi_2029 = 0;
                                        $total_resolved_kppi_2029 = 0;
                                        $total_net_kppi_2029 = 0;

                                        $total_kppi_2030 = 0;
                                        $total_resolved_kppi_2030 = 0;
                                        $total_net_kppi_2030 = 0;
                                        $sql = "SELECT category as cat,complaints_type.name as cat_name,year(complaints.create_date) as year_count,count(*) as kppi ,(SELECT count(*) from complaints where org_id ='".$id."' and status='Resolved' and category=cat and year(complaints.create_date)=year_count) as resolved_kppi , ((SELECT count(*) from complaints where org_id = '".$id."' and category=cat and year(complaints.create_date)=year_count) - (SELECT count(*) from complaints where org_id ='".$id."' and status='Resolved' and category=cat and year(complaints.create_date)=year_count)) as net_kppi FROM complaints left join complaints_type on complaints.category = complaints_type.id where complaints.org_id = '".$id."' group by category,year(complaints.create_date)";
                                        // echo $sql;
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_assoc($result)){
                                                        // echo "<tr>";
                                                        // echo '<td >'.$row['cat'].'</td>
                                                        //       </tr>';
                                                        $res_count[] = $row;
                                                        if($row['year_count']=="2021"){
                                                            $total_kppi_2021 += $row['kppi'];
                                                            $total_resolved_kppi_2021 += $row['resolved_kppi'];
                                                            $total_net_kppi_2021 =  $total_kppi_2021 - $total_resolved_kppi_2021;
                                                        }

                                                        else if($row['year_count']=="2022"){
                                                            $total_kppi_2022 += $row['kppi'];
                                                            $total_resolved_kppi_2022 += $row['resolved_kppi'];
                                                            $total_net_kppi_2022 =  $total_kppi_2022 - $total_resolved_kppi_2022;
                                                        }

                                                        else if($row['year_count']=="2023"){
                                                            $total_kppi_2023 += $row['kppi'];
                                                            $total_resolved_kppi_2023 += $row['resolved_kppi'];
                                                            $total_net_kppi_2023 =  $total_kppi_2023 - $total_resolved_kppi_2023;
                                                        }

                                                        else if($row['year_count']=="2024"){
                                                            $total_kppi_2024 += $row['kppi'];
                                                            $total_resolved_kppi_2024 += $row['resolved_kppi'];
                                                            $total_net_kppi_2024 =  $total_kppi_2024 - $total_resolved_kppi_2024;
                                                        }

                                                        else if($row['year_count']=="2025"){
                                                            $total_kppi_2025 += $row['kppi'];
                                                            $total_resolved_kppi_2025 += $row['resolved_kppi'];
                                                            $total_net_kppi_2025 =  $total_kppi_2025 - $total_resolved_kppi_2025;
                                                        }

                                                        else if($row['year_count']=="2026"){
                                                            $total_kppi_2026 += $row['kppi'];
                                                            $total_resolved_kppi_2026 += $row['resolved_kppi'];
                                                            $total_net_kppi_2026 =  $total_kppi_2026 - $total_resolved_kppi_2026;
                                                        }

                                                        else if($row['year_count']=="2027"){
                                                            $total_kppi_2027 += $row['kppi'];
                                                            $total_resolved_kppi_2027 += $row['resolved_kppi'];
                                                            $total_net_kppi_2027 =  $total_kppi_2027 - $total_resolved_kppi_2027;
                                                        }

                                                        else if($row['year_count']=="2028"){
                                                            $total_kppi_2028 += $row['kppi'];
                                                            $total_resolved_kppi_2028 += $row['resolved_kppi'];
                                                            $total_net_kppi_2028 =  $total_kppi_2028 - $total_resolved_kppi_2028;
                                                        }

                                                        else if($row['year_count']=="2029"){
                                                            $total_kppi_2029 += $row['kppi'];
                                                            $total_resolved_kppi_2029 += $row['resolved_kppi'];
                                                            $total_net_kppi_2029 =  $total_kppi_2029 - $total_resolved_kppi_2029;
                                                        }

                                                        else if($row['year_count']=="2030"){
                                                            $total_kppi_2030 += $row['kppi'];
                                                            $total_resolved_kppi_2030 += $row['resolved_kppi'];
                                                            $total_net_kppi_2030 =  $total_kppi_2030 - $total_resolved_kppi_2030;
                                                        }
                                                        
                                                        
                                                        
                                                       
                                                        //     echo "<td>" . $row['title'] . "</td>";
                                                        //     echo "<td>" . $row['message'] . "</td>";
                                                        //     echo "<td>" . $row['category'] . "</td>";
                                                        //     echo "<td>" . $row['status'] . "</td>";
                                                        // // echo "<td>" . $row['event_organizer'] . "</td>";
                                                        // // echo "<td><img src='https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=" . $row['event_id'] . "&choe=UTF-8'/></td>";
                                                        //     echo "<td width='20%'>";
                                                        //         echo '<a href="#" class="mr-3" title="Show Complaint" data-toggle="modal" data-target="#myModal" onclick="showComplaint(\''. $row['title'] .'\',\''. $row['category'] .'\',\''. $row['keyword1'] .'\',\''. $row['keyword2'] .'\',\''. $row['keyword3'] .'\',\''. $row['message'] .'\',\''. $row['solution'] .'\')"><span class="fa fa-eye"></span></a>';
                                                        //     echo "</td>";
                                                        // echo "</tr>";
                                                    }
                                                    for($k=0;$k< count($cat_count);$k++){
                                                        // for($j=0;$j<count($res_count);$j++){
                                                            
                                                            // if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] ){
                                                                echo '<tr>
                                                                    <td rowspan="3">'.$cat_count[$k]['name'].'</td>
                                                                        <td>KPPI</td>';
                                                                        
                                                                        $kppi_21 = "0";
                                                                        if(in_array("2021", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2021"){
                                                                                    $kppi_21 = $res_count[$j]['kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                           
                                                                            echo '<td>';
                                                                            echo $kppi_21;
                                                                            echo '</td>';
                                                                        }
                                                                       
                                                                        
                                                                        $kppi_22 = "0";
                                                                        if(in_array("2022", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2021"){
                                                                                    $kppi_22 = $kppi_22 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2022"){
                                                                                    $kppi_22 += $res_count[$j]['kppi'];
                                                                                  
                                                                                }
                                                                                
                                                                                
                                                                                
                                                                            }
                                                                            echo '<td>';
                                                                            echo $kppi_22;
                                                                            echo '</td>';
                                                                        }

                                                                        $kppi_23 = "0";
                                                                        if(in_array("2023", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2021"){
                                                                                    $kppi_23 = $kppi_23 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2022"){
                                                                                    $kppi_23 = $kppi_23 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2023"){
                                                                                    $kppi_23 += $res_count[$j]['kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            echo '<td>';
                                                                            echo $kppi_23;
                                                                            echo '</td>';
                                                                        }

                                                                        $kppi_24 = "0";
                                                                        if(in_array("2024", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2021"){
                                                                                    $kppi_24 = $kppi_24 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2022"){
                                                                                    $kppi_24 = $kppi_24 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2023"){
                                                                                    $kppi_24 = $kppi_24 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2024"){
                                                                                    $kppi_24 += $res_count[$j]['kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            echo '<td>';
                                                                            echo $kppi_24;
                                                                            echo '</td>';
                                                                        }

                                                                        $kppi_25 = "0";
                                                                        if(in_array("2025", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2021"){
                                                                                    $kppi_25 = $kppi_25 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2022"){
                                                                                    $kppi_25 = $kppi_25 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2023"){
                                                                                    $kppi_25 = $kppi_25 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2024"){
                                                                                    $kppi_25 = $kppi_25 + ($res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi']);
                                                                                   
                                                                                }
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2025"){
                                                                                    $kppi += $res_count[$j]['kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            echo '<td>';
                                                                            echo $kppi_25;
                                                                            echo '</td>';
                                                                        }
                                                                        
                                                                                                  
                                                                    echo '</tr>';
                                                                echo '<tr>
                                                                        <td style="display: none;"></td>
                                                                        <td>KPPI Resolved</td>';
                                                                       
                                                                        $resolved_kppi = "0";
                                                                        if(in_array("2021", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2021"){
                                                                                    $resolved_kppi = $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            echo '<td>';
                                                                            echo $resolved_kppi;
                                                                            echo '</td>';
                                                                       
                                                                        }
                                                                       
                                                                       
                                                                        $resolved_kppi = "0";
                                                                        if(in_array("2022", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2022"){
                                                                                    $resolved_kppi = $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            echo '<td>';
                                                                            echo $resolved_kppi;
                                                                            echo '</td>';
                                                                        }

                                                                        $resolved_kppi = "0";
                                                                        if(in_array("2023", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2023"){
                                                                                    $resolved_kppi = $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            echo '<td>';
                                                                            echo $resolved_kppi;
                                                                            echo '</td>';
                                                                        }

                                                                        $resolved_kppi = "0";
                                                                        if(in_array("2024", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2024"){
                                                                                    $resolved_kppi = $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            echo '<td>';
                                                                            echo $resolved_kppi;
                                                                            echo '</td>';
                                                                        }

                                                                        $resolved_kppi = "0";
                                                                        if(in_array("2025", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2025"){
                                                                                    $resolved_kppi = $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            echo '<td>';
                                                                            echo $resolved_kppi;
                                                                            echo '</td>';
                                                                        }
                                                                       
                                                                    echo '</tr>';
                                                                echo '<tr>
                                                                        <td style="display: none;"></td>
                                                                        <td>Net KPPI</td>';
                                                                        
                                                                        $net_kppi_21 = "0";
                                                                        if(in_array("2021", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2021"){
                                                                                    $net_kppi_21 = $res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                               
                                                                            }
                                                                            echo '<td><label id="net_kppi_21_'.$k.'">';
                                                                            echo $net_kppi_21;
                                                                            echo '</label></td>';
                                                                       
                                                                        }
                                                                       
                                                                       
                                                                        $net_kppi_22 = "0";
                                                                        if(in_array("2022", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2022"){
                                                                                    $net_kppi_22 = $res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            $net_kppi_22 += $net_kppi_21;
                                                                            // echo '<script>
                                                                            // document.getElementById("net_kppi_21_'.$k.'").innerHTML= "0";
                                                                            // </script>
                                                                            // ';
                                                                            echo '<td><label id="net_kppi_22_'.$k.'">';
                                                                            echo $net_kppi_22;
                                                                            echo '</label></td>';
                                                                        }

                                                                        $net_kppi_23 = "0";
                                                                        if(in_array("2023", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2023"){
                                                                                    $net_kppi_23 = $res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            $net_kppi_23 += $net_kppi_21;
                                                                            $net_kppi_23 += $net_kppi_22;
                                                                            // echo '<script>
                                                                            // document.getElementById("net_kppi_21_'.$k.'").innerHTML= "0";
                                                                            // document.getElementById("net_kppi_22_'.$k.'").innerHTML= "0";
                                                                            // </script>
                                                                            // ';
                                                                            echo '<td><label id="net_kppi_23_'.$k.'">';
                                                                            echo $net_kppi_23;
                                                                            echo '</label></td>';
                                                                        }

                                                                        $net_kppi_24 = "0";
                                                                        if(in_array("2024", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2024"){
                                                                                    $net_kppi_24 = $res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            $net_kppi_24 += $net_kppi_21;
                                                                            $net_kppi_24 += $net_kppi_22;
                                                                            $net_kppi_24 += $net_kppi_23;
                                                                            // echo '<script>
                                                                            // document.getElementById("net_kppi_21_'.$k.'").innerHTML= "0";
                                                                            // document.getElementById("net_kppi_22_'.$k.'").innerHTML= "0";
                                                                            // document.getElementById("net_kppi_23_'.$k.'").innerHTML= "0";
                                                                            // </script>
                                                                            // ';
                                                                            echo '<td><label id="net_kppi_24_'.$k.'">';
                                                                            echo $net_kppi_24;
                                                                            echo '</label></td>';
                                                                        }

                                                                        $net_kppi_25 = "0";
                                                                        if(in_array("2025", $year_count)){
                                                                            for($j=0;$j<count($res_count);$j++){
                                                                                if($res_count[$j]['cat_name'] == $cat_count[$k]['name'] && $res_count[$j]['year_count']=="2025"){
                                                                                    $net_kppi_25 = $res_count[$j]['kppi'] -  $res_count[$j]['resolved_kppi'];
                                                                                }
                                                                                
                                                                            }
                                                                            $net_kppi_25 += $net_kppi_21;
                                                                            $net_kppi_25 += $net_kppi_22;
                                                                            $net_kppi_25 += $net_kppi_23;
                                                                            $net_kppi_25 += $net_kppi_24;
                                                                            // echo '<script>
                                                                            // document.getElementById("net_kppi_21_'.$k.'").innerHTML= "0";
                                                                            // document.getElementById("net_kppi_22_'.$k.'").innerHTML= "0";
                                                                            // document.getElementById("net_kppi_23_'.$k.'").innerHTML= "0";
                                                                            // document.getElementById("net_kppi_24_'.$k.'").innerHTML= "0";
                                                                            // </script>
                                                                            // ';
                                                                            echo '<td><label id="net_kppi_25_'.$k.'">';
                                                                            echo $net_kppi_25;
                                                                            echo '</label></td>';
                                                                        }
                                                                       
                                                                    echo '</tr>';
                                                                // }
                                                            // }
                                                        }
                                                       
                                                    
                                                       

                                                    echo '<tr>
                                                            <td rowspan="3"><b>Total</b></td>
                                                                <td><b>KPPI</b></td>';
                                                                
                                                                if(in_array("2021", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_kppi_2021;
                                                                    echo '</b></td>';
                                                                }

                                                                if(in_array("2022", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_kppi_2022 + $total_net_kppi_2021;
                                                                    echo '</b></td>';
                                                                }

                                                                if(in_array("2023", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_kppi_2023 + $total_net_kppi_2022;
                                                                    echo '</b></td>';
                                                                }

                                                                if(in_array("2024", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_kppi_2024 + $total_net_kppi_2023;
                                                                    echo '</b></td>';
                                                                }

                                                                if(in_array("2025", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_kppi_2025 + $total_net_kppi_2025;
                                                                    echo '</b></td>';
                                                                }
                                                                
                                                                
                                                              echo '</tr>';
                                                        echo '<tr>
                                                                <td style="display: none;"></td>
                                                                <td><b>KPPI Resolved</b></td>';
                                                                
                                                                if(in_array("2021", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_resolved_kppi_2021;
                                                                    echo '</b></td>';
                                                                }
  
                                                               
                                                                if(in_array("2022", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_resolved_kppi_2022;
                                                                    echo '</b></td>';
                                                                }

                                                                if(in_array("2023", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_resolved_kppi_2023;
                                                                    echo '</b></td>';
                                                                }

                                                                if(in_array("2024", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_resolved_kppi_2024;
                                                                    echo '</b></td>';
                                                                }

                                                                if(in_array("2025", $year_count)){
                                                                    echo '<td><b>';
                                                                    echo $total_resolved_kppi_2025;
                                                                    echo '</b></td>';
                                                                }
                                                                
                                                                
                                                              echo '</tr>';
                                                            echo '</tr>';
                                                        echo '<tr>
                                                                <td style="display: none;"></td>
                                                                <td><b>Net KPPI</b></td>';
                                                                
                                                                if(in_array("2021", $year_count)){
                                                                    echo '<td><b><label id="total_net_kppi_2021">';
                                                                    echo $total_net_kppi_2021;
                                                                    echo '</label></b></td>';
                                                                }

                                                                if(in_array("2022", $year_count)){
                                                                    $total_net_kppi_2022 += $total_net_kppi_2021;
                                                                    // echo '<script>
                                                                    //         document.getElementById("total_net_kppi_2021").innerHTML= "0";
                                                                    //         </script>
                                                                    //         ';
                                                                    echo '<td><b><label id="total_net_kppi_2022">';
                                                                    echo $total_net_kppi_2022;
                                                                    echo '</label></b></td>';
                                                                }

                                                                if(in_array("2023", $year_count)){
                                                                    $total_net_kppi_2023 += $total_net_kppi_2021;
                                                                    $total_net_kppi_2023 += $total_net_kppi_2022;
                                                                    // echo '<script>
                                                                    //         document.getElementById("total_net_kppi_2021").innerHTML= "0";
                                                                    //         document.getElementById("total_net_kppi_2022").innerHTML= "0";
                                                                    //         </script>
                                                                    //         ';
                                                                    echo '<td><b><label id="total_net_kppi_2023">';
                                                                    echo $total_net_kppi_2023;
                                                                    echo '</label></b></td>';
                                                                }

                                                                if(in_array("2024", $year_count)){
                                                                    $total_net_kppi_2024 += $total_net_kppi_2021;
                                                                    $total_net_kppi_2024 += $total_net_kppi_2022;
                                                                    $total_net_kppi_2024 += $total_net_kppi_2023;
                                                                    // echo '<script>
                                                                    //         document.getElementById("total_net_kppi_2021").innerHTML= "0";
                                                                    //         document.getElementById("total_net_kppi_2022").innerHTML= "0";
                                                                    //         document.getElementById("total_net_kppi_2023").innerHTML= "0";
                                                                    //         </script>
                                                                    //         ';
                                                                    echo '<td><b><label id="total_net_kppi_2024">';
                                                                    echo $total_net_kppi_2024;
                                                                    echo '</label></b></td>';
                                                                }

                                                                if(in_array("2025", $year_count)){
                                                                    $total_net_kppi_2025 += $total_net_kppi_2021;
                                                                    $total_net_kppi_2025 += $total_net_kppi_2022;
                                                                    $total_net_kppi_2025 += $total_net_kppi_2023;
                                                                    $total_net_kppi_2025 += $total_net_kppi_2024;
                                                                    // echo '<script>
                                                                    //         document.getElementById("total_net_kppi_2021").innerHTML= "0";
                                                                    //         document.getElementById("total_net_kppi_2022").innerHTML= "0";
                                                                    //         document.getElementById("total_net_kppi_2023").innerHTML= "0";
                                                                    //         document.getElementById("total_net_kppi_2024").innerHTML= "0";
                                                                    //         </script>
                                                                    //         ';
                                                                    echo '<td><b><label id="total_net_kppi_2025">';
                                                                    echo $total_net_kppi_2025;
                                                                    echo '</label></b></td>';
                                                                }
                                                                
                                                               
                                                              echo '</tr>';
                                                              echo '</tr>';

                                                // Free result set
                                                mysqli_free_result($result);
                                            } 
                                            
                                        } 

                                        // Close connection
                                        mysqli_close($link);
                                    ?>
                                        
                                        
                                    </tbody>
                                
                            </table>
                            <div class="border_bottom"></div>
                            </article>
                            
                            

                           
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <footer class="simple_footer">
            <img class="leaf_right" src="img/home_one/leaf_footter.png" alt="">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <p>© 2024 All Rights Reserved by <a href="index.php">PainsBoard</a></p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <ul class="list-unstyled f_social_icon">
                            <li><a href="#"><i class="social_facebook"></i></a></li>
                            <li><a href="#"><i class="social_twitter"></i></a></li>
                            <li><a href="#"><i class="social_vimeo"></i></a></li>
                            <li><a href="#"><i class="social_linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
   
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Complaint Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body ">
                <!-- <form method="post" action="" class="contact_form"> -->
                        <div class="row contact_fill">
                            <div class="col-lg-12 form-group">
                                <h6>Title</h6>
                                <label id="title" name="title"></label>
                            </div>
                            
                            <div class="col-lg-12 form-group">
                                <h6>Concern Category</h6>
                                <label id="category" name="category"></label>
                            </div>

                            <div class="col-lg-12 form-group">
                                <h6>Keywords</h6>
                                <label id="keyword1" name="keyword1"></label>, <label id="keyword2" name="keyword2"></label>, <label id="keyword3" name="keyword3"></label>
                            </div>
                         
                           <!-- <div class="row">
                                <div class="col-lg-4 form-group">
                                <h6>Keywords</h6>   
                                    <input type="text" class="form-control" name="keyword1" id="keyword1">
                                </div>
                                <div class="col-lg-4 form-group">
                                <h6> &nbsp;</h6>   
                                    <input type="text" class="form-control" name="keyword2" id="keyword2">
                                </div>
                                <div class="col-lg-4 form-group">
                                <h6> &nbsp;</h6>   
                                    <input type="text" class="form-control" name="keyword3" id="keyword3">
                                </div>
                            </div> -->
                            
                            <div class="col-lg-9 form-group">
                                <h6>Message</h6>
                                <label id="message" name="message"></label>
                            </div>
                            <div class="col-lg-9 form-group">
                                <h6>Uploaded file</h6>
                                <label><a id="uploaded_file" href="#">Click to view the file</a></label>
                            </div>
                            <div class="col-lg-9 form-group">
                                <h6>Propose solution</h6>
                                <label id="solution" name="solution"></label>
                            </div>

                            <form method="post" action="api/update_complaint.php" class="contact_form">
                                <div class="col-lg-12 form-group">
                                    <h6>Reply</h6>
                                    <input type="hidden" class="form-control" name="complaint_id" id="complaint_id" >
                                    <input type="hidden" class="form-control" name="org_id" id="org_id" value="<?php echo $id;?>"> 
                                    <textarea class="form-control message" id="reply" name="reply" placeholder="Write your reply"></textarea>
                                </div>
                                <div class="col-lg-12 form-group">
                                <h6>Status </h6>
                                <div class="form-group" >
                                    <select class="form-control" name="status" id="status">
                                        <option>In Review</option>
                                        <option>Resolved</option>
                                    </select>
                                  </div> 
                            </div>
                            <div class="col-lg-9 form-group">
                                <button type="submit" class="btn action_btn thm_btn">Submit</button>
                            </div>
                            </form>
                            <!-- <div class="col-lg-9 form-group">
                                <h6>Add Pdf/Photos/Videos (Optional. Max 2 MB) <small><i>/ Lampirkan Pdf/foto/video (Jika ada. Maks 2MB)</i></small></h6>
                                <div class="col-lg-6 form-group">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                            </div> -->
                            
                           
                        </div>
                    <!-- </form> -->
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
            </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/pre-loader.js"> </script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="assets/font-size/js/rv-jquery-fontsize-2.0.3.js"></script>
    <script src="js/parallaxie.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/jquery.wavify.js"></script>
    <script src="js/anchor.js"></script>
    <script src="assets/wow/wow.min.js"></script>
    <script src="assets/prism/prism.js"></script>
    <script src="assets/niceselectpicker/jquery.nice-select.min.js"></script>
    <script src="assets/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/datatable/datatables/datatable.custom.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="js/main.js"></script>
    <script>

        $(function () {
        $('[data-toggle="popover"]').popover()
        })

		$("body.doc").removeClass("body_dark");

        $(document).ready(function() {
            $('#example').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false,
                "searching": false,
                dom: 'Bfrtip',
                // buttons: [
                //     'excelHtml5',
                //     'csvHtml5',
                //     'pdfHtml5'
                // ],
                buttons:[
                    {
                        extend: 'excel',
                        title: 'Overall Trend of KPPI over the years',
                        messageTop: function() {
                                return 'Name of Organization:  <?php echo $company_name;?>' +
                                    String.fromCharCode(10)+'Date of Report: <?php echo date('d/m/Y');?>';
                            }
                    },
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        title: 'Overall Trend of KPPI over the years',
                        messageTop: function() {
                                return 'Name of Organization:  <?php echo $company_name;?>' +
                                    String.fromCharCode(10)+'Date of Report: <?php echo date('d/m/Y');?>';
                            }
                    },
                ],
                "scrollX": true
            } );
        } );

        function urldecode (str) {
            return decodeURIComponent((str + '').replace(/\+/g, '%20'));
            }


        function showComplaint(com_title, com_category,com_k1,com_k2,com_k3,com_message,com_solution,complaint_id,upload_file) {
            document.getElementById("title").innerHTML = com_title;
            document.getElementById("category").innerHTML = com_category;
            document.getElementById("keyword1").innerHTML = com_k1;
            document.getElementById("keyword2").innerHTML = com_k2;
            document.getElementById("keyword3").innerHTML = com_k3;
            document.getElementById("message").innerHTML = urldecode(com_message);
            document.getElementById("solution").innerHTML = urldecode(com_solution);
            document.getElementById("complaint_id").value = complaint_id;
            if(upload_file  != ""){
                document.getElementById("uploaded_file").href = "attachments/"+upload_file;
                document.getElementById("uploaded_file").setAttribute('target', '_blank');
            }
        }
    </script>
</body>

</html>