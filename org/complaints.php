<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "../config/config.php";

$id = $_GET['id'];
$complaint_id = $_GET['c_id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM organization where id = '".$id."'";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){

                        $org_logo = $row['org_logo'];
                        $org_name = $row['org_name'];
                           
                        }                
                }                
            } 

$sql2 = "SELECT *,complaints.create_date as com_date,complaints_type.name as com_name FROM complaints left join users on complaints.user_id = users.id left join complaints_type on complaints.category = complaints_type.id where complaints.id = '".$complaint_id."'";
            if($result2 = mysqli_query($link, $sql2)){
                if(mysqli_num_rows($result2) > 0){
                    while($row2 = mysqli_fetch_array($result2)){
                        // print_r($row2);
                        $user_name = $row2['username'];
                        $category = $row2['com_name'];
                        $date_create = date("d/m/Y", strtotime($row2['com_date']));
                        $title = $row2['title'];
                        $message = urldecode($row2['message']);
                        $replies = $row2['reply'];
                        $keyword1 = $row2['keyword1'];
                        $keyword2 = $row2['keyword2'];
                        $keyword3 = $row2['keyword3'];
                        $files = $row2['upload_files'];
                        $picture = $row2['picture'];
                           
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
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- icon css-->
    <link rel="stylesheet" href="../assets/elagent-icon/style.css">
    <link rel="stylesheet" href="../assets/animation/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <title>PainsBoard</title>
</head>

<body data-scroll-animation="true">
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
<div class="body_wrapper">
<nav class="navbar navbar-expand-lg menu_two" id="sticky">
        <div class="container">
        <a class="navbar-brand" href="../index.php?id=<?php echo $id;?>">
            <img src="../img/logo_painsboard/logo3.jpeg"  alt="logo" height="50">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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
               
                <ul class="navbar-nav menu dk_menu ml-auto">
                        <li class="nav-item dropdown search">
                            <form action="#" method="get" class="search_form">
                                <input type="search" class="form-control" placeholder="Search for">
                                <button type="submit"><i class="icon_search"></i></button>
                            </form>
                        </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="index.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Home</a>
                      
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="about.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">About</a>
                      
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Announcements
                        </a>
                        <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                           data-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="statements.php?id=<?php echo $id;?>" class="nav-link">Statements</a></li>
                            <li class="nav-item"><a href="books.php?id=<?php echo $id;?>" class="nav-link">Books</a></li>
                            <li class="nav-item"><a href="ebooks.php?id=<?php echo $id;?>" class="nav-link">Free eBooks</a></li>
                            <li class="nav-item"><a href="article.php?id=<?php echo $id;?>" class="nav-link">Articles</a></li>
                            <!-- <li class="nav-item"><a href="videos.php?id=<?php echo $id;?>" class="nav-link">Videos</a></li> -->
                        </ul>
                    </li>
                   
                    <?php
                        if(!isset($_SESSION['user_id'])){
                            
                    ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="signin.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign In</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="signup.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign Up</a>
                    </li>
                    <?php
                        }

                        else{
                            if($_SESSION['user_id'] == ""){

                                ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="signin.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign In</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="signup.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign Up</a>
                    </li>

                    <?php

                            }

                            else{


                                ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="profile.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dashboard</a>
                    </li>

                <?php
                            }
                        }
                    ?>
                    
                   
               <!--  <a class="nav_btn" href="signup.php"><i class="icon_profile"></i>Register</a> -->
                </ul>
                <a class="action_btn" style="margin-left: 80px;padding: 8px 25px;" href="contact.php?id=<?php echo $id;?>">File My Concern</a>
            </div>
        </div>
    </nav>
   
    <section class="doc_blog_grid_area sec_pad forum-single-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Forum post top area -->
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="forum-post-top">
                                    <?php
                                      if($picture!=NULL && $picture!=""){
                                    ?>
                                    <a class="author-avatar" href="#">
                                        <img src="data:image/png;base64,<?php echo $picture;?>" alt="" height="70">
                                    </a>

                                    <?php
                                    }
                                    else{

                                    ?>
                                    <a class="author-avatar" href="#">
                                        <img src="../img/logo_painsboard/user.png" alt="">
                                    </a>
                                    <?php  } ?>
                                    <div class="forum-post-author">
                                        <a class="author-name" href="#"><?php echo $user_name;?></a>
                                        <div class="forum-author-meta">
                                            <div class="author-badge">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="15px">
                                                    <path fill-rule="evenodd"  fill="rgb(131, 135, 147)"
                                                          d="M11.729,12.136 L11.582,12.167 C11.362,12.415 11.125,12.645 10.869,12.857 L14.999,12.857 C15.134,12.857 15.255,12.944 15.307,13.077 C15.359,13.211 15.331,13.365 15.235,13.467 L14.488,14.268 C14.053,14.733 13.452,15.000 12.838,15.000 L2.495,15.000 C1.872,15.000 1.286,14.740 0.845,14.268 L0.098,13.467 C0.002,13.365 -0.026,13.211 0.026,13.077 C0.077,12.944 0.199,12.857 0.334,12.857 L4.463,12.857 C2.928,11.585 2.000,9.630 2.000,7.499 L2.000,6.785 C2.000,6.194 2.449,5.713 3.000,5.713 L12.333,5.713 C12.885,5.713 13.333,6.194 13.333,6.785 L13.333,7.343 C13.869,7.160 14.736,6.973 15.355,7.400 C15.783,7.696 16.000,8.209 16.000,8.928 C16.000,11.239 11.903,12.100 11.729,12.136 ZM14.994,8.002 C14.557,7.698 13.715,7.941 13.294,8.113 C13.197,9.261 12.837,10.339 12.255,11.269 C13.480,10.911 15.333,10.116 15.333,8.928 C15.333,8.462 15.223,8.158 14.994,8.002 ZM10.261,4.419 C10.376,4.573 10.353,4.798 10.209,4.921 C10.148,4.974 10.074,4.999 10.001,4.999 C9.903,4.999 9.807,4.954 9.740,4.865 C9.198,4.139 9.198,3.002 9.741,2.277 C10.086,1.816 10.086,1.040 9.742,0.580 C9.627,0.426 9.650,0.201 9.794,0.078 C9.937,-0.044 10.146,-0.020 10.263,0.134 C10.805,0.860 10.805,1.996 10.263,2.722 C9.917,3.183 9.917,3.959 10.261,4.419 ZM8.259,4.419 C8.373,4.573 8.350,4.798 8.207,4.921 C8.145,4.974 8.071,4.999 7.999,4.999 C7.901,4.999 7.804,4.954 7.738,4.865 C7.195,4.139 7.195,3.002 7.738,2.277 C8.082,1.816 8.082,1.040 7.739,0.580 C7.624,0.426 7.647,0.201 7.791,0.078 C7.935,-0.045 8.145,-0.020 8.259,0.134 C8.802,0.860 8.802,1.996 8.259,2.722 C7.915,3.183 7.915,3.959 8.259,4.419 ZM6.261,4.418 C6.376,4.572 6.353,4.797 6.210,4.920 C6.148,4.973 6.074,4.999 6.001,4.999 C5.903,4.999 5.807,4.953 5.741,4.865 C5.198,4.139 5.198,3.002 5.741,2.276 C6.085,1.815 6.085,1.039 5.742,0.580 C5.627,0.426 5.650,0.201 5.794,0.078 C5.937,-0.046 6.147,-0.020 6.262,0.133 C6.804,0.859 6.804,1.996 6.262,2.721 C5.918,3.182 5.918,3.959 6.261,4.418 Z"/>
                                                </svg>
                                                <span><?php echo $category;?></span>
                                            </div>
                                            <div class="author-badge">
                                                <i class="icon_calendar"></i>
                                                <a href=""><?php echo $date_create;?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Forum post content -->
                        <div class="q-title">
                            <span class="question-icon" title="Question">Q:</span>
                            <h1><?php echo $title;?></h1>
                            
                        </div>
                        <div class="forum-post-content">
                            <div class="content">
                                <p><?php echo $message; ?></p>
                                
                            </div>
                            <?php 
                            if($files!= NULL && $files!= ""){
                             ?>
                            <div class="content">
                                <p><a href="../attachments/<?php echo $files; ?>" target="_blank">Click to view uploaded file</a></p>
                                
                            </div>


                            <?php } ?>
                            <div class="forum-post-btm">
                                <div class="taxonomy forum-post-tags">
                                    <i class="icon_tags_alt"></i><a href="#"><?php echo $keyword1; ?></a>, <a href="#"><?php echo $keyword2; ?></a>, <a href="#"><?php echo $keyword3; ?></a>
                                </div>
                                <div class="taxonomy forum-post-cat">
                                    <div style="display: flex;justify-content: flex-end;">
                                        <div>
                                        <a href="javascript:void(0)" class="agree-counter" ><img style="height:20px" src="../img/logo_painsboard/hand-shake.png" alt=""></a>
                                        <br>
                                        &nbsp;&nbsp;<span class="click-text"><a id="agree_clicks"></a></span>
                                       
                                        </div>

                                        <div>
                                        <a href="javascript:void(0)" class="like-counter" ><img style="height:20px" src="../img/logo_painsboard/like.png" alt=""></a>
                                        <br>
                                        &nbsp;&nbsp;<span class="click-text"><a id="like_clicks"></a></span>
                                       
                                        </div>


                                        <div>
                                        <a href="javascript:void(0)" class="neutral-counter" ><img style="height:20px" src="../img/logo_painsboard/neutral.png" alt=""></a>
                                        <br>
                                        &nbsp;&nbsp;<span class="click-text"><a id="neutral_clicks"></a></span>
                                       
                                        </div>


                                        <!-- <div>
                                        <a href="#" ><img style="height:20px" src="../img/logo_painsboard/neutral.png" alt=""></a>
                                        <br>
                                        <label>&nbsp;0</label>
                                        </div> -->
                                        
                                       
                                        &nbsp;
                                        
                                        &nbsp;
                                        
                                    </div> 
                                </div>
                                
                            </div>
                            <div class="">
                                <div class=" ">
                                    &nbsp;
                                <h5 class="title">Your Comment</h5>
                                </div>
                                <?php 
                                    if($_SESSION["user_id"] != ""){

                                   
                                ?>
                                <div class="col-lg-12">
                                    <form action="../api/add_comment_complaint.php"  method="post">
                                        <textarea id="message" name="message" rows="4" cols="60"></textarea>
                                        <input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $id;?>">
                                        <input type="hidden" class="form-control" id="c_id" name="c_id" value="<?php echo $complaint_id;?>">
                                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $_SESSION["user_id"];?>">

                                        <button type="submit" class="btn action_btn thm_btn">Submit</button>
                                    </form>

                                </div>
                                   
                                <?php
                                    }
                                    else{
                                        
                                        ?>
                                    <div class="col-lg-9">
                                        <p>Please sign in to comment.</p>
                                    </div>
                                <?php
                                        
                                    }
                                ?>
                                
                            </div>
                            
                        </div>

                        <?php
                            if(!$replies == NULL){
                        ?>
                        <!-- Best answer -->
                        <div class="best-answer">
                            <div class="row">
                                <div class="col-lg-9">
                                    <!-- <div class="forum-post-top">
                                        <a class="author-avatar" href="#">
                                            <img src="../img/home_support/cp2.jpg" alt="">
                                        </a>
                                        <div class="forum-post-author">
                                            <a class="author-name" href="#"> Eh Jewel </a>
                                            <div class="forum-author-meta">
                                                <div class="author-badge">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="15px">
                                                        <path fill-rule="evenodd"  fill="rgb(131, 135, 147)"
                                                              d="M11.729,12.136 L11.582,12.167 C11.362,12.415 11.125,12.645 10.869,12.857 L14.999,12.857 C15.134,12.857 15.255,12.944 15.307,13.077 C15.359,13.211 15.331,13.365 15.235,13.467 L14.488,14.268 C14.053,14.733 13.452,15.000 12.838,15.000 L2.495,15.000 C1.872,15.000 1.286,14.740 0.845,14.268 L0.098,13.467 C0.002,13.365 -0.026,13.211 0.026,13.077 C0.077,12.944 0.199,12.857 0.334,12.857 L4.463,12.857 C2.928,11.585 2.000,9.630 2.000,7.499 L2.000,6.785 C2.000,6.194 2.449,5.713 3.000,5.713 L12.333,5.713 C12.885,5.713 13.333,6.194 13.333,6.785 L13.333,7.343 C13.869,7.160 14.736,6.973 15.355,7.400 C15.783,7.696 16.000,8.209 16.000,8.928 C16.000,11.239 11.903,12.100 11.729,12.136 ZM14.994,8.002 C14.557,7.698 13.715,7.941 13.294,8.113 C13.197,9.261 12.837,10.339 12.255,11.269 C13.480,10.911 15.333,10.116 15.333,8.928 C15.333,8.462 15.223,8.158 14.994,8.002 ZM10.261,4.419 C10.376,4.573 10.353,4.798 10.209,4.921 C10.148,4.974 10.074,4.999 10.001,4.999 C9.903,4.999 9.807,4.954 9.740,4.865 C9.198,4.139 9.198,3.002 9.741,2.277 C10.086,1.816 10.086,1.040 9.742,0.580 C9.627,0.426 9.650,0.201 9.794,0.078 C9.937,-0.044 10.146,-0.020 10.263,0.134 C10.805,0.860 10.805,1.996 10.263,2.722 C9.917,3.183 9.917,3.959 10.261,4.419 ZM8.259,4.419 C8.373,4.573 8.350,4.798 8.207,4.921 C8.145,4.974 8.071,4.999 7.999,4.999 C7.901,4.999 7.804,4.954 7.738,4.865 C7.195,4.139 7.195,3.002 7.738,2.277 C8.082,1.816 8.082,1.040 7.739,0.580 C7.624,0.426 7.647,0.201 7.791,0.078 C7.935,-0.045 8.145,-0.020 8.259,0.134 C8.802,0.860 8.802,1.996 8.259,2.722 C7.915,3.183 7.915,3.959 8.259,4.419 ZM6.261,4.418 C6.376,4.572 6.353,4.797 6.210,4.920 C6.148,4.973 6.074,4.999 6.001,4.999 C5.903,4.999 5.807,4.953 5.741,4.865 C5.198,4.139 5.198,3.002 5.741,2.276 C6.085,1.815 6.085,1.039 5.742,0.580 C5.627,0.426 5.650,0.201 5.794,0.078 C5.937,-0.046 6.147,-0.020 6.262,0.133 C6.804,0.859 6.804,1.996 6.262,2.721 C5.918,3.182 5.918,3.959 6.261,4.418 Z"/>
                                                    </svg>
                                                    <span>Conversation Starter</span>
                                                </div>
                                                <div class="author-badge">
                                                    <i class="icon_calendar"></i>
                                                    <a href="">January 16 at 10:32 PM</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-lg-3">
                                    <p class="accepted-ans-mark">
                                        <i class="icon_check"></i> <span>Responded by the Organization</span>
                                    </p>
                                </div>
                            </div>
                            <div class="best-ans-content d-flex">
                                <span class="question-icon" title="The Best Answer">A:</span>
                                <p>
                                    <?php 
                                    echo $replies;
                                    ?>
                                </p>
                            </div>
                        </div>

                        <?php
                            }

                            else if($replies == "" || $replies == NULL){

                                ?>

                        <div class="best-answer">
                            <div class="row">
                                <div class="col-lg-9">
                                   <p>No reply from organization yet</p>
                                </div>
                                
                            </div>
                            
                        </div>

                        <?php
                            }
                        ?>

                    <div class="all-answers">
                            <h3 class="title">All Comments</h3>
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                        <tr>
                                            <th></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            
                                        $sql = "SELECT *,complaints_comments.create_date as comment_create FROM complaints_comments left join users on complaints_comments.user_id = users.id where complaints_comments.complaint_id = '".$complaint_id."' order by complaints_comments.id desc";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo "<tr>";
                                                        echo '<td><div class="forum-comment">
                                                        <div class="forum-post-top">';
                                                        if($row['picture']!= NULL && $row['picture']!= "" ){
                                                            echo ' <a class="author-avatar" href="#">
                                                            <img src="data:image/png;base64,'.$row['picture'] .'" alt="author avatar 22" height="50">
                                                        </a>';
                                                        }
                                                        else{
                                                            echo ' <a class="author-avatar" href="#">
                                                            <img src="../img/logo_painsboard/user.png" alt="author avatar">
                                                        </a>';
                                                        }
                                                           
                                                        echo  '<div class="forum-post-author">
                                                                <a class="author-name" href="#">'. $row['name'] .'</a>
                                                                <div class="forum-author-meta">
                                                                   
                                                                    <div class="author-badge">
                                                                        <i class="icon_calendar"></i>
                                                                        <a href="">'.date("d/m/Y", strtotime($row['comment_create'])).'</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment-content">
                                                            <p>'.urldecode($row['message']).'</p>
                                                           
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
                    <!-- /.col-lg-8 -->

                    <div class="col-lg-4">
                    <div class="forum_sidebar">
                    
                    <div class="widget tag_widget">
                            <h4 class="c_head">Keywords</h4>
                            <ul class="list-unstyled w_tag_list style-light">
                                <?php
                                $sql_k1 = "SELECT keyword1, COUNT(keyword1) as count_k from complaints where org_id = '".$id."' group by keyword1 order by count_k desc limit 4";
                                // echo $sql_k1;
                                if($result_k1 = mysqli_query($link, $sql_k1)){
                                    if(mysqli_num_rows($result_k1) > 0){
                                        while($row_k1 = mysqli_fetch_array($result_k1)){
                                            if($row_k1['keyword1']!= NULL){
                                                echo '<li><a href="#">'.$row_k1['keyword1'].'</a></li>';
                                            }
                                        }
                                    }
                                }
                                ?>

                                <?php
                                $sql_k2 = "SELECT keyword2, COUNT(keyword2) as count_k from complaints where org_id = '".$id."' group by keyword2 order by count_k desc limit 4";
                                //echo $sql_k1;
                                if($result_k2 = mysqli_query($link, $sql_k2)){
                                    if(mysqli_num_rows($result_k2) > 0){
                                        while($row_k2 = mysqli_fetch_array($result_k2)){
                                            if($row_k2['keyword2']!= NULL){
                                                echo '<li><a href="#">'.$row_k2['keyword2'].'</a></li>';
                                            }
                                        }
                                    }
                                }
                                ?>

                                <?php
                                $sql_k3 = "SELECT keyword3, COUNT(keyword3) as count_k from complaints where org_id = '".$id."' group by keyword3 order by count_k desc limit 4";
                                //echo $sql_k1;
                                if($result_k3 = mysqli_query($link, $sql_k3)){
                                    if(mysqli_num_rows($result_k3) > 0){
                                        while($row_k3 = mysqli_fetch_array($result_k3)){
                                            if($row_k3['keyword3']!= NULL){
                                                echo '<li><a href="#">'.$row_k3['keyword3'].'</a></li>';
                                            }
                                        }
                                    }
                                }
                                ?>
                                <!-- <li><a href="#">Swagger</a></li>
                                <li><a href="#">KbDoc</a></li>
                                <li><a href="#">weCare</a></li>
                                <li><a href="#">Business</a></li> -->
                                <!-- <li><a href="#">Download</a></li>
                                <li><a href="#">Doc</a></li>
                                <li><a href="#">Product board</a></li>
                                <li><a href="#">WordPress</a></li> -->
                                <!-- <li><a href="#">Design</a></li>
                                <li><a href="#">ui/ux</a></li>
                                <li><a href="#">Doc Design</a></li>
                                <li><a href="#">DocAll</a></li> -->
                            </ul>
                        </div>
                    
                        
                        <div class="widget ticket_widget">
                            <h4 class="c_head">Complaint Categories<small><i> /Kategori Masalah</i></small></h4>

                            <ul class="list-unstyled ticket_categories">
                                <?php
                                $sql_cat = "SELECT category,complaints_type.name as cat_name, COUNT(category) as count_cat from complaints left join complaints_type on complaints.category = complaints_type.id where complaints.org_id = '".$id."' group by category order by count_cat desc";
                                //echo $sql_k1;
                                if($result_cat = mysqli_query($link, $sql_cat)){
                                    if(mysqli_num_rows($result_cat) > 0){
                                        while($row_cat = mysqli_fetch_array($result_cat)){
                                            echo '<li><img src="../img/home_support/cmm2.png" alt="category"><a href="#">'.$row_cat['cat_name'].'</a> <span class="count">'.$row_cat['count_cat'].'</span></li>';
                                        }
                                    }
                                }
                                ?>
                                <!-- <li><img src="../img/home_support/cmm5.png" alt="category"><a href="#">Docs WordPress
                                        Theme</a> <span class="count">10</span></li>
                                <li><img src="../img/home_support/cmm4.png" alt="category"><a href="#">Product Landing
                                        Page</a><span class="count count-fill">13</span><span
                                        class="../count">54</span></li>
                                <li><img src="../img/home_support/cmm2.png" alt="category"><a href="#">Knowledge base
                                        Template</a><span class="count">142</span></li>
                                <li><img src="../img/home_support/cmm8.png" alt="category"><a href="#">Startup and App
                                        WP Theme</a> <span class="count">13</span></li>
                                <li><img src="../img/home_support/cmm9.png" alt="category"><a href="#">Clean Email
                                        Template</a> <span class="count">123</span></li>
                                <li><img src="../img/home_support/cmm10.png" alt="category"><a href="#">Apps WordPress
                                        Theme</a> <span class="count">18</span></li> -->
                            </ul>
                        </div>

                        <div class="widget usefull_links_widget">
                            <h4 class="c_head">Usefull Links</h4>
                            <ul class="list-unstyled usefull-links">
                                <li><i class="icon_lightbulb_alt"></i><a href="#">FAQs</a></li>
                                <li><i class="icon_clock_alt"></i><a href="#">Resources</a></li>
                                <li><i class="icon_clock_alt"></i><a href="#">Popular</a></li>
                                <li><i class="icon_piechart"></i><a href="#">Recent</a></li>
                                <li><i class="icon_info_alt"></i><a href="#">Unanswered</a></li>
                            </ul>
                        </div>
                        

                    </div>
                </div>
                <!-- /.col-lg-4 -->
                </div>
            </div>
        </section>
    


    <footer class="footer_area footer_p_top f_bg_color">
        
        <div class="footer_bottom text-center">
            <div class="container">
                <p>© 2024 All Rights Reserved by <a href="index.php?id=<?php echo $id;?>">PainsBoard</a></p>
            </div>
        </div>
    </footer>
</div>

<!-- Back to top button -->
<a id="back-to-top" title="Back to Top"></a>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/pre-loader.js"></script>
<script src="../assets/bootstrap/js/popper.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/parallaxie.js"></script>
<script src="../js/TweenMax.min.js"></script>
<script src="../js/jquery.wavify.js"></script>
<script src="../assets/wow/wow.min.js"></script>
<script src="../assets/counterup/jquery.counterup.min.js"></script>
<script src="../assets/counterup/jquery.waypoints.min.js"></script>
<script src="../assets/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/datatable/datatables/datatable.custom.js"></script>
<script src="../js/main.js"></script>
<script>
		$("body.doc").removeClass("body_dark");

        $(document).ready(function() {
            <?php 
                $sql_agree = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$complaint_id."' and reaction = 'Agree' ";
                if($result_agree = mysqli_query($link, $sql_agree)){
                    if(mysqli_num_rows($result_agree) > 0){
                        while($row_agree = mysqli_fetch_array($result_agree)){
    
                            $agree_count = $row_agree['react_count'];
                            
                            }                
                    }                
                } 
    
    $sql_like = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$complaint_id."' and reaction = 'Like' ";
                if($result_like = mysqli_query($link, $sql_like)){
                    if(mysqli_num_rows($result_like) > 0){
                        while($row_like = mysqli_fetch_array($result_like)){
    
                            $like_count = $row_like['react_count'];
                            
                               
                            }                
                    }                
                } 
    
    $sql_neutral = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$complaint_id."' and reaction = 'Neutral' ";
                if($result_neutral = mysqli_query($link, $sql_neutral)){
                    if(mysqli_num_rows($result_neutral) > 0){
                        while($row_neutral = mysqli_fetch_array($result_neutral)){
    
                            $neutral_count = $row_neutral['react_count'];
                            
                            }                
                    }                
                } 
                ?>;
        
            document.getElementById("agree_clicks").innerHTML = <?php echo $agree_count; ?>;
            document.getElementById("like_clicks").innerHTML = <?php echo $like_count; ?>;
            document.getElementById("neutral_clicks").innerHTML = <?php echo $neutral_count; ?>;

            $('.agree-counter').click(function() {
            // agree_clicks += 1;
            // document.getElementById("agree_clicks").innerHTML = agree_clicks;
            react('Agree');
           
            });

            $('.like-counter').click(function() {
            // like_clicks += 1;
            // document.getElementById("like_clicks").innerHTML = like_clicks;
            react('Like');
           
            });

            $('.neutral-counter').click(function() {
                // neutral_clicks += 1;
                // document.getElementById("neutral_clicks").innerHTML = neutral_clicks;
            react('Neutral');
           
            });

            $('#example').DataTable({searching: false,sort:false});
        } );

        function react(reaction){
           //alert('../api/add_react.php?c_id=<?php echo $complaint_id;?>&id=<?php echo $user_id;?>&react='+reaction);
            $.ajax({ 
            url: '../api/add_react.php?c_id=<?php echo $complaint_id;?>&id=<?php echo $user_id;?>&react='+reaction, 
            type: 'GET', 
            contentType: "application/json;charset=utf-8", 
            success: function (data) { 
                //alert("data length - "+data.length);
                if(data.length<5){
                    document.getElementById("agree_clicks").innerHTML = 0;
                    document.getElementById("like_clicks").innerHTML = 0;
                    document.getElementById("neutral_clicks").innerHTML = 0;
                }
                else{
                    document.getElementById("agree_clicks").innerHTML = 0;
                        document.getElementById("like_clicks").innerHTML = 0;
                        document.getElementById("neutral_clicks").innerHTML = 0;
                    const json = JSON.parse(data);
                   // alert(data);
                    // alert(obj.reaction);
                    for(var i = 0; i < json.length; i++) {
                        var obj = json[i];
                        //alert(obj.reaction)
                        

                        if(obj.reaction == "Agree"){
                            document.getElementById("agree_clicks").innerHTML = obj.react_count;
                        }
                        if(obj.reaction == "Like"){
                            document.getElementById("like_clicks").innerHTML = obj.react_count;
                        }
                        if(obj.reaction == "Neutral"){
                            document.getElementById("neutral_clicks").innerHTML = obj.react_count;
                        }
                    }
                    
                }
            }, 
            error: function () { 
                alert(error); 
            } 
        });
        }

    </script>
</body>

</html>