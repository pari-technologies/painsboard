<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "config/config.php";

$id = $_GET['id'];
$i_year = $_GET['year'];
$p_year = $i_year - 1;
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
                                <h4>Details of KPPI for the Year <?php echo $i_year;?></h4>
                                <b>Name of Organization:</b> <?php echo $company_name;?><br>
                                <b>Date of Report:</b> <?php echo date("d/m/Y");?><br><br>
                                <table id="example" class="display cell-border" style="width:100%" >
                                    <thead>
                                        
                                        <tr>
                                            <th rowspan="2" >Category</th>
                                            <th rowspan="2" >Indicator</th>
                                            <th rowspan="2" >Carry-over</th>
                                            <th colspan="14" style="text-align:center">Monthly Data for year <?php echo $i_year;?></th>
                                           

                                        </tr>
                                            <tr>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                                <th>7</th>
                                                <th>8</th>
                                                <th>9</th>
                                                <th>10</th>
                                                <th>11</th>
                                                <th>12</th>
                                                <th>Total</th>
                                                <th>Carry-forward</th>
                                        </tr>
                                           
                                       
                                    </thead>
                                    <tbody>
                                    <?php
                            
                                        $total_kppi_1 = 0;
                                        $total_resolved_kppi_1 = 0;
                                        $total_net_kppi_1 = 0;

                                        $total_kppi_2 = 0;
                                        $total_resolved_kppi_2 = 0;
                                        $total_net_kppi_2 = 0;

                                        $total_kppi_3 = 0;
                                        $total_resolved_kppi_3 = 0;
                                        $total_net_kppi_3 = 0;

                                        $total_kppi_4 = 0;
                                        $total_resolved_kppi_4 = 0;
                                        $total_net_kppi_4= 0;

                                        $total_kppi_5 = 0;
                                        $total_resolved_kppi_5 = 0;
                                        $total_net_kppi_5 = 0;

                                        $total_kppi_6 = 0;
                                        $total_resolved_kppi_6 = 0;
                                        $total_net_kppi_6 = 0;

                                        $total_kppi_7 = 0;
                                        $total_resolved_kppi_7 = 0;
                                        $total_net_kppi_7 = 0;

                                        $total_kppi_8 = 0;
                                        $total_resolved_kppi_8 = 0;
                                        $total_net_kppi_8 = 0;

                                        $total_kppi_9 = 0;
                                        $total_resolved_kppi_9 = 0;
                                        $total_net_kppi_9 = 0;

                                        $total_kppi_10 = 0;
                                        $total_resolved_kppi_10 = 0;
                                        $total_net_kppi_10 = 0;

                                        $total_kppi_11 = 0;
                                        $total_resolved_kppi_11 = 0;
                                        $total_net_kppi_11 = 0;

                                        $total_kppi_12 = 0;
                                        $total_resolved_kppi_12 = 0;
                                        $total_net_kppi_12 = 0;

                                        $total_kpi_co_all = 0;
                                        $total_resolved_kpi_co_all = 0;
                                        $total_net_kpi_co_all = 0;
                                        
                                        $old_net_kppi_arr = array();
                                        for($k=0;$k< count($cat_count);$k++){
                                             $kppi_arr = array("0","0","0","0","0","0","0","0","0","0","0","0");
                                             $resolved_kppi_arr = array("0","0","0","0","0","0","0","0","0","0","0","0");
                                             $net_kppi_arr = array("0","0","0","0","0","0","0","0","0","0","0","0");
                                            //  $kppi_arr = array();

                                            

                                            $total_kpi_co = 0;
                                            $total_resolved_kpi_co = 0;
                                            $total_net_kpi_co = 0;

                                            $sql_old = "SELECT category as cat,complaints_type.name as cat_name,complaints_type.id as cat_id,year(complaints.create_date) as year_count,month(complaints.create_date) as month_count,count(*) as kppi ,(SELECT count(*) from complaints where org_id ='".$id."' and status='Resolved' and category=cat and year(complaints.create_date)=year_count and month(complaints.create_date)=month_count) as resolved_kppi , ((SELECT count(*) from complaints where org_id = '".$id."' and category=cat and year(complaints.create_date)=year_count and month(complaints.create_date)=month_count) - (SELECT count(*) from complaints where org_id ='".$id."' and status='Resolved' and category=cat and year(complaints.create_date)=year_count and month(complaints.create_date)=month_count)) as net_kppi FROM complaints left join complaints_type on complaints.category = complaints_type.id where complaints.org_id = '".$id."' and year(complaints.create_date) ='".$p_year."' and complaints_type.id = '".$cat_count[$k]['id']."' group by category,year(complaints.create_date),month(complaints.create_date)";
                                            // echo $sql."<br>";
                                            if($result_old = mysqli_query($link, $sql_old)){
                                                if(mysqli_num_rows($result_old) > 0){
                                                    while($row_old = mysqli_fetch_assoc($result_old)){
                                                        $total_kpi_co += $row_old['kppi'];

                                                        $total_resolved_kpi_co += $row_old['resolved_kppi'];

                                                        $total_net_kpi_co = $total_net_kpi_co + ($row_old['kppi'] - $row_old['resolved_kppi']);

                                                        $object = array("cat"=>$row_old['cat_id'], "net_kppi"=>$total_net_kpi_co);
                                                        // $object->cat = $row_old['cat_id'];
                                                        // $object->net_kppi = $total_net_kpi_co;
                                                        $old_net_kppi_arr[] = json_encode($object);

                                                        $total_kpi_co_all += $row_old['kppi'];
                                                        $total_resolved_kpi_co_all += $row_old['resolved_kppi'];
                                                        $total_net_kpi_co_all =  $total_net_kpi_co_all + ($row_old['kppi'] - $row_old['resolved_kppi']);
                                                    }
                                                }
                                            }

                                            $total_kpi = 0;
                                                        $total_resolved_kpi = 0;
                                                        $total_net_kpi = 0;
                                                        $total_cf = 0;

                                            $sql = "SELECT category as cat,complaints_type.name as cat_name,complaints_type.id as cat_id,year(complaints.create_date) as year_count,month(complaints.create_date) as month_count,count(*) as kppi ,(SELECT count(*) from complaints where org_id ='".$id."' and status='Resolved' and category=cat and year(complaints.create_date)=year_count and month(complaints.create_date)=month_count) as resolved_kppi , ((SELECT count(*) from complaints where org_id = '".$id."' and category=cat and year(complaints.create_date)=year_count and month(complaints.create_date)=month_count) - (SELECT count(*) from complaints where org_id ='".$id."' and status='Resolved' and category=cat and year(complaints.create_date)=year_count and month(complaints.create_date)=month_count)) as net_kppi FROM complaints left join complaints_type on complaints.category = complaints_type.id where complaints.org_id = '".$id."' and year(complaints.create_date) ='".$i_year."' and complaints_type.id = '".$cat_count[$k]['id']."' group by category,year(complaints.create_date),month(complaints.create_date)";
                                            // echo $sql."<br>";
                                            if($result = mysqli_query($link, $sql)){
                                                if(mysqli_num_rows($result) > 0){
                                                    while($row = mysqli_fetch_assoc($result)){
    
                                                        
  
                                                        if($row['month_count']=="1"){
                                                            $total_kppi_1 += $row['kppi'];
                                                            $total_resolved_kppi_1 += $row['resolved_kppi'];
                                                            $total_net_kppi_1 = $total_kppi_1 - $total_resolved_kppi_1;
                                                        }
                                                        else if($row['month_count']=="2"){
                                                            $total_kppi_2 += $row['kppi'];
                                                            $total_resolved_kppi_2 += $row['resolved_kppi'];
                                                            $total_net_kppi_2  = $total_kppi_2 - $total_resolved_kppi_2;
                                                        }
                                                        else if($row['month_count']=="3"){
                                                            $total_kppi_3 += $row['kppi'];
                                                            $total_resolved_kppi_3 += $row['resolved_kppi'];
                                                            $total_net_kppi_3  = $total_kppi_3 - $total_resolved_kppi_3;
                                                        }
                                                        else if($row['month_count']=="4"){
                                                            $total_kppi_4 += $row['kppi'];
                                                            $total_resolved_kppi_4 += $row['resolved_kppi'];
                                                            $total_net_kppi_4  = $total_kppi_4 - $total_resolved_kppi_4;
                                                        }
                                                        else if($row['month_count']=="5"){
                                                            $total_kppi_5 += $row['kppi'];
                                                            $total_resolved_kppi_5 += $row['resolved_kppi'];
                                                            $total_net_kppi_5  = $total_kppi_5 - $total_resolved_kppi_5;
                                                        }
                                                        else if($row['month_count']=="6"){
                                                            $total_kppi_6 += $row['kppi'];
                                                            $total_resolved_kppi_6 += $row['resolved_kppi'];
                                                            $total_net_kppi_6  = $total_kppi_6 - $total_resolved_kppi_6;
                                                        }
                                                        else if($row['month_count']=="7"){
                                                            $total_kppi_7 += $row['kppi'];
                                                            $total_resolved_kppi_7 += $row['resolved_kppi'];
                                                            $total_net_kppi_7  = $total_kppi_7 - $total_resolved_kppi_7;
                                                        }
                                                        else if($row['month_count']=="8"){
                                                            $total_kppi_8 += $row['kppi'];
                                                            $total_resolved_kppi_8 += $row['resolved_kppi'];
                                                            $total_net_kppi_8  = $total_kppi_8 - $total_resolved_kppi_8;
                                                        }
                                                        else if($row['month_count']=="9"){
                                                            $total_kppi_9 += $row['kppi'];
                                                            $total_resolved_kppi_9 += $row['resolved_kppi'];
                                                            $total_net_kppi_9  = $total_kppi_9 - $total_resolved_kppi_9;
                                                        }
                                                        else if($row['month_count']=="10"){
                                                            $total_kppi_10 += $row['kppi'];
                                                            $total_resolved_kppi_10 += $row['resolved_kppi'];
                                                            $total_net_kppi_10  = $total_kppi_10 - $total_resolved_kppi_10;
                                                        }
                                                        else if($row['month_count']=="11"){
                                                            $total_kppi_11 += $row['kppi'];
                                                            $total_resolved_kppi_11 += $row['resolved_kppi'];
                                                            $total_net_kppi_11  = $total_kppi_11 - $total_resolved_kppi_11;
                                                        }
                                                        else if($row['month_count']=="12"){
                                                            $total_kppi_12 += $row['kppi'];
                                                            $total_resolved_kppi_12 += $row['resolved_kppi'];
                                                            $total_net_kppi_12  = $total_kppi_12 - $total_resolved_kppi_12;
                                                        }

                                                        
                                                        if($row['month_count']=="1" && $row['cat_id'] == $cat_count[$k]['id']){

                                                            $kppi_arr[0]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[0]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[0] = $row['kppi'] - $row['resolved_kppi'];
                                                        }
                                                       

                                                         if($row['month_count']=="2" && $row['cat_id'] == $cat_count[$k]['id']){

                                                            $kppi_arr[1]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[1]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[1] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
                                                        

                                                         if($row['month_count']=="3" && $row['cat_id'] == $cat_count[$k]['id']){
                                                            // $a2=array(2=>$row['kppi']);

                                                            $kppi_arr[2]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[2]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[2] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
                                                        

                                                         if($row['month_count']=="4" && $row['cat_id'] == $cat_count[$k]['id']){

                                                            $kppi_arr[3]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[3]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[3] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
                                                        

                                                         if($row['month_count']=="5" && $row['cat_id'] == $cat_count[$k]['id']){

                                                            $kppi_arr[4]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[4]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[4] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
                                                        

                                                         if($row['month_count']=="6" && $row['cat_id'] == $cat_count[$k]['id']){

                                                            $kppi_arr[5]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[5]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[5] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
                                                        

                                                         if($row['month_count']=="7" && $row['cat_id'] == $cat_count[$k]['id']){

                                                            $kppi_arr[6]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[6]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[6] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
                                                       

                                                         if($row['month_count']=="8" && $row['cat_id'] == $cat_count[$k]['id']){

                                                            $kppi_arr[7]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[7]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[7] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
                                                       

                                                         if($row['month_count']=="9" && $row['cat_id'] == $cat_count[$k]['id']){

                                                            $kppi_arr[8]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[8]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[8] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
                                                        

                                                         if($row['month_count']=="10" && $row['cat_id'] == $cat_count[$k]['id']){

                                                            $kppi_arr[9]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[9]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[9] = $row['kppi'] - $row['resolved_kppi'];
                                                        }
                                                        

                                                         if($row['month_count']=="11" && $row['cat_id'] == $cat_count[$k]['id']){
                                                            $kppi_arr[10]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[10]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[10] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
                                                        

                                                         if($row['month_count']=="12" && $row['cat_id'] == $cat_count[$k]['id']){
                                                            $kppi_arr[11]+=$row['kppi'];
                                                            $total_kpi += $row['kppi'];;

                                                            $total_resolved_kpi += $row['resolved_kppi'];
                                                            $resolved_kppi_arr[11]+=$row['resolved_kppi'];

                                                            $total_net_kpi = $total_net_kpi + ($row['kppi'] - $row['resolved_kppi']);
                                                            $net_kppi_arr[11] = $row['kppi'] - $row['resolved_kppi'];
                                                            
                                                        }
   
                                                        }

                                                        
                                                        // print_r($net_kppi_arr );
                                                        echo '<tr>
                                                                <td rowspan="3"><a style="color:blue" href="organization_stats_category.php?id='.$id.'&cat='.$cat_count[$k]['id'].'&period=1">'.$cat_count[$k]['name'].'</a></td>
                                                                   
                                                                    <td>KPPI</td>
                                                                    <td>';
                                                                  
                                                                    $value = 0;
                                                                    for($j=0;$j<sizeof($old_net_kppi_arr);$j++){
                                                                        $data = json_decode($old_net_kppi_arr[$j], true);

                                                                        if($data['cat'] == $cat_count[$k]['id']){
                                                                           $value = $data['net_kppi'];
                                                                        }
                                                                       
                                                                    }
                                                                    echo $value;
                                                                    echo '</td>
                                                                    <td>';
                                                                    echo $kppi_arr[0];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $kppi_arr[1];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $kppi_arr[2];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $kppi_arr[3];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $kppi_arr[4];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $kppi_arr[5];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $kppi_arr[6];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $kppi_arr[7];
                                                                    echo '</td>';
                                                                    
                                                                    echo '<td>';
                                                                    echo $kppi_arr[8];
                                                                    echo '</td>';
                                                                   echo '<td>';
                                                                   echo $kppi_arr[9];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $kppi_arr[10];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $kppi_arr[11];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    $value = 0;
                                                                    for($j=0;$j<sizeof($old_net_kppi_arr);$j++){
                                                                        $data = json_decode($old_net_kppi_arr[$j], true);

                                                                        if($data['cat'] == $cat_count[$k]['id']){
                                                                           $value = $data['net_kppi'];
                                                                           //echo $data['net_kppi'];
                                                                        }
                                                                       
                                                                    }
                                                                    echo $total_kpi + $value;
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    
                                                                    echo $total_net_kpi + $total_net_kpi_co;
                                                                    echo '</td>';
                                                                  echo '</tr>';
                                                            echo '<tr>
                                                                    <td style="display: none;"></td>
                                                                    
                                                                    <td>KPPI Resolved</td>
                                                                    <td>0</td>
                                                                    <td>';
                                                                    echo $resolved_kppi_arr[0];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[1];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[2];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[3];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[4];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[5];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[6];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[7];
                                                                    echo '</td>';
                                                                    
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[8];
                                                                    echo '</td>';
                                                                   echo '<td>';
                                                                   echo $resolved_kppi_arr[9];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[10];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[11];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $total_resolved_kpi;
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $resolved_kppi_arr[11];
                                                                    echo '</td>';
                                                                  echo '</tr>';
                                                                 
                                                            echo '<tr>
                                                                    <td style="display: none;"></td>
                                                                   
                                                                    <td>Net KPPI</td>
                                                                    <td>';
                                                                    
                                                                    $value = 0;
                                                                    for($j=0;$j<sizeof($old_net_kppi_arr);$j++){
                                                                        $data = json_decode($old_net_kppi_arr[$j], true);

                                                                        if($data['cat'] == $cat_count[$k]['id']){
                                                                           $value = $data['net_kppi'];
                                                                        }
                                                                       
                                                                    }
                                                                    echo $value;
                                                                    echo '</td>
                                                                    <td>';
                                                                    echo $net_kppi_arr[0];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[1];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[2];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[3];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[4];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[5];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[6];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[7];
                                                                    echo '</td>';
                                                                    
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[8];
                                                                    echo '</td>';
                                                                   echo '<td>';
                                                                   echo $net_kppi_arr[9];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[10];
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo $net_kppi_arr[11];
                                                                    echo '</td>';
                                                                        echo '<td>';
                                                                        echo $total_net_kpi + $total_net_kpi_co;
                                                                        echo '</td>';
                                                                        echo '<td>';
                                                                        echo $total_net_kpi + $total_net_kpi_co;
                                                                        echo '</td>';
                                                                  echo '</tr>';
 
                                                    // Free result set
                                                   //mysqli_free_result($result);
                                                } 
                                                else{
                                                    echo '<tr>
                                                                <td rowspan="3"><a style="color:blue" href="organization_stats_category.php?id='.$id.'&cat='.$cat_count[$k]['id'].'&period=1">'.$cat_count[$k]['name'].'</a></td>
                                                                   
                                                                    <td>KPPI</td>
                                                                    <td>';
                                                                    $value = 0;
                                                                    for($j=0;$j<sizeof($old_net_kppi_arr);$j++){
                                                                        $data = json_decode($old_net_kppi_arr[$j], true);

                                                                        if($data['cat'] == $cat_count[$k]['id']){
                                                                           $value = $data['net_kppi'];
                                                                        }
                                                                       
                                                                    }
                                                                    echo $value;
                                                                    echo '</td>
                                                                    <td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                   echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    $value = 0;
                                                                    for($j=0;$j<sizeof($old_net_kppi_arr);$j++){
                                                                        $data = json_decode($old_net_kppi_arr[$j], true);

                                                                        if($data['cat'] == $cat_count[$k]['id']){
                                                                           $value = $data['net_kppi'];
                                                                           //echo $data['net_kppi'];
                                                                        }
                                                                       
                                                                    }
                                                                    echo $value;
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                   echo $value;
                                                                    echo '</td>';
                                                                  echo '</tr>';
                                                            echo '<tr>
                                                                    <td style="display: none;"></td>
                                                                    
                                                                    <td>KPPI Resolved</td>
                                                                    <td>0</td>
                                                                    <td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                   echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    echo "0";
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                  echo '</tr>';
                                                                 
                                                            echo '<tr>
                                                                    <td style="display: none;"></td>
                                                                   
                                                                    <td>Net KPPI</td>
                                                                    <td>';
                                                                    $value = 0;
                                                                    for($j=0;$j<sizeof($old_net_kppi_arr);$j++){
                                                                        $data = json_decode($old_net_kppi_arr[$j], true);

                                                                        if($data['cat'] == $cat_count[$k]['id']){
                                                                           $value = $data['net_kppi'];
                                                                        }
                                                                       
                                                                    }
                                                                    echo $value;
                                                                    echo '</td>
                                                                    <td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                   echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                        echo "0"; 
                                                                    echo '</td>';
                                                                        echo '<td>';
                                                                        $value = 0;
                                                                        for($j=0;$j<sizeof($old_net_kppi_arr);$j++){
                                                                            $data = json_decode($old_net_kppi_arr[$j], true);
    
                                                                            if($data['cat'] == $cat_count[$k]['id']){
                                                                               $value = $data['net_kppi'];
                                                                               //echo $data['net_kppi'];
                                                                            }
                                                                           
                                                                        }
                                                                        echo $value;
                                                                        echo '</td>';
                                                                        echo '<td>';
                                                                        echo $value;
                                                                        echo '</td>';
                                                                  echo '</tr>';
                                                }
                                                
                                                
                                            } 
                                            
                                        }
                                        echo '<tr>
                                                                <td rowspan="3"><b>Total</b></td>
                                                                    <td><b>KPPI</b></td>
                                                                    <td>'.$total_net_kpi_co_all.'</td>
                                                                    <td><b>'.$total_kppi_1.'</b></td>
                                                                    <td><b>'.$total_kppi_2.'</b></td>
                                                                    <td><b>'.$total_kppi_3.'</b></td>
                                                                    <td><b>'.$total_kppi_4.'</b></td>
                                                                    <td><b>'.$total_kppi_5.'</b></td>
                                                                    <td><b>'.$total_kppi_6.'</b></td>
                                                                    <td><b>'.$total_kppi_7.'</b></td>
                                                                    <td><b>'.$total_kppi_8.'</b></td>
                                                                    <td><b>'.$total_kppi_9.'</b></td>
                                                                    <td><b>'.$total_kppi_10.'</b></td>
                                                                    <td><b>'.$total_kppi_11.'</b></td>
                                                                    <td><b>'.$total_kppi_12.'</b></td>
                                                                    <td><b>';
                                                                    echo $total_net_kpi_co_all + $total_kppi_1 + $total_kppi_2 + $total_kppi_3 + $total_kppi_4 + $total_kppi_5 + $total_kppi_6 + $total_kppi_7 + $total_kppi_8 + $total_kppi_9 + $total_kppi_10 + $total_kppi_11+ $total_kppi_12;
                                                                    echo '</b></td>
                                                                    <td><b>';
                                                                    echo $total_net_kpi_co_all + $total_net_kppi_1 + $total_net_kppi_2 + $total_net_kppi_3 + $total_net_kppi_4 + $total_net_kppi_5 + $total_net_kppi_6 + $total_net_kppi_7 + $total_net_kppi_8 + $total_net_kppi_9 + $total_net_kppi_10 + $total_net_kppi_11+ $total_net_kppi_12;
                                                                    echo '</b></td>
                                                                  </tr>';
                                                            echo '<tr>
                                                                    <td style="display: none;"></td>
                                                                    <td><b>KPPI Resolved</b></td>
                                                                    <td>0</td>
                                                                    <td><b>'.$total_resolved_kppi_1.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_2.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_3.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_4.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_5.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_6.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_7.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_8.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_9.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_10.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_11.'</b></td>
                                                                    <td><b>'.$total_resolved_kppi_12.'</b></td>
                                                                    <td><b>';
                                                                    echo $total_resolved_kppi_1 + $total_resolved_kppi_2 + $total_resolved_kppi_3 + $total_resolved_kppi_4 + $total_resolved_kppi_5 + $total_resolved_kppi_6 + $total_resolved_kppi_7 + $total_resolved_kppi_8 + $total_resolved_kppi_9 + $total_resolved_kppi_10 + $total_resolved_kppi_11+ $total_resolved_kppi_12;
                                                                    echo '</b></td>
                                                                    <td><b>'.$total_resolved_kppi_12.'</b></td>
                                                                  </tr>';
                                                            echo '<tr>
                                                                    <td style="display: none;"></td>
                                                                    <td><b>Net KPPI</b></td>
                                                                    <td>'.$total_net_kpi_co_all.'</td>
                                                                    <td><b>'.$total_net_kppi_1.'</b></td>
                                                                    <td><b>'.$total_net_kppi_2.'</b></td>
                                                                    <td><b>'.$total_net_kppi_3.'</b></td>
                                                                    <td><b>'.$total_net_kppi_4.'</b></td>
                                                                    <td><b>'.$total_net_kppi_5.'</b></td>
                                                                    <td><b>'.$total_net_kppi_6.'</b></td>
                                                                    <td><b>'.$total_net_kppi_7.'</b></td>
                                                                    <td><b>'.$total_net_kppi_8.'</b></td>
                                                                    <td><b>'.$total_net_kppi_9.'</b></td>
                                                                    <td><b>'.$total_net_kppi_10.'</b></td>
                                                                    <td><b>'.$total_net_kppi_11.'</b></td>
                                                                    <td><b>'.$total_net_kppi_12.'</b></td>
                                                                    <td><b>';
                                                                    echo $total_net_kpi_co_all +$total_net_kppi_1 + $total_net_kppi_2 + $total_net_kppi_3 + $total_net_kppi_4 + $total_net_kppi_5 + $total_net_kppi_6 + $total_net_kppi_7 + $total_net_kppi_8 + $total_net_kppi_9 + $total_net_kppi_10 + $total_net_kppi_11+ $total_net_kppi_12;
                                                                    echo '</b></td>
                                                                    <td><b>';
                                                                    echo $total_net_kpi_co_all + $total_net_kppi_1 + $total_net_kppi_2 + $total_net_kppi_3 + $total_net_kppi_4 + $total_net_kppi_5 + $total_net_kppi_6 + $total_net_kppi_7 + $total_net_kppi_8 + $total_net_kppi_9 + $total_net_kppi_10 + $total_net_kppi_11+ $total_net_kppi_12;
                                                                    echo '</b></td>
                                                                  </tr>';
                                       

                                       
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
                        title: 'Details of KPPI for the Year <?php echo $i_year;?>',
                        messageTop: function() {
                                return 'Name of Organization:  <?php echo $company_name;?>' +
                                    String.fromCharCode(10)+'Date of Report: <?php echo date('d/m/Y');?>';
                            }
                    },
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        title: 'Details of KPPI for the Year <?php echo $i_year;?>',
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