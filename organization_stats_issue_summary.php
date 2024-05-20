<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "config/config.php";

$id = $_GET['id'];
$period = $_GET['period'];
$i_year = date("Y");
$company_name = "";
$cat_list = [];

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

$sql7 = "SELECT category as cat,complaints_type.name as cat_name,complaints_type.id as type_id FROM complaints left join complaints_type on complaints.category = complaints_type.id where complaints.org_id = '".$id."' and CAST(complaints.create_date AS DATE) between '".$fortnight_date."' and '".$today_date."' group by complaints_type.id";
                if($result7 = mysqli_query($link, $sql7)){
                    if(mysqli_num_rows($result7) > 0){
                        while($row7 = mysqli_fetch_assoc($result7)){
                            $cat_list[] = $row7;
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
                                <h4>Summary of Issues for the past <?php echo $days_period;?></h4>
                                <b>Name of Organization:</b> <?php echo $company_name;?><br>
                                <b>Date of Report:</b> <?php echo date("d/m/Y");?><br>
                                <b>Period:</b> <?php echo "From ".$show_fortnight_date." to ".date("d/m/Y");?><br>
                                <a class="btn btn-primary" href="organization_stats_issue_summary.php?id=<?php echo $id;?>&period=1">30 days</a> 
                                <a class="btn btn-primary" href="organization_stats_issue_summary.php?id=<?php echo $id;?>&period=2">3 months</a> 
                                <a class="btn btn-primary" href="organization_stats_issue_summary.php?id=<?php echo $id;?>&period=3">6 months</a>
                                <a class="btn btn-primary" href="organization_stats_issue_summary.php?id=<?php echo $id;?>&period=4">12 months</a><br><br>
                                <table id="example" class="display cell-border border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" >Category</th>
                                            <th rowspan="2" >Keywords</th>
                                            <th rowspan="2" >Concern</th>
                                            <th rowspan="2" >Proposed Solution</th>
                                            <th rowspan="2" >Comments</th>
                                            <th colspan="3" style="text-align:center">Total number of responses</th>
                                           

                                        </tr>
                                            <tr>
                                                <th>Agree</th>
                                                <th>Like</th>
                                                <th>Neutral</th>
                                        </tr>
                                           
                                       
                                    </thead>
                                    <tbody>
                                    <?php
                                        for($i=0;$i<sizeof($cat_list);$i++){
                                            $sql = "SELECT category as cat,complaints_type.name as cat_name, keyword1, keyword2, keyword3,title, message, complaints.id as comp_id, complaints.create_date as com_date,solution FROM complaints left join complaints_type on complaints.category = complaints_type.id where complaints.org_id = '".$id."' and complaints_type.id = '".$cat_list[$i]['type_id']."' and CAST(complaints.create_date AS DATE) between '".$fortnight_date."' and '".$today_date."'";
                                        
                                         
                                            if($result = mysqli_query($link, $sql)){
                                                if(mysqli_num_rows($result) > 0){
                                                    $complaint_list = [];
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        $complaint_list[] = $row;
                                                        }
                                                            $size = sizeof($complaint_list);
                                                       
                                                        for($k=0;$k<sizeof($complaint_list);$k++){

                                                          
                                                            $comment_list = [];
                                                            $sql_comment = "SELECT * FROM complaints_comments left join users on complaints_comments.user_id = users.id where complaint_id = '".$complaint_list[$k]['comp_id']."'";
                                                                    if($result_comment = mysqli_query($link, $sql_comment)){
                                                                        if(mysqli_num_rows($result_comment) > 0){
                                                                            while($row_comment = mysqli_fetch_assoc($result_comment)){
                                                                                $comment_list[] = $row_comment;
                                                                            }
                                                                        }
                                                                       
                                                                    }
                                                                    
                                                                    $date=date_create($complaint_list[$k]['com_date']);
                                                          
                                                            echo '<tr>';
                                                            // if($k == 0){
                                                            // echo '<td rowspan="'.$size.'">
                                                            //    '.$cat_list[$i]['cat_name'].'</td>';
                                                            // }

                                                                echo '<td>
                                                                   '.$cat_list[$i]['cat_name'].'</td>';


                                                            echo '<td>'.$complaint_list[$k]['keyword1'].','.$complaint_list[$k]['keyword2'].','.$complaint_list[$k]['keyword3'].'</td>
                                                                <td ><b>'.$complaint_list[$k]['title'].'</b><br><b style="font-size:14px">('.date_format($date,"d/m/Y").')</b><br>'.urldecode($complaint_list[$k]['message']).'</td>';
                                                               echo '<td>'.urldecode($complaint_list[$k]['solution']).'</td>';
                                                                echo '<td>';
                                                            
                                                                if(sizeof($comment_list) == 0){
                                                                    echo "<i>No comments available</i>";
                                                                }
                                                                else{
                                                                    for($p=0;$p<sizeof($comment_list);$p++){
                                                                        echo "<p><b style='font-size:14px'>".$comment_list[$p]['name']."</b><br>".urldecode($comment_list[$p]['message'])."</p><hr>";
                                                                     }
                                                                }
                                                                
                                                                echo '</td>';
                                                            

                                                                echo '<td>';
                                                                $sql_agree = "SELECT count(*) as agree_no FROM complaints_stats where complaint_id = '".$complaint_list[$k]['comp_id']."' and reaction = 'Agree' ";
                                                                    if($result_agree = mysqli_query($link, $sql_agree)){
                                                                        if(mysqli_num_rows($result_agree) > 0){
                                                                            while($row_agree = mysqli_fetch_assoc($result_agree)){
                                                                                echo $row_agree['agree_no'];

                                                                            }
                                                                        }
                                                                       
                                                                    }

                                                                echo '</td>';
                                                                echo '<td>';
                                                                $sql_like = "SELECT count(*) as like_no FROM complaints_stats where complaint_id = '".$complaint_list[$k]['comp_id']."' and reaction = 'Like' ";
                                                                    if($result_like = mysqli_query($link, $sql_like)){
                                                                        if(mysqli_num_rows($result_like) > 0){
                                                                            while($row_like = mysqli_fetch_assoc($result_like)){
                                                                                echo $row_like['like_no'];

                                                                            }
                                                                        }
                                                                       
                                                                    }

                                                                echo '</td>';
                                                                echo '<td>';
                                                                $sql_neutral = "SELECT count(*) as neutral_no FROM complaints_stats where complaint_id = '".$complaint_list[$k]['comp_id']."' and reaction = 'Neutral' ";
                                                                    if($result_neutral = mysqli_query($link, $sql_neutral)){
                                                                        if(mysqli_num_rows($result_neutral) > 0){
                                                                            while($row_neutral = mysqli_fetch_assoc($result_neutral)){
                                                                                echo $row_neutral['neutral_no'];

                                                                            }
                                                                        }
                                                                       
                                                                    }

                                                                echo '</td>';
                                                                
                                                                
                                                             echo '</tr>';
                                                            }

                                                            
                                                        
                                                                 
                                                   
                                                } 
                                                
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
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
   
    <script>


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
                        title: 'Summary of Issues for the past <?php echo $days_period;?>',
                        stripHtml: false,
                        decodeEntities: true,
                        messageTop: function() {
                                return 'Name of Organization:  <?php echo $company_name;?>' +
                                    String.fromCharCode(10)+'Date of Report: <?php echo date('d/m/Y');?>'+
                                    String.fromCharCode(10)+'Period: <?php echo "From ".$show_fortnight_date." to ".date("d/m/Y");?>';
                            }
                    },
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        title: 'Summary of Issues for the past <?php echo $days_period;?>',
                        stripHtml: false,
                        decodeEntities: true,
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