<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "config/config.php";

$id = $_GET['id'];

// $sql0 = "SELECT *,DATEDIFF(sub_end_date,CURRENT_DATE) as day_to_exp FROM organization left join subscription on organization.id = subscription.org_id where organization.id = '".$_SESSION["org_id"]."' and sub_status = 1";

// if($result0 = mysqli_query($link, $sql0)){
//     if(mysqli_num_rows($result0) > 0){
//         while($row0 = mysqli_fetch_assoc($result0)){
//             $new_array[] = $row0;
//         }

//         if($new_array[0]['day_to_exp']<0){
//             $_SESSION["org_id"] = "";
//             echo "<script>";
//             echo "alert('Your subscription has ended. Please contact Painsboard to continue using our service.');";
//             echo "window.location = ' index.php'";
//             echo "</script>";

//         }
//     }
    
// }

            $sql = "SELECT count(*) as total_complaints FROM complaints where org_id = '".$id."'";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $total_complaints = $row['total_complaints'];

                        }
                    }
                    else{
                        $total_complaints = "0";
                    }
                }

            $sql2 = "SELECT count(*) as total_new FROM complaints where org_id = '".$id."' and status = 'New'";
                if($result2 = mysqli_query($link, $sql2)){
                    if(mysqli_num_rows($result2) > 0){
                        while($row2 = mysqli_fetch_array($result2)){
                            $total_new = $row2['total_new'];
                        }
                    }
                    else{
                        $total_new = "0";
                    }
                }

                $sql3 = "SELECT count(*) as total_in_review FROM complaints where org_id = '".$id."' and status = 'In Review'";
                if($result3 = mysqli_query($link, $sql3)){
                    if(mysqli_num_rows($result3) > 0){
                        while($row3 = mysqli_fetch_array($result3)){
                            $total_in_review = $row3['total_in_review'];
                        }
                    }
                    else{
                        $total_in_review = "0";
                    }
                }

                $sql4 = "SELECT count(*) as total_resolved FROM complaints where org_id = '".$id."' and status = 'Resolved'";
                if($result4 = mysqli_query($link, $sql4)){
                    if(mysqli_num_rows($result4) > 0){
                        while($row4 = mysqli_fetch_array($result4)){
                            $total_resolved = $row4['total_resolved'];
                        }
                    }
                    else{
                        $total_resolved = "0";
                    }
                }

                $sql5 = "SELECT create_date FROM organization where id = '".$id."'";
                if($result5 = mysqli_query($link, $sql5)){
                    if(mysqli_num_rows($result5) > 0){
                        while($row5 = mysqli_fetch_array($result5)){
                            $start_date = $row5['create_date'];

                            $date = new DateTime($start_date); // Y-m-d
                            $date->add(new DateInterval('P30D'));
                            // echo $date->format('Y-m-d') . "\n";
                            $end_date = $date->format('d/m/Y');
                        }
                    }

                
                   
                }


                $sql6 = "SELECT * FROM subscription where org_id = '".$id."'  and sub_status = '1'  order by id desc limit 1";
                if($result6 = mysqli_query($link, $sql6)){
                    if(mysqli_num_rows($result6) > 0){
                        while($row6 = mysqli_fetch_array($result6)){
                            $sub_type = $row6['sub_type'];
                            $sub_end_date = $row6['sub_end_date'];

                           
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
                                
                                <div class="funfact-boxes">
                                    <div class="funfact-box color-one wow fadeInRight" data-wow-delay="0.3s">
                                        <div class="fanfact-icon">
                                            <img src="img/home_support/fun-fact-1.png" alt="funfact">
                                        </div>
                                        <div class="counter"><?php echo $total_complaints;?></div>
                                        <h3 class="title">Total</h3>
                                    </div>
                                    <!-- /.funfact-box -->
                
                                    <div class="funfact-box text-center color-two wow fadeInRight" data-wow-delay="0.5s">
                                        <div class="fanfact-icon">
                                        <img src="img/home_two/Bell.png" alt="funfact">
                                        </div>
                                        <div class="counter"><?php echo $total_new;?></div>
                                        <h3 class="title">New</h3>
                                    </div>
                                    <!-- /.funfact-box text-center -->
                
                                    <div class="funfact-box text-center color-three wow fadeInRight" data-wow-delay="0.7s">
                                        <div class="fanfact-icon">
                                            <img src="img/home_support/fun-fact-3.png" alt="funfact">
                                        </div>
                                        <div class="counter"><?php echo $total_in_review;?></div>
                                        <h3 class="title">In Review</h3>
                                    </div>
                                    <!-- /.funfact-box text-center -->
                
                                    <div class="funfact-box text-center color-four wow fadeInRight" data-wow-delay="0.9s">
                                        <div class="fanfact-icon">
                                            <img src="img/home_support/fun-fact-4.png" alt="funfact">
                                        </div>
                                        <div class="counter"><?php echo $total_resolved;?></div>
                                        <h3 class="title">Resolved</h3>
                                    </div>
                                    <!-- /.funfact-box text-center -->
                
                                    
                                </div>
                                <div class="border_bottom"></div>
                            </article>
                            <blockquote class="media notice notice-success">
                                <i class="icon_menu-square_alt2"></i>
                                <div class="media-body">
                                    <h5>Subscription</h5>
                                    <p>Your subscription plan "<?php echo $sub_type;?>" will expire on <?php echo $sub_end_date;?></p>
                                </div>
                            </blockquote>
                            <div class="alert media message_alert alert-info fade show" role="alert">
                                <i class="icon_info_alt"></i>
                                <div class="media-body">
                                    <h5>Your organization’s unique URL to be shared with your stakeholders </h5>
                                    <p>Your unique URL is <a href="https://painsboard.com/org/index.php?id=<?php echo $id;?>">https://painsboard.com/org/index.php?id=<?php echo $id;?></a></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       
                                    </button>
                                </div>
                            </div>

                            <h4>Concern&nbsp;</h4>
                            <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Complaints</th>
                                            <!-- <th>Title</th>
                                            <th>Message</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            
                                        $sql = "SELECT *,complaints.id as cid,complaints.create_date as complaint_create, users.name as username FROM complaints left join users on complaints.user_id = users.id left join complaints_type on complaints.category = complaints_type.id where complaints.org_id = '".$id."' order by complaints.id desc";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo "<tr>";
                                                        echo '<td><div class="community-post style-two kbDoc richard bug">
                                                        <div class="post-content">';
                                                            if($row['picture']!= NULL && $row['picture']!= ""){
                                                                echo ' <div class="author-avatar">
                                                                <img src="data:image/png;base64,'.$row['picture'].'" alt="community post">
                                                                </div>';
                                                            }
                                                            else{
                                                                echo ' <div class="author-avatar">
                                                                    <img src="../img/logo_painsboard/user.png" alt="community post">
                                                                    </div>';
                                                            }
                                                           echo '<div class="entry-content">
                                                                <p><label style="font-size:14px;line-height: 10px;">
                                                                    <a>'. $row['username'] .'</a>
                                                                </label>
                                                                </p>
                                                                <h6 >
                                                                    <a target="_blank" style="color:black;" href="org/complaints.php?id='. $row['org_id'] .'&c_id='. $row['cid'] .'">'. $row['title'] .'</a>
                                                                </h6>
                                                                
                                                                <p>'.mb_strimwidth(urldecode($row['message']),0,300,'...<a href="#" data-toggle="modal" data-target="#myModal" onclick="showComplaint(\''. $row['title'] .'\',\''. $row['name'] .'\',\''. $row['keyword1'] .'\',\''. $row['keyword2'] .'\',\''. $row['keyword3'] .'\',\''. $row['message'].'\',\''. $row['solution'] .'\',\''. $row['cid'] .'\',\''. $row['upload_files'] .'\',\''. $row['user_id'] .'\');"><b>See more</b></a>').'</p>
                                                                <ul class="meta">
                                                                    <li><img src="img/home_support/cmm1.png" alt="cmm"><a>'. $row['name'].'</a></li>
                                                                    <li><i class="icon_calendar"></i>'.date("d/m/Y", strtotime($row['complaint_create'])).'</li>
                                                                    <li><img src="img/home_support/cmm2.png" alt="cmm"><a>'. $row['status'].'</a></li>';
                                                                    $sql2 = "SELECT count(id) as comment_count from complaints_comments where complaint_id = '".$row['cid']."'";
                                                                    //echo $sql2."<br>";
                                                                    if($result2 = mysqli_query($link, $sql2)){
                                                                        if(mysqli_num_rows($result2) > 0){
                                                                            while($row2 = mysqli_fetch_array($result2)){
                                                                                if($row2['comment_count'] < 2){
                                                                                    echo '<li><i class="icon_comment_alt"></i>'.$row2['comment_count'].' comment</li>';
                                                                                }
                                                                                else if($row2['comment_count'] > 1){
                                                                                    echo '<li><i class="icon_comment_alt"></i>'.$row2['comment_count'].' comments</li>';
                                                                                }
                                                                               
                                                                            }
                                                                        }
                                                                       
                                                                    }

                                                                    $sql3 = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$row['cid']."' and reaction = 'Agree' ";
                                                                    //echo $sql2."<br>";
                                                                    if($result3 = mysqli_query($link, $sql3)){
                                                                        if(mysqli_num_rows($result3) > 0){
                                                                            while($row3 = mysqli_fetch_array($result3)){
                                                                                echo '<li><img style="height:15px" src="img/logo_painsboard/hand-shake.png" alt="">'.$row3['react_count'].'</li>';
                                                                               
                                                                            }
                                                                        }
                                                                        else{
                                                                            echo '<li><img style="height:15px" src="img/logo_painsboard/hand-shake.png" alt="">0</li>';
                                                                        }
                                                                       
                                                                    }

                                                                    $sql4 = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$row['cid']."' and reaction = 'Like' ";
                                                                    // echo $sql2."<br>";
                                                                    if($result4 = mysqli_query($link, $sql4)){
                                                                        if(mysqli_num_rows($result4) > 0){
                                                                            while($row4 = mysqli_fetch_array($result4)){
                                                                                echo '<li><img style="height:15px" src="img/logo_painsboard/like.png" alt="">'.$row4['react_count'].'</li>';
                                                                               
                                                                            }
                                                                        }
                                                                        else{
                                                                            echo '<li><img style="height:15px" src="img/logo_painsboard/like.png" alt="">0</li>';
                                                                        }
                                                                       
                                                                    }


                                                                    $sql5 = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$row['cid']."' and reaction = 'Neutral' ";
                                                                    // echo $sql2."<br>";
                                                                    if($result5 = mysqli_query($link, $sql5)){
                                                                        if(mysqli_num_rows($result5) > 0){
                                                                            while($row5 = mysqli_fetch_array($result5)){
                                                                                echo '<li><img style="height:15px" src="img/logo_painsboard/neutral.png" alt="">'.$row5['react_count'].'</li>';
                                                                               
                                                                            }
                                                                        }
                                                                        else{
                                                                            echo '<li><img style="height:15px" src="img/logo_painsboard/neutral.png" alt="">0</li>';
                                                                        }
                                                                       
                                                                    }
                                                               echo '</ul>
                                                            </div>
                                                        </div>
                                                        <div class="post-meta-wrapper">
                                                            <ul class="post-meta-info">
                                                                <li style="padding-left:40px"><a title="Show Complaint" data-toggle="modal" data-target="#myModal" onclick="showComplaint(\''. $row['title'] .'\',\''. $row['name'] .'\',\''. $row['keyword1'] .'\',\''. $row['keyword2'] .'\',\''. $row['keyword3'] .'\',\''. $row['message'] .'\',\''. $row['solution'] .'\',\''. $row['cid'] .'\',\''. $row['upload_files'] .'\',\''. $row['user_id'] .'\')"><span class="fa fa-eye"></span></a></li>
                                                                <li style="padding-left:0px"><a href="api/delete_complaint.php?org_id='. $row['org_id'] .'&id='. $row['cid'] .'" title="Remove Complaint"  onclick="return confirm(\'Are you sure you want to delete?\')"><span class="fa fa-trash"></span></a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div></td>';
                                                        //     echo "<td>" . $row['title'] . "</td>";
                                                        //     echo "<td>" . $row['message'] . "</td>";
                                                        //     echo "<td>" . $row['category'] . "</td>";
                                                        //     echo "<td>" . $row['status'] . "</td>";
                                                        // // echo "<td>" . $row['event_organizer'] . "</td>";
                                                        // // echo "<td><img src='https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=" . $row['event_id'] . "&choe=UTF-8'/></td>";
                                                        //     echo "<td width='20%'>";
                                                        //         echo '<a href="#" class="mr-3" title="Show Complaint" data-toggle="modal" data-target="#myModal" onclick="showComplaint(\''. $row['title'] .'\',\''. $row['category'] .'\',\''. $row['keyword1'] .'\',\''. $row['keyword2'] .'\',\''. $row['keyword3'] .'\',\''. $row['message'] .'\',\''. $row['solution'] .'\')"><span class="fa fa-eye"></span></a>';
                                                        //     echo "</td>";
                                                        echo "</tr>";
                                                    }

                                                // Free result set
                                                mysqli_free_result($result);
                                            } 
                                            
                                        } 

                                        // Close connection
                                        //mysqli_close($link);
                                    ?>
                                        
                                        
                                    </tbody>
                                
                            </table>
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
                                    <input type="hidden" class="form-control" name="user_id" id="user_id" >
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
    <script src="assets/counterup/jquery.counterup.min.js"></script>
    <script src="assets/counterup/jquery.waypoints.min.js"></script>
    <script src="assets/niceselectpicker/jquery.nice-select.min.js"></script>
    <script src="assets/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/datatable/datatables/datatable.custom.js"></script>
    <script src="js/main.js"></script>
    <script>

        $(function () {
        $('[data-toggle="popover"]').popover()
        })

		$("body.doc").removeClass("body_dark");

        $(document).ready(function() {
            $('#example').DataTable(
                {
                    "ordering": false
                }
            );
        } );

        function urldecode (str) {
            return decodeURIComponent((str + '').replace(/\+/g, '%20'));
            }


        function showComplaint(com_title, com_category,com_k1,com_k2,com_k3,com_message,com_solution,complaint_id,upload_file,user_id) {
            document.getElementById("title").innerHTML = com_title;
            document.getElementById("category").innerHTML = com_category;
            document.getElementById("keyword1").innerHTML = com_k1;
            document.getElementById("keyword2").innerHTML = com_k2;
            document.getElementById("keyword3").innerHTML = com_k3;
            document.getElementById("message").innerHTML = urldecode(com_message);
            document.getElementById("solution").innerHTML = urldecode(com_solution);
            document.getElementById("complaint_id").value = complaint_id;
            document.getElementById("user_id").value = user_id;
            if(upload_file  != ""){
                document.getElementById("uploaded_file").href = "attachments/"+upload_file;
                document.getElementById("uploaded_file").setAttribute('target', '_blank');
            }
        }
        
    </script>
</body>

</html>