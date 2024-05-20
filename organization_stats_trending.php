<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "config/config.php";

$id = $_GET['id'];
$period = $_GET['period'];
$trending_keyword = [];
$trending_viewers = [];
$trending_agreed = [];
$trending_like = [];
$trending_neutral = [];
$trending_complainer = [];
$trending_contributor = [];
$company_name = "";

$today_date = date("Y/m/d");
if($period == "1"){
    $fortnight_date = date('Y/m/d', strtotime('-30 day', strtotime($today_date)));
    $show_fortnight_date = date('d/m/Y', strtotime('-30 day', strtotime($today_date)));
    $days_period = "30 days";
}
else if($period == "2"){
    $fortnight_date = date('Y/m/d', strtotime('-90 day', strtotime($today_date)));
    $show_fortnight_date = date('d/m/Y', strtotime('-90 day', strtotime($today_date))); 
    $days_period = "3 months";
}
else if($period == "3"){
    $fortnight_date = date('Y/m/d', strtotime('-180 day', strtotime($today_date)));
    $show_fortnight_date = date('d/m/Y', strtotime('-180 day', strtotime($today_date)));
    $days_period = "6 months";
}
else if($period == "4"){
    $fortnight_date = date('Y/m/d', strtotime('-365 day', strtotime($today_date)));
    $show_fortnight_date = date('d/m/Y', strtotime('-365 day', strtotime($today_date)));
    $days_period = "12 months";
}



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

$sql_keyword = "SELECT keyword1,org_id,update_date, COUNT(*) as keyword_count
FROM     (SELECT keyword1,org_id,update_date FROM complaints
          UNION ALL
          SELECT keyword2,org_id,update_date FROM complaints
          UNION ALL
          SELECT keyword3,org_id,update_date FROM complaints
         
         ) t
         where org_id = '".$id."' and keyword1 != '' and CAST(create_date AS DATE) between '".$fortnight_date."' and '".$today_date."'
GROUP BY keyword1 order by keyword_count desc,keyword1 asc";


                if($result_key = mysqli_query($link, $sql_keyword)){
                    if(mysqli_num_rows($result_key) > 0){
                        while($row_key = mysqli_fetch_assoc($result_key)){
                            $trending_keyword[] = $row_key;
                        }
                    }
                    
                }

// $sql_viewers = "SELECT complaints.title as com_title, COUNT(complaints_stats.id) as com_count, complaints_stats.create_date
// FROM     complaints_stats left join complaints on complaints_stats.complaint_id = complaints.id
// where complaints.org_id = '".$id."' and CAST(complaints_stats.create_date AS DATE) between '".$fortnight_date."' and '".$today_date."'
// GROUP BY complaints_stats.complaint_id  order by com_count desc";

