<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "config/config.php";

$id = $_GET['id'];

$sql = "SELECT * FROM admin_article where id = '".$id."'";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){

                        $date_create = $row['create_date'];
                        $title = $row['title'];
                        $content = $row['content'];
                           
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
    <!-- icon css-->
    <link rel="stylesheet" href="assets/elagent-icon/style.css">
    <link rel="stylesheet" href="assets/animation/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <title>PainsBoard</title>
</head>

<body data-scroll-animation="true">
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

                       

                      
                    </div>
                    <!-- /.col-lg-8 -->

                    <div class="col-lg-4">
                    <div class="forum_sidebar">
                    
                    <div class="widget tag_widget">
                            <h4 class="c_head">Other articles</h4>
                            <ul class="list-unstyled w_tag_list style-light">
                                <?php
                                $sql_k1 = "SELECT * from admin_article where id != '".$id."'order by id desc limit 5";
                                //echo $sql_k1;
                                if($result_k1 = mysqli_query($link, $sql_k1)){
                                    if(mysqli_num_rows($result_k1) > 0){
                                        while($row_k1 = mysqli_fetch_array($result_k1)){
                                            echo '<li><a href="article_entry.php?id='.$row_k1['id'].'"><h6>'.$row_k1['title'].'</h6></a></li>';
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
            $('#example').DataTable({searching: false});
        } );

    </script>
</body>

</html>