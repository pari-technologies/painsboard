<?php

session_start();
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
    <link rel="stylesheet" href="assets/font-awesome/css/all.css">
    <link rel="stylesheet" href="assets/niceselectpicker/nice-select.css">
    <link rel="stylesheet" href="assets/animation/animate.css">
    <link rel="stylesheet" href="assets/mcustomscrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>PainsBoard</title>
</head>

<body data-spy="scroll" data-target="#navbar-example3" data-offset="86" data-scroll-animation="true">
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
        <nav class="navbar navbar-expand-lg menu_one" id="sticky">
            <div class="container">
                <!-- <a class="navbar-brand sticky_logo" href="index.php">
                    <img src="img/logo-w.png" srcset="img/logo-w2x.png 2x" alt="logo">
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
               
                    <ul class="navbar-nav menu dk_menu ml-auto">
                            <li class="nav-item dropdown search">
                                <form action="#" method="get" class="search_form">
                                    <input type="search" class="form-control" placeholder="Search for">
                                    <button type="submit"><i class="icon_search"></i></button>
                                </form>
                            </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="index.php" class="nav-link dropdown-toggle" >Home</a>
                        
                        </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="about.php" class="nav-link dropdown-toggle" >About</a>
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
                            </ul>
                        </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="pricing.php" class="nav-link dropdown-toggle" >Plans & Pricing</a>
                        </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="contact.php" class="nav-link dropdown-toggle" >Contact Us</a>
                        </li>
                    
                        <?php
                            if(!isset($_SESSION['org_id'])){
                                

                        ?>
                        <li class="nav-item dropdown submenu active">
                            <a href="signin.php" class="nav-link dropdown-toggle" >Sign In</a>
                        </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="signup.php" class="nav-link dropdown-toggle" >Sign Up</a>
                        </li>
                        <?php
                            }

                            else{
                                if($_SESSION['org_id'] == ""){

                                    ?>
                        <li class="nav-item dropdown submenu active">
                            <a href="signin.php" class="nav-link dropdown-toggle" >Sign In</a>
                        </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="signup.php" class="nav-link dropdown-toggle" >Sign Up</a>
                        </li>

                        <?php

                                }

                                else{


                                    ?>
                        <li class="nav-item dropdown submenu active">
                            <a href="organization_profile.php?id=<?php echo $_SESSION['org_id'];?>" class="nav-link dropdown-toggle" >Dashboard</a>
                        </li>

                    <?php
                                }
                            }
                        ?>
                    </ul>
               
                </div>
            </div>
        </nav>
        <section class="breadcrumb_area breadcrumb_area_four">
            <!-- <img class="p_absolute bl_left" src="img/v.svg" alt="">
            <img class="p_absolute bl_right" src="img/home_one/b_leaf.svg" alt="">
            <img class="p_absolute one wow fadeInRight" src="img/home_one/b_man_two.png" alt=""> -->
            <div class="container">
                <div class="breadcrumb_content_two text-center">
                    <h2>Contact Us</h2>
                    
                </div>
            </div>
        </section>
        <section class="">
            <div class="container">
                <div class="contact_info">
                    <div class="section_title text-left">
                        <h2 class="h_title wow fadeInUp">Let's start the conversation</h2>
                        <p>Please email us, we’ll happy to assist you.</p>
                    </div>
                    <form action="api/contact_us.php" class="contact_form" method="post">
                        <div class="row contact_fill">
                            <div class="col-lg-4 form-group">
                                <h6>Full Name</h6>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name here">
                            </div>
                            <div class="col-lg-4 form-group">
                                <h6>Email</h6>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email address">
                            </div>
                            <div class="col-lg-4 form-group">
                                <h6>Phone no</h6>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone number">
                            </div>
                            <div class="col-lg-12 form-group">
                                <h6>Message</h6>
                                <textarea class="form-control message" id="message" name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-lg-12 form-group">
                                <button type="submit" class="btn action_btn thm_btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <footer class="footer_area footer_p_top f_bg_color">
        <img class="p_absolute leaf" src="img/v.svg" alt="">
        <img class="p_absolute f_man wow fadeInLeft" data-wow-delay="0.4s" src="img/home_two/f_man.png" alt="">
        <img class="p_absolute f_cloud" src="img/home_two/cloud.png" alt="">
        <!-- <img class="p_absolute f_email" src="img/home_two/email-icon.png" alt=""> -->
        <!-- <img class="p_absolute f_email_two" src="img/home_two/email-icon_two.png" alt=""> -->
        <!-- <img class="p_absolute f_man_two wow fadeInLeft" data-wow-delay="0.2s" src="img/home_two/man.png" alt=""> -->
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="f_widget subscribe_widget wow fadeInUp">
                            <!-- <a href="index.html" class="f_logo"><img src="img/logo_painsboard/logo3.jpeg" alt="" height="60"></a> -->
                            <div class="f_widget link_widget pl_30 wow fadeInUp" data-wow-delay="0.2s">
                            <h3 class="f_title">Quick Link</h3>
                            <ul class="list-unstyled link_list">
                                <li><a href="about.php">About</a></li>
                                <li><a href="privacy.php">Privacy Policy</a></li>
                                <li><a href="tnc1.php">Terms and Conditions (Harvest The Minds Sdn Bhd) </a></li>
                                <li><a href="tnc2.php">Terms and Conditions (PainsBoard)</a></li>
                                
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="f_widget link_widget pl_30 wow fadeInUp" data-wow-delay="0.2s">
                            <h3 class="f_title">Contact</h3>
                            <p>Harvest the Minds Sdn Bhd (875289-X)</p>
                            B-03-10, Gateway Corporate Suites,<br>
                            Gateway Kiaramas, No 1,<br>
                            Jalan Desa Kiara, Mont Kiara, <br>
                            50480 Kuala Lumpur,<br>
                            Malaysia<br>
                            <p>+60 17-689 6598</p>
                            <p>info@painsboard.com</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="f_widget link_widget wow fadeInUp" data-wow-delay="0.4s">
                            <!-- <iframe allowfullscreen="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.034263808653!2d101.57992991475712!3d3.0855302977531083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4d3d0bc5a403%3A0xb6e013a2ec3a8e51!2sP.A.R.I.+Technologies+(M)+Sdn+Bhd!5e0!3m2!1sen!2smy!4v1535077127686" style="border:0;   box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);" width="400" height="250" frameborder="0"></iframe> -->
                            <div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=Gateway%20Corporate%20Suites,%20Gateway%20Kiaramas,%20No%201,%20Jalan%20Desa%20Kiara,%20Mont%20Kiara,%2050480%20Kuala%20Lumpur&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net"></a><br><style>.mapouter{position:relative;text-align:right;height:250px;width:400px;}</style><a href="https://www.embedgooglemap.net">google maps embed api</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:250px;width:400px;}</style></div></div>
                        </div>
                    </div>
                   
                </div>
                <div class="border_bottom"></div>
            </div>
        </div>
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
    <script src="js/pre-loader.js"> </script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/parallaxie.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/jquery.wavify.js"></script>
    <script src="js/anchor.js"></script>
    <script src="assets/wow/wow.min.js"></script>
    <script src="assets/niceselectpicker/jquery.nice-select.min.js"></script>
    <script src="assets/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>