$sql_viewers = "SELECT complaints.title as com_title,complaints.id as com_id, (SELECT COUNT(complaints_stats.id) from complaints_stats 
where complaints_stats.reaction = 'Agree' and complaints_stats.complaint_id = com_id) as agree_count,(SELECT COUNT(complaints_stats.id) 
from complaints_stats where complaints_stats.reaction = 'Like' and complaints_stats.complaint_id = com_id) as like_count,
(SELECT COUNT(complaints_stats.id) from complaints_stats where complaints_stats.reaction = 'Neutral' and complaints_stats.complaint_id = com_id) 
as neutral_count,complaints_stats.create_date FROM complaints_stats left join complaints on complaints_stats.complaint_id = complaints.id 
where complaints.org_id = '".$id."' and CAST(complaints.create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' GROUP BY 
complaints_stats.complaint_id order by (agree_count+like_count) desc, complaints.title asc";

                                if($result_viewers = mysqli_query($link, $sql_viewers)){
                                    if(mysqli_num_rows($result_viewers) > 0){
                                        while($row_viewers = mysqli_fetch_assoc($result_viewers)){
                                            $trending_viewers[] = $row_viewers;
                                        }
                                    }
                                    
                                }

$sql_agreed = "SELECT complaints.title as com_title, COUNT(complaints_stats.id) as com_count,complaints_stats.create_date
FROM     complaints_stats left join complaints on complaints_stats.complaint_id = complaints.id
where complaints.org_id = '".$id."' and complaints_stats.reaction = 'Agree' and CAST(complaints_stats.create_date AS DATE) between '".$fortnight_date."' and '".$today_date."'
GROUP BY complaints_stats.complaint_id  order by com_count desc,complaints.title asc";

                
                                if($result_agreed = mysqli_query($link, $sql_agreed)){
                                    if(mysqli_num_rows($result_agreed) > 0){
                                        while($row_agreed = mysqli_fetch_assoc($result_agreed)){
                                            $trending_agreed[] = $row_agreed;
                                        }
                                    }
                                    
                                }

$sql_like = "SELECT complaints.title as com_title, COUNT(complaints_stats.id) as com_count,complaints_stats.create_date
FROM     complaints_stats left join complaints on complaints_stats.complaint_id = complaints.id
where complaints.org_id = '".$id."' and complaints_stats.reaction = 'Like' and CAST(complaints_stats.create_date AS DATE) between '".$fortnight_date."' and '".$today_date."'
GROUP BY complaints_stats.complaint_id  order by com_count desc,complaints.title asc";
                
                                if($result_like = mysqli_query($link, $sql_like)){
                                    if(mysqli_num_rows($result_like) > 0){
                                        while($row_like = mysqli_fetch_assoc($result_like)){
                                            $trending_like[] = $row_like;
                                        }
                                    }
                                    
                                }

$sql_neutral = "SELECT complaints.title as com_title, COUNT(complaints_stats.id) as com_count,complaints_stats.create_date
FROM     complaints_stats left join complaints on complaints_stats.complaint_id = complaints.id
where complaints.org_id = '".$id."' and complaints_stats.reaction = 'Neutral' and CAST(complaints_stats.create_date AS DATE) between '".$fortnight_date."' and '".$today_date."'
GROUP BY complaints_stats.complaint_id  order by com_count desc,complaints.title asc";
                
                                if($result_neutral = mysqli_query($link, $sql_neutral)){
                                    if(mysqli_num_rows($result_neutral) > 0){
                                        while($row_neutral = mysqli_fetch_assoc($result_neutral)){
                                            $trending_neutral[] = $row_neutral;
                                        }
                                    }
                                    
                                }

$sql_complainer = "SELECT users.name, count(complaints.id) as no_complaint FROM complaints left join users on complaints.user_id = users.id WHERE complaints.org_id = '".$id."' and CAST(complaints.create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' GROUP BY complaints.user_id order by no_complaint desc, users.name asc";  
                                if($result_complainer = mysqli_query($link, $sql_complainer)){
                                    if(mysqli_num_rows($result_complainer) > 0){
                                        while($row_complainer = mysqli_fetch_assoc($result_complainer)){
                                            $trending_complainer[] = $row_complainer;
                                        }
                                    }
                                    
                                }

$sql_contributor = "SELECT users.name, count(complaints_comments.id) as no_complaint,complaints_comments.create_date FROM complaints_comments left join users on complaints_comments.user_id = users.id WHERE users.org_id = '".$id."' and CAST(complaints_comments.create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' GROUP BY complaints_comments.user_id order by no_complaint desc,users.name asc";        
                                if($result_contributor = mysqli_query($link, $sql_contributor)){
                                    if(mysqli_num_rows($result_contributor) > 0){
                                        while($row_contributor = mysqli_fetch_assoc($result_contributor)){
                                            $trending_contributor[] = $row_contributor;
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
                                <h4>Trending of Top 10 List over the past <?php echo $days_period;?></h4>
                                <!-- <?php echo $sql_contributor;?> -->
                                <table id="example" class="display cell-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <td colspan="15" >
                                                Name of Organization: <?php echo $company_name;?><br>
                                                Date of Report: <?php echo date("d/m/Y");?><br>
                                                Period: <?php echo "From ".$show_fortnight_date." to ".date("d/m/Y");?><br>
                                                <a class="btn btn-primary" href="organization_stats_trending.php?id=<?php echo $id;?>&period=1">30 days</a> 
                                                <a class="btn btn-primary" href="organization_stats_trending.php?id=<?php echo $id;?>&period=2">3 months</a> 
                                                <a class="btn btn-primary" href="organization_stats_trending.php?id=<?php echo $id;?>&period=3">6 months</a>
                                                <a class="btn btn-primary" href="organization_stats_trending.php?id=<?php echo $id;?>&period=4">12 months</a><br><br>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Frequency Ranking</th>
                                            <th>Keyword</th>
                                            <th>Submitter</th>
                                            <th>Commentor</th>
                                            <th>Concern Title</th>
                                            <th>No of Agreed</th>
                                            <th>No of Like</th>
                                            <th>No of Neutral</th>
                                            
                                        </tr>
                                       
                                            
                                       
                                    </thead>
                                    <tbody>
                                    <?php
                            
                                            echo '<tr>
                                                    <td>1 (Top)</td>
                                                    <td>';
                                                    if(isset($trending_keyword[0]['keyword1'])) {
                                                        echo $trending_keyword[0]['keyword1'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                   echo '</td>';
                                                   echo '<td>';
                                                    if(isset($trending_complainer[0]['name'])) {
                                                        echo $trending_complainer[0]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_contributor[0]['name'])) {
                                                        echo $trending_contributor[0]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                   echo '<td>';
                                                    if(isset($trending_viewers[0]['com_title'])) {
                                                        echo $trending_viewers[0]['com_title'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[0]['agree_count'])) {
                                                        echo $trending_viewers[0]['agree_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[0]['like_count'])) {
                                                        echo $trending_viewers[0]['like_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[0]['neutral_count'])) {
                                                        echo $trending_viewers[0]['neutral_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    
                                                echo '</tr>';

                                            echo '<tr>
                                            <td>2</td>';
                                                echo '<td>';
                                                if(isset($trending_keyword[1]['keyword1'])) {
                                                    echo $trending_keyword[1]['keyword1'];
                                                }
                                                else {
                                                    echo "";
                                                }
                                               echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_complainer[1]['name'])) {
                                                        echo $trending_complainer[1]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '<td>';
                                                    if(isset($trending_contributor[1]['name'])) {
                                                        echo $trending_contributor[1]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_viewers[1]['com_title'])) {
                                                        echo $trending_viewers[1]['com_title'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[1]['agree_count'])) {
                                                        echo $trending_viewers[1]['agree_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[1]['like_count'])) {
                                                        echo $trending_viewers[1]['like_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[1]['neutral_count'])) {
                                                        echo $trending_viewers[1]['neutral_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    
                                                
                                            echo '</tr>';

                                            echo '<tr>
                                            <td>3</td>';
                                                echo '<td>';
                                                if(isset($trending_keyword[2]['keyword1'])) {
                                                    echo $trending_keyword[2]['keyword1'];
                                                }
                                                else {
                                                    echo "";
                                                }
                                               echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_complainer[2]['name'])) {
                                                        echo $trending_complainer[2]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '<td>';
                                                    if(isset($trending_contributor[2]['name'])) {
                                                        echo $trending_contributor[2]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_viewers[2]['com_title'])) {
                                                        echo $trending_viewers[2]['com_title'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[2]['agree_count'])) {
                                                        echo $trending_viewers[2]['agree_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[2]['like_count'])) {
                                                        echo $trending_viewers[2]['like_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[2]['neutral_count'])) {
                                                        echo $trending_viewers[2]['neutral_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    
                                                
                                            echo '</tr>';

                                            echo '<tr>
                                            <td>4</td>';
                                                echo '<td>';
                                                if(isset($trending_keyword[3]['keyword1'])) {
                                                    echo $trending_keyword[3]['keyword1'];
                                                }
                                                else {
                                                    echo "";
                                                }
                                               echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_complainer[3]['name'])) {
                                                        echo $trending_complainer[3]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '<td>';
                                                    if(isset($trending_contributor[3]['name'])) {
                                                        echo $trending_contributor[3]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_viewers[3]['com_title'])) {
                                                        echo $trending_viewers[3]['com_title'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[3]['agree_count'])) {
                                                        echo $trending_viewers[3]['agree_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[3]['like_count'])) {
                                                        echo $trending_viewers[3]['like_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[3]['neutral_count'])) {
                                                        echo $trending_viewers[3]['neutral_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    
                                                
                                            echo '</tr>';

                                            echo '<tr>
                                            <td>5</td>';
                                                echo '<td>';
                                                if(isset($trending_keyword[4]['keyword1'])) {
                                                    echo $trending_keyword[4]['keyword1'];
                                                }
                                                else {
                                                    echo "";
                                                }
                                               echo '</td>';
                                               echo '<td>';
                                               if(isset($trending_complainer[4]['name'])) {
                                                   echo $trending_complainer[4]['name'];
                                               }
                                               else {
                                                   echo "";
                                               }
                                               echo '<td>';
                                               if(isset($trending_contributor[4]['name'])) {
                                                   echo $trending_contributor[4]['name'];
                                               }
                                               else {
                                                   echo "";
                                               }
                                               echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_viewers[4]['com_title'])) {
                                                        echo $trending_viewers[4]['com_title'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[4]['agree_count'])) {
                                                        echo $trending_viewers[4]['agree_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[4]['like_count'])) {
                                                        echo $trending_viewers[4]['like_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[4]['neutral_count'])) {
                                                        echo $trending_viewers[4]['neutral_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                   
                                                
                                            echo '</tr>';


                                            echo '<tr>
                                            <td>6</td>';
                                                echo '<td>';
                                                if(isset($trending_keyword[5]['keyword1'])) {
                                                    echo $trending_keyword[5]['keyword1'];
                                                }
                                                else {
                                                    echo "";
                                                }
                                               echo '</td>';
                                               echo '<td>';
                                               if(isset($trending_complainer[5]['name'])) {
                                                   echo $trending_complainer[5]['name'];
                                               }
                                               else {
                                                   echo "";
                                               }
                                               echo '<td>';
                                               if(isset($trending_contributor[5]['name'])) {
                                                   echo $trending_contributor[5]['name'];
                                               }
                                               else {
                                                   echo "";
                                               }
                                               echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_viewers[5]['com_title'])) {
                                                        echo $trending_viewers[5]['com_title'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[5]['agree_count'])) {
                                                        echo $trending_viewers[5]['agree_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[5]['like_count'])) {
                                                        echo $trending_viewers[5]['like_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[5]['neutral_count'])) {
                                                        echo $trending_viewers[5]['neutral_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                   
                                                
                                            echo '</tr>';
                                            

                                            echo '<tr>
                                            <td>7</td>';
                                                echo '<td>';
                                                if(isset($trending_keyword[6]['keyword1'])) {
                                                    echo $trending_keyword[6]['keyword1'];
                                                }
                                                else {
                                                    echo "";
                                                }
                                               echo '</td>';
                                               echo '<td>';
                                               if(isset($trending_complainer[6]['name'])) {
                                                   echo $trending_complainer[6]['name'];
                                               }
                                               else {
                                                   echo "";
                                               }
                                               echo '<td>';
                                               if(isset($trending_contributor[6]['name'])) {
                                                   echo $trending_contributor[6]['name'];
                                               }
                                               else {
                                                   echo "";
                                               }
                                               echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_viewers[6]['com_title'])) {
                                                        echo $trending_viewers[6]['com_title'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[6]['agree_count'])) {
                                                        echo $trending_viewers[6]['agree_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[6]['like_count'])) {
                                                        echo $trending_viewers[6]['like_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[6]['neutral_count'])) {
                                                        echo $trending_viewers[6]['neutral_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                   
                                                
                                            echo '</tr>';

                                            echo '<tr>
                                            <td>8</td>';
                                                echo '<td>';
                                                if(isset($trending_keyword[7]['keyword1'])) {
                                                    echo $trending_keyword[7]['keyword1'];
                                                }
                                                else {
                                                    echo "";
                                                }
                                               echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_complainer[7]['name'])) {
                                                        echo $trending_complainer[7]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '<td>';
                                                    if(isset($trending_contributor[7]['name'])) {
                                                        echo $trending_contributor[7]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_viewers[7]['com_title'])) {
                                                        echo $trending_viewers[7]['com_title'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[7]['agree_count'])) {
                                                        echo $trending_viewers[7]['agree_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[7]['like_count'])) {
                                                        echo $trending_viewers[7]['like_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[7]['neutral_count'])) {
                                                        echo $trending_viewers[7]['neutral_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    
                                                
                                            echo '</tr>';


                                            echo '<tr>
                                            <td>9</td>';
                                                echo '<td>';
                                                if(isset($trending_keyword[8]['keyword1'])) {
                                                    echo $trending_keyword[8]['keyword1'];
                                                }
                                                else {
                                                    echo "";
                                                }
                                               echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_complainer[8]['name'])) {
                                                        echo $trending_complainer[8]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '<td>';
                                                    if(isset($trending_contributor[8]['name'])) {
                                                        echo $trending_contributor[8]['name'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                               echo '<td>';
                                                    if(isset($trending_viewers[8]['com_title'])) {
                                                        echo $trending_viewers[8]['com_title'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[8]['agree_count'])) {
                                                        echo $trending_viewers[8]['agree_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[8]['like_count'])) {
                                                        echo $trending_viewers[8]['like_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(isset($trending_viewers[8]['neutral_count'])) {
                                                        echo $trending_viewers[8]['neutral_count'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    
                                                
                                            echo '</tr>';


                                           echo '<tr>
                                                    <td>10</td>
                                                    <td>';
                                                    // if(sizeof($trending_keyword)>9){
                                                    //     if(isset($trending_keyword[count($trending_keyword)-1]['keyword1'])) {
                                                    //         echo $trending_keyword[count($trending_keyword)-1]['keyword1'];
                                                    //         }
                                                    // }
                                                    if(isset($trending_keyword[9]['keyword1'])) {
                                                        echo $trending_keyword[9]['keyword1'];
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    
                                                   echo '</td>';
                                                   echo '<td>';
                                                    if(sizeof($trending_complainer)>9){
                                                        if(isset($trending_complainer[count($trending_complainer)-1]['name'])) {
                                                            echo $trending_complainer[count($trending_complainer)-1]['name'];
                                                        }
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(sizeof($trending_contributor)>9){
                                                        if(isset($trending_contributor[count($trending_contributor)-1]['name'])) {
                                                            echo $trending_contributor[count($trending_contributor)-1]['name'];
                                                        }
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                   echo '<td>';
                                                   if(sizeof($trending_viewers)>9){
                                                        if(isset($trending_viewers[count($trending_viewers)-1]['com_title'])) {
                                                            echo $trending_viewers[count($trending_viewers)-1]['com_title'];
                                                        }
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(sizeof($trending_viewers)>9){
                                                        if(isset($trending_viewers[count($trending_viewers)-1]['agree_count'])) {
                                                            echo $trending_viewers[count($trending_viewers)-1]['agree_count'];
                                                        }
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(sizeof($trending_viewers)>9){
                                                        if(isset($trending_viewers[count($trending_viewers)-1]['like_count'])) {
                                                            echo $trending_viewers[count($trending_viewers)-1]['like_count'];
                                                        }
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if(sizeof($trending_viewers)>9){
                                                        if(isset($trending_viewers[count($trending_viewers)-1]['neutral_count'])) {
                                                            echo $trending_viewers[count($trending_viewers)-1]['neutral_count'];
                                                        }
                                                    }
                                                    else {
                                                        echo "";
                                                    }
                                                    echo '</td>';
                                                    
                                                echo '</tr>';
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
                        title: 'Trending over the past <?php echo $days_period;?>',
                        messageTop: function() {
                                return 'Name of Organization:  <?php echo $company_name;?>' +
                                    String.fromCharCode(10)+'Date of Report: <?php echo date('d/m/Y');?>'+
                                    String.fromCharCode(10)+'Period: <?php echo "From ".$show_fortnight_date." to ".date("d/m/Y");?>';
                            }
                    },
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        title: 'Trending over the past <?php echo $days_period;?>',
                        messageTop: function() {
                            return 'Name of Organization:  <?php echo $company_name;?>' +
                                    String.fromCharCode(10)+'Date of Report: <?php echo date('d/m/Y');?>'+
                                    String.fromCharCode(10)+'Period: <?php echo "From ".$show_fortnight_date." to ".date("d/m/Y");?>';
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