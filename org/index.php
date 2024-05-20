<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "../config/config.php";

$id = $_GET['id'];

$sql = "SELECT * FROM organization where id = '".$id."'";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){

                        $org_logo = $row['org_logo'];
                        $org_name = $row['org_name'];
                           
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
    <section  style=" background-color:#F6F6F6">
    <!-- <section class="doc_banner_area_three" style=" background-color:black;" > -->
        <div class="container"  style=" background-color:white">
        <div class="row">
            <div class="col-sm">
                <img  src="../img/logo_painsboard/office1.png" width="500" style="padding-top:50px">
            </div>
            <div class="col-sm">
                <br>
                <div class="doc_banner_text_three text-center">
                    <h4><img src="<?php echo "data:image/png;base64,".$org_logo;?>" alt="" height="50"><br><?php echo $org_name;?></h4>
                    <h3 style="color:#019FE6">Problems = Opportunities</h3>
                    <p>We welcome your pain-points, complaints, issues, problems, or criticisms concerning our organization. We truly believe that your concerns are great sources of ideas and opportunities for us to deliver better services to you.
                    <br><br><i>Kami amat hargai keprihatinan anda terhadap organisasi kami. <br>Input anda dalam bentuk aduan, isu, masalah atau kritikan adalah sumber idea dan peluang untuk kami pertingkatkan perkhidmatan kami kepada anda semua.  </i></p>
                    <!-- <form action="#" class="banner_search_form">
                        <input type="search" class="form-control" placeholder="Search the Knowledge Base">
                        <button type="submit" class="search_btn">Search</button>
                    </form> -->
                    <p>
                        
                        <a href="signup.php?id=<?php echo $id;?>" class="action_btn ">No account yet? /<i><small>Belum mendaftar?</small></i> <br><small>Sign Up here /<i><small>Daftar disini</small></i></small></a>
                        <a href="contact.php?id=<?php echo $id;?>" class="action_btn ">Start My Concern<br><i><small>Ini Keprihatinan Saya</small></i></a>
                    </p>
                    <br><br>
                </div>
                
            </div>
           
        </div>
        </div>
       
    </section>
    <!-- <section class="doc_banner_area_two">
        <div class="b_plus one" data-parallax='{"x": 250, "y": 160, "rotateZ":500}'><img src="../img/home_two/plus.png"
                                                                                         alt=""></div>
        <div class="b_plus two" data-parallax='{"x": 250, "y": 260, "rotateZ":500}'><img src="../img/home_two/plus_one.png"
                                                                                         alt=""></div>
        <div class="b_round r_one" data-parallax='{"x": 0, "y": 100, "rotateZ":0}'></div>
        <div class="b_round r_two" data-parallax='{"x": -10, "y": 80, "rotateY":0}'></div>
        <div class="b_round r_three"></div>
        <div class="b_round r_four"></div>
        <img class="p_absolute building_img" src="../img/home_two/building.png" alt="">
        <img class="p_absolute table_img wow fadeInLeft" src="img/home_two/table.svg" alt="">
        <img class="p_absolute flower wow fadeInUp" data-wow-delay="0.6s" src="../img/home_two/flower.png" alt=""> -->
        <!-- <img class="p_absolute bord wow fadeInRight" data-wow-delay="0.4s" src="../img/home_two/bord.png" alt=""> -->
        <!-- <img class="p_absolute girl wow fadeInRight" data-wow-delay="0.8s" src="../img/home_two/girl.png" alt="">
        <div class="container"> -->
            <!-- <div class="doc_banner_text_two text-center"> -->
            <!-- <div class="doc_banner_text_three text-center">
            <img src="<?php echo "data:image/png;base64,".$org_logo;?>" alt="" height="80">
                <h4><?php echo $org_name;?></h4>
                <h3>Problems = Opportunities</h3>
                <p>We welcome your pain-points, complaints, issues, problems, or criticisms concerning our organization.<br> We truly believe that your concerns are great sources of ideas and opportunities for us to deliver better services to you.
                <br><i>Kami amat hargai keprihatinan anda terhadap organisasi kami. <br>Input anda dalam bentuk aduan, isu, masalah atau kritikan adalah sumber idea dan peluang untuk kami pertingkatkan perkhidmatan kami kepada anda semua.  </i></p> -->
                <!-- <form action="#" class="banner_search_form">
                    <input type="search" class="form-control" placeholder="Search the Knowledge Base">
                    <button type="submit" class="search_btn">Search</button>
                </form> -->
                <!-- <p>
                    <br>
                    <a href="signup.php?id=<?php echo $id;?>" class="action_btn btn_small_three">No account yet?/Belum mendaftar? <br><small>Register here/Daftar disini</small></a>
                    <a href="contact.php?id=<?php echo $id;?>" class="action_btn btn_small_three">Start My Concern<br><small>Mulakan Keprihatinan Saya</small></a>
                </p>
            </div>
        </div>
    </section> -->

    <section >
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- <div class="answer-action"> -->
                        <!-- <div class="action-content">
                            <div class="image-wrap">
                                <img src="../img/home_support/answer.png" alt="answer action">
                            </div>
                            <div class="content">
                                <h2 class="ans-title">Do you have painful problems with our organization?</h2>
                                <p>
                                   Let's us solve them through this PainsBoard platform now.
                                </p>
                                <h2 class="ans-title"><small><i>Anda ada masalah besar dengan organisasi kami?</i></small></h2>
                                <p>
                                <small><i>Kami sedia selesaikan melalui platform PainsBoard ini.</i></small>
                                </p>
                            </div>
                        </div> -->
                        <!-- /.action-content -->

                        <!-- <div class="action-button-container">
                            <a href="contact.php?id=<?php echo $id;?>" class="action_btn text-center">File My Concern<br><small><i>Ini Keprihatinan Saya</i></small></a>
                        </div> -->
                        <!-- /.action-button-container -->
                    <!-- </div> -->
                    <!-- /.answer-action -->

                    <!-- <div class="post-header"> -->
                        <!-- <div class="support-info">
                            <ul class="support-total-info">
                                <li class="open-ticket"><i class="icon_info_alt"></i>576 Open</li>
                                <li class="close-ticket"><i class="icon_check"></i><a href="#">2,974 Closed</a></li>
                            </ul>
                        </div> -->
                        <!-- /.support-info -->

                       
                        <!-- /.support-category-menus -->
                    <!-- </div> -->
                    <!-- /.post-header -->

                    <div class="community-posts-wrapper bb-radius">
                        
                    <table id="example" class="display" style="width:100%">
                        <thead>
                                        <tr>
                                            <th></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            
                                        $sql = "SELECT *,complaints.id as cid,complaints.create_date as complaint_create,complaints_type.name as cat_name FROM complaints left join users on complaints.user_id = users.id left join complaints_type on complaints.category = complaints_type.id where complaints.org_id = '".$id."' order by complaints.id desc";
                                       
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
                                                                    <a>'. $row['name'] .'</a>
                                                                </label>
                                                                </p>
                                                                <h3 class="post-title">
                                                                    <a href="complaints.php?id='.$id.'&c_id='.$row['cid'].'">'. $row['title'] .'</a>
                                                                    
                                                                </h3>
                                                                <p>'.mb_strimwidth(urldecode($row['message']),0,500,'...<a href="complaints.php?id='.$id.'&c_id='.$row['cid'].'"><b>See more</b></a>').'</p>
                                                                <ul class="meta">
                                                                    <li><img src="../img/home_support/cmm1.png" alt="cmm"><a href="#">'. $row['cat_name'].'</a></li>
                                                                    <li><i class="../icon_calendar"></i>'.date("d/m/Y", strtotime($row['complaint_create'])).'</li>
                                                                    <li><img src="../img/home_support/cmm2.png" alt="cmm"><a href="#">'. $row['status'].'</a></li>';
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
                                                                                echo '<li><img style="height:15px" src="../img/logo_painsboard/hand-shake.png" alt="">'.$row3['react_count'].'</li>';
                                                                               
                                                                            }
                                                                        }
                                                                        else{
                                                                            echo '<li><img style="height:15px" src="../img/logo_painsboard/hand-shake.png" alt="">0</li>';
                                                                        }
                                                                       
                                                                    }

                                                                    $sql4 = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$row['cid']."' and reaction = 'Like' ";
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


                                                                    $sql5 = "SELECT count(id) as react_count FROM complaints_stats where complaint_id = '".$row['cid']."' and reaction = 'Neutral' ";
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
                    <!-- /.community-posts-wrapper -->

                    

                </div>
                <!-- /.col-lg-8 -->

                <div class="col-lg-4">
                    <div class="forum_sidebar">

                    <div class="widget tag_widget">
                            <h4 class="c_head">Keywords</h4>
                            <ul class="list-unstyled w_tag_list style-light">
                                <?php
                                $sql_k1 = "SELECT keyword1, COUNT(keyword1) as count_k from complaints where org_id = '".$id."' group by keyword1 order by count_k desc limit 4";
                                //echo $sql_k1;
                                if($result_k1 = mysqli_query($link, $sql_k1)){
                                    if(mysqli_num_rows($result_k1) > 0){
                                        while($row_k1 = mysqli_fetch_array($result_k1)){
                                            if($row_k1['keyword1'] != "")
                                                echo '<li><a href="#">'.$row_k1['keyword1'].'</a></li>';
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
                                            if($row_k2['keyword2'] != "")
                                             echo '<li><a href="#">'.$row_k2['keyword2'].'</a></li>';
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
                                            if($row_k3['keyword3'] != "")
                                                echo '<li><a href="#">'.$row_k3['keyword3'].'</a></li>';
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
    


    <footer class="footer_area footer_p_top " style=" background-color:#F6F6F6">
        
        <div class="footer_bottom text-center" >
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
            $('#example').DataTable({searching: false,sort:false});
        } );

    </script>
</body>

</html>