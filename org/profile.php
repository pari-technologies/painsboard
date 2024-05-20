<?php
error_reporting(E_ERROR | E_PARSE); 
//echo "in login php";
// Include config file
session_start();
require_once "../config/config.php";
$id = $_GET['id'];
$uid = $_SESSION["user_id"];

        $sql = "SELECT count(*) as total_complaints FROM complaints where user_id = '".$uid."'";
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

        $sql2 = "SELECT count(*) as total_new FROM complaints where user_id = '".$uid."' and status = 'New'";
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

        $sql3 = "SELECT count(*) as total_in_review FROM complaints where user_id = '".$uid."' and status = 'In Review'";
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

        $sql4 = "SELECT count(*) as total_resolved FROM complaints where user_id = '".$uid."' and status = 'Resolved'";
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
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../assets/font-size/css/rvfs.css">
    <!-- icon css-->
    <link rel="stylesheet" href="../assets/elagent-icon/style.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/all.css">
    <link rel="stylesheet" href="../assets/niceselectpicker/nice-select.css">
    <link rel="stylesheet" href="../assets/animation/animate.css">
    <link rel="stylesheet" href="../assets/prism/prism.css">
    <link rel="stylesheet" href="../assets/prism/prism-coy.css">
    <link rel="stylesheet" href="../assets/mcustomscrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <title>PainsBoard</title>
    <link rel="stylesheet" href="../scss/_header.scss">
    <link rel="stylesheet" href="../scss/_doclist.scss">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
</head>

