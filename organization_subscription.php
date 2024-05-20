<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "config/config.php";

$id = $_GET['id'];
$end_date = "-";
$end_date_basic = "-";
$end_date_i = "-";
$end_date_a = "-";
$sql = "SELECT * FROM organization where id = '".$id."'";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){

                        $org_id = $row['id'];
                        $org_logo = $row['org_logo'];
                          
                        }                
                }                
            } 

            $sql5 = "SELECT * FROM subscription where org_id = '".$id."' and sub_type='30-Days FREE Trial' and sub_status='1' order by id desc limit 1";
           
                if($result5 = mysqli_query($link, $sql5)){
                    if(mysqli_num_rows($result5) > 0){
                        while($row5 = mysqli_fetch_array($result5)){
                            // $start_date = $row5['create_date'];

                            // $date = new DateTime($start_date); // Y-m-d
                            // $date->add(new DateInterval('P30D'));
                            // // echo $date->format('Y-m-d') . "\n";
                            // $end_date = $date->format('d/m/Y');
                            $end_date = $row5['sub_end_date'];
                        }
                    }
                   
                }

            $sql_basic = "SELECT * FROM subscription where org_id = '".$id."' and sub_type='Basic' and sub_status='1' order by id desc limit 1";
            if($result_basic = mysqli_query($link, $sql_basic)){
                if(mysqli_num_rows($result_basic) > 0){
                    while($row_basic = mysqli_fetch_array($result_basic)){
                       
                        $end_date_basic = $row_basic['sub_end_date'];
                    }
                }
                else{
                    $end_date_basic = "-";
                }
            
            }

            $sql_i = "SELECT * FROM subscription where org_id = '".$id."' and sub_type='Intermediate' and sub_status='1' order by id desc limit 1";
            if($result_i = mysqli_query($link, $sql_i)){
                if(mysqli_num_rows($result_i) > 0){
                    while($row_i = mysqli_fetch_array($result_i)){
                       
                        $end_date_i = $row_i['sub_end_date'];
                    }
                }
                else{
                    $end_date_i = "-";
                }
            
            }

            $sql_a = "SELECT * FROM subscription where org_id = '".$id."' and sub_type='Advance' and sub_status='1' order by id desc limit 1";
            if($result_a = mysqli_query($link, $sql_a)){
                if(mysqli_num_rows($result_a) > 0){
                    while($row_a = mysqli_fetch_array($result_a)){
                       
                        $end_date_a = $row_a['sub_end_date'];
                    }
                }
                else{
                    $end_date_a = "-";
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
                                            <li><a href="organization_detail.php?id=<?php echo $id;?>" >View Profile</a></li>
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
                                
                              
                            </article>

                            <h4>Subscription Status&nbsp;</h4>
                            <div class="small_text">Here is your organization’s current subscription status:</div>
                            <table class="table table_shortcode">
                                    <thead>
                                        <tr>
                                            <th>Package</th>
                                            <th>Fees Per Year (RM)</th>
                                            <th>Expiry Date</th>
                                            <th></th>
                                            <th></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>30-Day Free Trial</th>
                                            <td>RM 0</td>
                                            <td><?php if($end_date != "-"){
                                                    echo date_format(date_create($end_date),"d M Y");
                                            } 
                                            else{
                                                echo $end_date;
                                            }
                                            
                                            ?></td>
                                            <td><a href="signup.php">Registered</a></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Basic</th>
                                            <td>RM1,900</td>
                                            <td><?php if($end_date_basic != "-"){
                                                    echo date_format(date_create($end_date_basic),"d M Y");
                                            } 
                                            else{
                                                echo $end_date_basic;
                                            }
                                            
                                            ?></td>
                                            <td>
                                                <?php 
                                                    if($end_date_basic != "-"){
                                                ?>
                                                Subscribed
                                                <?php
                                                    }
                                                    else{
                                                ?>
                                                <a href="checkout.php?id=1">Subscribe</a>
                                                <?php } ?>
                                            </td>
                                            <td><a href="checkout.php?id=1">Renewal</a></td>
                                        </tr>
                                        <tr>
                                            <th>Intermediate</th>
                                            <td>RM4,900</td>
                                            <td><?php if($end_date_i != "-"){
                                                    echo date_format(date_create($end_date_i),"d M Y");
                                            } 
                                            else{
                                                echo $end_date_i;
                                            }
                                            
                                            ?></td>
                                            <td>
                                                <?php 
                                                    if($end_date_i != "-"){
                                                ?>
                                                Subscribed
                                                <?php
                                                    }
                                                    else{
                                                ?>
                                                <a href="checkout.php?id=2">Subscribe</a>
                                                <?php } ?>
                                            </td>
                                            <td><a href="checkout.php?id=2">Renewal</a></td>
                                        </tr>
                                        <tr>
                                            <th>Advanced</th>
                                            <td>RM9,900</td>
                                            <td><?php if($end_date_a != "-"){
                                                    echo date_format(date_create($end_date_a),"d M Y");
                                            } 
                                            else{
                                                echo $end_date_a;
                                            }
                                            
                                            ?></td>
                                            <td>
                                                <?php 
                                                    if($end_date_a != "-"){
                                                ?>
                                                Subscribed
                                                <?php
                                                    }
                                                    else{
                                                ?>
                                                <a href="checkout.php?id=3">Subscribe</a>
                                                <?php } ?>
                                            </td>
                                            <td><a href="checkout.php?id=3">Renewal</a></td>
                                        </tr>
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
                                <h6>Propose solution</h6>
                                <label id="solution" name="solution"></label>
                            </div>

                            <form method="post" action="api/update_complaint.php" class="contact_form">
                                <div class="col-lg-12 form-group">
                                    <h6>Reply</h6>
                                    <input type="hidden" class="form-control" name="complaint_id" id="complaint_id">
                                    <input type="hidden" class="form-control" name="org_id" id="org_id" value="<?php echo $id;?>"> 
                                    <textarea class="form-control message" id="reply" name="reply" placeholder="Write your reply"></textarea>
                                </div>
                                <div class="col-lg-12 form-group">
                                <h6>Status </h6>
                                <div class="form-group" >
                                    <select class="form-control" name="status" id="status">
                                        <option>Solved</option>
                                        <option>Rejected</option>
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
    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })

		$("body.doc").removeClass("body_dark");

        $(document).ready(function() {
            $('#example').DataTable();
        } );


        function showComplaint(com_title, com_category,com_k1,com_k2,com_k3,com_message,com_solution,complaint_id) {
            document.getElementById("title").innerHTML = com_title;
            document.getElementById("category").innerHTML = com_category;
            document.getElementById("keyword1").innerHTML = com_k1;
            document.getElementById("keyword2").innerHTML = com_k2;
            document.getElementById("keyword3").innerHTML = com_k3;
            document.getElementById("message").innerHTML = com_message;
            document.getElementById("solution").innerHTML = com_solution;
            document.getElementById("complaint_id").value = complaint_id;
        }
    </script>
</body>

</html>