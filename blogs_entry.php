<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "config/config.php";

$id = $_GET['id'];

$sql = "SELECT * FROM admin_blog where id = '".$id."'";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){

                        $date_create = $row['create_date'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $preview_img = 'admins/assets/preview_img/'.$row['preview_img'];
                           
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
    <meta property="og:url"           content="https://painsboard.com/blogs_entry.php?id=<?php echo $id;?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo $title;?>" />
    <meta property="og:description"   content="<?php echo mb_strimwidth(strip_tags(urldecode($content)),0,500,''); ?>" />
    <meta property="og:image"         content="<?php echo $preview_img;?>" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- icon css-->
    <link rel="stylesheet" href="assets/elagent-icon/style.css">
    <link rel="stylesheet" href="assets/animation/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <title><?php echo $title;?></title>
    <style>
       iframe#twitter-widget-0 {
    vertical-align : bottom;
}
    </style>
</head>

<body data-scroll-animation="true">
<div id="fb-root"></div>
<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=334337044865085&autoLogAppEvents=1" nonce="PRuvu1Nc"></script>
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
<div class="body_wrapper">
    <nav class="navbar navbar-expand-lg menu_two" id="sticky">
        <div class="container">
            <a class="navbar-brand" href="index.php?id=<?php echo $id;?>">
                <img src="img/logo_painsboard/logo3.jpeg"  alt="logo" height="50">
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
                        <a href="index.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Home</a>
                      
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="about.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">About</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Resources
                        </a>
                        <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                           data-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="blogs.php" class="nav-link">Blog</a></li>
                            <li class="nav-item"><a href="buy_books.php" class="nav-link">Buy Books</a></li>
                            <li class="nav-item"><a href="ebooks.php" class="nav-link">Free eBooks</a></li>
                            <li class="nav-item"><a href="articles.php" class="nav-link">Articles</a></li>
                            <li class="nav-item"><a href="videos.php" class="nav-link">Videos</a></li>
                            <!-- <li class="nav-item"><a href="#" class="nav-link" >Related Sites</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="pricing.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Plans & Pricing</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="contact.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Contact Us</a>
                    </li>
                   
                    <?php
                        if(!isset($_SESSION['org_id'])){
                            

                    ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="signin.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign In</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="signup.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign Up</a>
                    </li>
                    <?php
                        }

                        else{
                            if($_SESSION['org_id'] == ""){

                                ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="signin.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign In</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="signup.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign Up</a>
                    </li>

                    <?php

                            }

                            else{


                                ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="organization_profile.php?id=<?php echo $_SESSION['org_id'];?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dashboard</a>
                    </li>

                <?php
                            }
                        }
                    ?>
                </ul>
               
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
                                    <a class="author-avatar" href="#">
                                        <img src="img/logo_painsboard/logo3.jpeg" alt="" width="70px">
                                    </a>
                                    <div class="forum-post-author">
                                        <a class="author-name" href="#">Admin</a>
                                        <div class="forum-author-meta">
                                           
                                            <div class="author-badge">
                                                <i class="icon_calendar"></i>
                                                <a href=""><?php echo $date_create;?></a>
                                            </div>
                                            
                                        </div>
                                        <div class="author-badge">
                                            <div class="fb-share-button" data-href="https://painsboard.com/blogs_entry.php?id=<?php echo $id;?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fpainsboard.com%2Fblogs_entry.php?id=<?php echo $id;?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                                            <a style="margin-top:100px" href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                            <script type="IN/Share" data-url="https://painsboard.com/blogs_entry.php?id=<?php echo $id;?>"></script>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>

                        <!-- Forum post content -->
                        <div class="q-title">
                            <span class="question-icon" title="Question">&nbsp;</span>
                            <h1><?php echo $title;?></h1>
                            
                        </div>
                        <div class="forum-post-content">
                            <div class="content">
                                <p><?php echo urldecode($content); ?></p>
                                
                            </div>
                            
                            
                        </div>
                           
                        <div class="">
                                <div class=" ">
                                    &nbsp;
                                <h5 class="title">Your Comment</h5>
                                </div>
                                <?php 
                                    if($_SESSION["org_id"] != ""){

                                   
                                ?>
                                <div class="col-lg-12">
                                    <form action="api/add_comment_blog.php"  method="post">
                                        <textarea id="message" name="message" rows="4" cols="60"></textarea>
                                        <input type="hidden" class="form-control" id="c_id" name="c_id" value="<?php echo $id;?>">
                                        <input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $_SESSION["org_id"];?>">
                                        <br>
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
                            
                                        $sql = "SELECT *,blog_comment.create_date as comment_create FROM blog_comment left join organization on blog_comment.user_id = organization.id where blog_comment.blog_id = '".$id."' order by blog_comment.id desc";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo "<tr>";
                                                        echo '<td><div class="forum-comment">
                                                        <div class="forum-post-top">
                                                            <a class="author-avatar" href="#">
                                                                <img src="img/forum/author-avatar.png" alt="author avatar">
                                                            </a>
                                                            <div class="forum-post-author">
                                                                <a class="author-name" href="#">'. $row['org_name'] .'</a>
                                                                <div class="forum-author-meta">
                                                                    <!-- <div class="author-badge">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="15px">
                                                                            <path fill-rule="evenodd"  fill="rgb(131, 135, 147)"
                                                                                  d="M11.729,12.136 L11.582,12.167 C11.362,12.415 11.125,12.645 10.869,12.857 L14.999,12.857 C15.134,12.857 15.255,12.944 15.307,13.077 C15.359,13.211 15.331,13.365 15.235,13.467 L14.488,14.268 C14.053,14.733 13.452,15.000 12.838,15.000 L2.495,15.000 C1.872,15.000 1.286,14.740 0.845,14.268 L0.098,13.467 C0.002,13.365 -0.026,13.211 0.026,13.077 C0.077,12.944 0.199,12.857 0.334,12.857 L4.463,12.857 C2.928,11.585 2.000,9.630 2.000,7.499 L2.000,6.785 C2.000,6.194 2.449,5.713 3.000,5.713 L12.333,5.713 C12.885,5.713 13.333,6.194 13.333,6.785 L13.333,7.343 C13.869,7.160 14.736,6.973 15.355,7.400 C15.783,7.696 16.000,8.209 16.000,8.928 C16.000,11.239 11.903,12.100 11.729,12.136 ZM14.994,8.002 C14.557,7.698 13.715,7.941 13.294,8.113 C13.197,9.261 12.837,10.339 12.255,11.269 C13.480,10.911 15.333,10.116 15.333,8.928 C15.333,8.462 15.223,8.158 14.994,8.002 ZM10.261,4.419 C10.376,4.573 10.353,4.798 10.209,4.921 C10.148,4.974 10.074,4.999 10.001,4.999 C9.903,4.999 9.807,4.954 9.740,4.865 C9.198,4.139 9.198,3.002 9.741,2.277 C10.086,1.816 10.086,1.040 9.742,0.580 C9.627,0.426 9.650,0.201 9.794,0.078 C9.937,-0.044 10.146,-0.020 10.263,0.134 C10.805,0.860 10.805,1.996 10.263,2.722 C9.917,3.183 9.917,3.959 10.261,4.419 ZM8.259,4.419 C8.373,4.573 8.350,4.798 8.207,4.921 C8.145,4.974 8.071,4.999 7.999,4.999 C7.901,4.999 7.804,4.954 7.738,4.865 C7.195,4.139 7.195,3.002 7.738,2.277 C8.082,1.816 8.082,1.040 7.739,0.580 C7.624,0.426 7.647,0.201 7.791,0.078 C7.935,-0.045 8.145,-0.020 8.259,0.134 C8.802,0.860 8.802,1.996 8.259,2.722 C7.915,3.183 7.915,3.959 8.259,4.419 ZM6.261,4.418 C6.376,4.572 6.353,4.797 6.210,4.920 C6.148,4.973 6.074,4.999 6.001,4.999 C5.903,4.999 5.807,4.953 5.741,4.865 C5.198,4.139 5.198,3.002 5.741,2.276 C6.085,1.815 6.085,1.039 5.742,0.580 C5.627,0.426 5.650,0.201 5.794,0.078 C5.937,-0.046 6.147,-0.020 6.262,0.133 C6.804,0.859 6.804,1.996 6.262,2.721 C5.918,3.182 5.918,3.959 6.261,4.418 Z"/>
                                                                        </svg>
                                                                        <span>Conversation Starter</span>
                                                                    </div> -->
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
                            <h4 class="c_head">Other blogs</h4>
                            <ul class="list-unstyled w_tag_list style-light">
                                <?php
                                $sql_k1 = "SELECT * from admin_blog where id != '".$id."'order by id desc limit 5";
                                //echo $sql_k1;
                                if($result_k1 = mysqli_query($link, $sql_k1)){
                                    if(mysqli_num_rows($result_k1) > 0){
                                        while($row_k1 = mysqli_fetch_array($result_k1)){
                                            echo '<li><a href="blogs_entry.php?id='.$row_k1['id'].'"><h6>'.$row_k1['title'].'</h6></a></li>';
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
                    
                        
                       
                        

                    </div>
                </div>
                <!-- /.col-lg-4 -->
                </div>
            </div>
        </section>
    


    <footer class="footer_area footer_p_top f_bg_color">
        
        <div class="footer_bottom text-center">
            <div class="container">
                <p>© 2024 All Rights Reserved by <a href="index.php">PainsBoard</a></p>
            </div>
        </div>
    </footer>
</div>

<!-- Back to top button -->
<a id="back-to-top" title="Back to Top"></a>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/pre-loader.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="js/parallaxie.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/jquery.wavify.js"></script>
<script src="assets/wow/wow.min.js"></script>
<script src="assets/counterup/jquery.counterup.min.js"></script>
<script src="assets/counterup/jquery.waypoints.min.js"></script>
<script src="assets/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatable/datatables/datatable.custom.js"></script>
<script src="js/main.js"></script>
<script>
		$("body.doc").removeClass("body_dark");

        $(document).ready(function() {
            $('#example').DataTable({searching: false,sort:false});
        } );

    </script>
</body>

</html>