<body data-spy="scroll" data-target="#navbar-example3" data-offset="86" class="full-width-doc sticky-nav-doc doc">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="../img/logo_painsboard/logo3.jpeg" alt="" height="80"> 
                </div>
            </div>
            <!-- <h2 class="head">Did You Know?</h2>
            <p></p> -->
        </div>
    </div>
    <div class="body_wrapper sticky_menu">
        <nav class="navbar navbar-expand-lg menu_one display_none" id="stickyTwo">
            <div class="container-fluid pl-60 pr-60">
                <!-- <a class="navbar-brand" href="index.html">
                    <img src="img/logo.png" srcset="img/logo-2x.png 2x" alt="logo">
                </a> -->
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
                            <a href="index.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                            
                        </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="../api/logout.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logout</a>
                            
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
                        <span class="menu_toggle">
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
                            <a href="index.php?id=<?php echo $id;?>" class="nav-link">Home</a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a href="../api/logout.php?id=<?php echo $id;?>" class="nav-link">Logout</a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
                        </li>
                      

                    </ul>
                </nav>

                <div class="mobile_nav_bottom">
                    <aside class="doc_left_sidebarlist">
                    <div class="scroll">
                                <ul class="list-unstyled nav-sidebar">
                                    <li class="nav-item">
                                        <a href="profile.php?id=<?php echo $id;?>"  class="nav-link"><img src="../img/side-nav/home.png" alt="">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.php?id=<?php echo $id;?>"  class="nav-link"><img src="../img/side-nav/document2.png" alt="">File My Concern</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><img src="../img/side-nav/briefcase.png" alt="briefcase">User Profile</a>
                                        <span class="icon"><i class="arrow_carrot-down"></i></span>
                                        <ul class="list-unstyled dropdown_nav">
                                            <li><a href="profile_detail.php?id=<?php echo $id;?>">View Profile</a></li>
                                            <li><a href="profile_picture.php?id=<?php echo $id;?>">Change Profile Picture</a></li>
                                            <li><a href="profile_password.php?id=<?php echo $id;?>">Change Password</a></li>
                                        </ul>
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
                                        <a href="profile.php?id=<?php echo $id;?>"  class="nav-link"><img src="../img/side-nav/home.png" alt="">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.php?id=<?php echo $id;?>"  class="nav-link"><img src="../img/side-nav/document2.png" alt="">File My Concern</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><img src="../img/side-nav/briefcase.png" alt="briefcase">User Profile</a>
                                        <span class="icon"><i class="arrow_carrot-down"></i></span>
                                        <ul class="list-unstyled dropdown_nav">
                                            <li><a href="profile_detail.php?id=<?php echo $id;?>">View Profile</a></li>
                                            <li><a href="profile_picture.php?id=<?php echo $id;?>">Change Profile Picture</a></li>
                                            <li><a href="profile_password.php?id=<?php echo $id;?>">Change Password</a></li>
                                        </ul>
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
                                            <img src="../img/home_support/fun-fact-1.png" alt="funfact">
                                        </div>
                                        <div class="counter"><?php echo $total_complaints;?></div>
                                        <h3 class="title">Total</h3>
                                    </div>
                                    <!-- /.funfact-box -->
                
                                    <div class="funfact-box text-center color-two wow fadeInRight" data-wow-delay="0.5s">
                                        <div class="fanfact-icon">
                                            <img src="../img/home_two/Bell.png" alt="funfact">
                                        </div>
                                        <div class="counter"><?php echo $total_new;?></div>
                                        <h3 class="title">New</h3>
                                    </div>
                                    <!-- /.funfact-box text-center -->
                
                                    <div class="funfact-box text-center color-three wow fadeInRight" data-wow-delay="0.7s">
                                        <div class="fanfact-icon">
                                            <img src="../img/home_support/fun-fact-3.png" alt="funfact">
                                        </div>
                                        <div class="counter"><?php echo $total_in_review;?></div>
                                        <h3 class="title">In Review</h3>
                                    </div>
                                    <!-- /.funfact-box text-center -->
                
                                    <div class="funfact-box text-center color-four wow fadeInRight" data-wow-delay="0.9s">
                                        <div class="fanfact-icon">
                                            <img src="../img/home_support/fun-fact-4.png" alt="funfact">
                                        </div>
                                        <div class="counter"><?php echo $total_resolved;?></div>
                                        <h3 class="title">Resolved</h3>
                                    </div>
                                    <!-- /.funfact-box text-center -->
                
                                    
                                </div>
                                <h4>Concern&nbsp;</h4>
                            <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Concern</th>
                                            <!-- <th>Title</th>
                                            <th>Message</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            
                                        $sql = "SELECT *,complaints.create_date as com_date, complaints.id as com_id FROM complaints left join complaints_type on complaints.category = complaints_type.id where user_id = '".$uid."' order by complaints.id desc";
                                        
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo "<tr>";
                                                        echo '<td><div class="community-post style-two kbDoc richard bug">
                                                        <div class="post-content">
                                                            <div class="author-avatar">
                                                                <img src="../img/home_support/cp2.jpg" alt="community post">
                                                            </div>
                                                            <div class="entry-content">
                                                                <h3 class="post-title">
                                                                    <a href="#">'. $row['title'] .'</a>
                                                                </h3>
                                                                <p>'.mb_strimwidth(urldecode($row['message']),0,500,'...<a href="javascript:void(0)" onclick="showdetail(\''.$row['com_id'].'\');"><b>See more</b></a>').'</p>
                                                                <ul class="meta">
                                                                    <li><img src="../img/home_support/cmm1.png" alt="cmm"><a href="#">'. $row['name'].'</a></li>
                                                                    <li><i class="../icon_calendar"></i>'.date("d/m/Y", strtotime($row['com_date'])).'</li>
                                                                    <li><img src="../img/home_support/cmm2.png" alt="cmm"><a href="#">'. $row['status'].'</a></li>';
                                                                    $sql2 = "SELECT count(id) as comment_count from complaints_comments where complaint_id = '".$row['com_id']."'";
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

                                                                    $sql3 = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$row['com_id']."' and reaction = 'Agree' ";
                                                                    //echo $sql2."<br>";
                                                                    if($result3 = mysqli_query($link, $sql3)){
                                                                        if(mysqli_num_rows($result3) > 0){
                                                                            while($row3 = mysqli_fetch_array($result3)){
                                                                                echo '<li><img style="height:15px" src="../img/logo_painsboard/hand-shake.png" alt="">'.$row3['react_count'].'</li>';
                                                                               
                                                                            }
                                                                        }
                                                                        else{
                                                                            echo '<li><img style="height:15px" src="../img/logo_painsboard/hand-shake.png" alt="">0</li>';
                                                                        }
                                                                       
                                                                    }

                                                                    $sql4 = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$row['com_id']."' and reaction = 'Like' ";
                                                                    // echo $sql2."<br>";
                                                                    if($result4 = mysqli_query($link, $sql4)){
                                                                        if(mysqli_num_rows($result4) > 0){
                                                                            while($row4 = mysqli_fetch_array($result4)){
                                                                                echo '<li><img style="height:15px" src="../img/logo_painsboard/like.png" alt="">'.$row4['react_count'].'</li>';
                                                                               
                                                                            }
                                                                        }
                                                                        else{
                                                                            echo '<li><img style="height:15px" src="../img/logo_painsboard/like.png" alt="">0</li>';
                                                                        }
                                                                       
                                                                    }


                                                                    $sql5 = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$row['com_id']."' and reaction = 'Neutral' ";
                                                                    // echo $sql2."<br>";
                                                                    if($result5 = mysqli_query($link, $sql5)){
                                                                        if(mysqli_num_rows($result5) > 0){
                                                                            while($row5 = mysqli_fetch_array($result5)){
                                                                                echo '<li><img style="height:15px" src="../img/logo_painsboard/neutral.png" alt="">'.$row5['react_count'].'</li>';
                                                                               
                                                                            }
                                                                        }
                                                                        else{
                                                                            echo '<li><img style="height:15px" src="../img/logo_painsboard/neutral.png" alt="">0</li>';
                                                                        }
                                                                       
                                                                    }
                                                                echo '</ul>
                                                            </div>
                                                        </div>
                                                        <div class="post-meta-wrapper">
                                                            <ul class="post-meta-info">
                                                                <!--<li><a href="profile_detail_complaint.php?id='.$id.'&c_id='.$row['id'].'" class="mr-3" title="Edit Complaint" ><span class="fa fa-edit"></span></a></li>-->
                                                                <li style="padding-left:50px"><a href="#" id="showdetail'.$row['id'].'" class="mr-3" title="Show Complaint" data-toggle="modal" data-target="#myModal" onclick="showComplaint(\''. $row['title'] .'\',\''. $row['name'] .'\',\''. $row['keyword1'] .'\',\''. $row['keyword2'] .'\',\''. $row['keyword3'] .'\',\''. $row['message'] .'\',\''. $row['solution'] .'\',\''. $row['reply'] .'\',\''. $row['status'] .'\',\''. $row['upload_files'] .'\')"><span class="fa fa-eye"></span></a></li>';
                                                                
                                                            echo '</ul>
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
                            <div class="col-lg-9 form-group">
                                <h6>Reply</h6>
                                <label id="reply" name="reply"></label>
                            </div>
                            <div class="col-lg-9 form-group">
                                <h6>Status</h6>
                                <label id="status" name="status"></label>
                            </div>

                           
                            
                           
                        </div>
                    <!-- </form> -->
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
            </div>

        </div>
    </div>
        <footer class="simple_footer">
            <img class="leaf_right" src="img/home_one/leaf_footter.png" alt="">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <p>© 2024 All Rights Reserved by <a href="index.php?id=<?php echo $id;?>">PainsBoard</a></p>
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
    <div class="modal fade img_modal" id="exampleModal2" tabindex="-2" role="dialog" aria-hidden="false">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class=" icon_close"></i>
        </button>
        <div class="modal-dialog help_form" role="document">
            <div class="modal-content">
                <div class="shortcode_title">
                    <h1>How can we help?</h1>
                    <p>A premium WordPress theme with integrated Knowledge Base,<br>providing 24/7 community based support.</p>
                </div>
                <form action="#" class="contact_form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="Message" id="massage" placeholder="Massage"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn action_btn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/pre-loader.js"> </script>
    <script src="../assets/bootstrap/js/popper.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="../assets/font-size/js/rv-jquery-fontsize-2.0.3.js"></script>
    <script src="../js/parallaxie.js"></script>
    <script src="../js/TweenMax.min.js"></script>
    <script src="../js/jquery.wavify.js"></script>
    <script src="../js/anchor.js"></script>
    <script src="../assets/wow/wow.min.js"></script>
    <script src="../assets/prism/prism.js"></script>
    <script src="../assets/counterup/jquery.counterup.min.js"></script>
    <script src="../assets/counterup/jquery.waypoints.min.js"></script>
    <script src="../assets/niceselectpicker/jquery.nice-select.min.js"></script>
    <script src="../assets/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../assets/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/datatable/datatables/datatable.custom.js"></script>
    <script>
         $(function () {
        $('[data-toggle="popover"]').popover()
        })
        
		$("body.doc").removeClass("body_dark");

        $(document).ready(function() {
            $('#example').DataTable({
                    "ordering": false
                });
        } );

        function urldecode (str) {
            return decodeURIComponent((str + '').replace(/\+/g, '%20'));
            }

        function showComplaint(com_title, com_category,com_k1,com_k2,com_k3,com_message,com_solution,reply,status,upload_file) {
            document.getElementById("title").innerHTML = com_title;
            document.getElementById("category").innerHTML = com_category;
            document.getElementById("keyword1").innerHTML = com_k1;
            document.getElementById("keyword2").innerHTML = com_k2;
            document.getElementById("keyword3").innerHTML = com_k3;
            document.getElementById("message").innerHTML = urldecode(com_message);
            document.getElementById("solution").innerHTML = urldecode(com_solution);
            document.getElementById("reply").innerHTML = reply;
            document.getElementById("status").innerHTML = status;
            if(upload_file  != ""){
                document.getElementById("uploaded_file").href = "../attachments/"+upload_file;
                document.getElementById("uploaded_file").setAttribute('target', '_blank');
            }
           
        }

        function showdetail(id){
            document.getElementById("showdetail"+id).click();
        }
    </script>
</body>

</html>