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
    <style>
        .responsive {
            width: 100%;
            height: auto;
        }
        * {
        box-sizing: border-box;
        }

        /* Create three columns of equal width */
        .columns {
        float: left;
        width: 33.3%;
        padding: 8px;
        }

        /* Style the list */
        .price {
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        -webkit-transition: 0.3s;
        transition: 0.3s;
        }

        /* Add shadows on hover */
        .price:hover {
        box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
        }

        /* Pricing header */
        .price .header {
        background-color: #111;
        color: white;
        font-size: 25px;
        }

        /* List items */
        .price li {
        border-bottom: 1px solid #eee;
        padding: 20px;
        text-align: center;
        }

        /* Grey list item */
        .price .grey {
        background-color: #eee;
        font-size: 20px;
        }

        /* The "Sign Up" button */
        .button {
        background-color: #04AA6D;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
        }

        /* Change the width of the three columns to 100%
        (to stack horizontally on small screens) */
        @media only screen and (max-width: 600px) {
        .columns {
            width: 100%;
        }
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
    <nav class="navbar navbar-expand-lg menu_two" id="sticky">
        <div class="container">
            <a class="navbar-brand" href="index.php">
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
        
        <div class="click_capture"></div>
        <div class="side_menu">
            <div class="mobile_menu_header">
                <div class="close_nav">
                    <i class="arrow_left"></i>
                    <i class="icon_close"></i>
                </div>
                <div class="mobile_logo">
                    <a href="#"><img src="img/logo.png" alt="logo"></a>
                </div>
            </div>
            
        </div>
        <section class="doc_documentation_area doc_documentation_full_area body_fixed">
            <div class="overlay_bg"></div>
            <div class="container-fluid pl-60 pr-60">
                <div class="row">
                <div class="col-lg-2 col-md-2">
                    </div>
                    
                    <div class="col-lg-9 col-md-9">
                        <div id="post" class="documentation_info">
                            <article class="documentation_body" id="documentation">
  
                            </article>

                            <h4 >Information on Subscription&nbsp;</h4>
                            
                            <p>The following table lists the types and fees for the subscription of our services.</p>
                            <div class="row text-center align-items-end">
                                <!-- Pricing Table-->
                                <div class="col-lg-4 mb-5 mb-lg-0">
                                    <div class="bg-white p-0 rounded-lg shadow">
                                        <a href="checkout.php?id=1">
                                            <img src="img/logo_painsboard/pricing1.png" alt="Basic Pricing" class="responsive">
                                    <!-- <h1 class="h6 text-uppercase font-weight-bold mb-4">Basic</h1>
                                    <h2 class="h1 font-weight-bold">RM 158<span class="text-small font-weight-normal ml-2">/ month</span></h2>

                                    <div class="custom-separator my-4 mx-auto bg-primary"></div>

                                    <ul class="list-unstyled my-5 text-small text-left">
                                        <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> RM 1900 / year</li>
                                        <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> 500 users</li>

                                    </ul>
                                    <a href="signup.php" class="btn btn-primary btn-block p-2 shadow rounded-pill">Sign Up</a>-->
                                        </a>
                                    </div> 
                                </div>
                                <!-- END -->


                                <!-- Pricing Table-->
                                <div class="col-lg-4 mb-5 mb-lg-0">
                                    <div class="bg-white p-0 rounded-lg shadow">
                                        <a href="checkout.php?id=2">
                                            <img src="img/logo_painsboard/pricing2.png" alt="Intermediate Pricing" class="responsive">
                                    <!-- <h1 class="h6 text-uppercase font-weight-bold mb-4">Intermediate</h1>
                                    <h2 class="h1 font-weight-bold">RM 408<span class="text-small font-weight-normal ml-2">/ month</span></h2>

                                    <div class="custom-separator my-4 mx-auto bg-primary"></div>

                                    <ul class="list-unstyled my-5 text-small text-left">
                                        <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> RM 4900 / year</li>
                                        <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> 5000 users</li>

                                    </ul> -->
                                    </a>
                                    </div>
                                </div>
                                <!-- END -->


                                <!-- Pricing Table-->
                                <div class="col-lg-4 mb-5 mb-lg-0">
                                    <div class="bg-white p-0 rounded-lg shadow">
                                        <a href="checkout.php?id=3">
                                            <img src="img/logo_painsboard/pricing3.png" alt="Advanced Pricing" class="responsive">
                                    <!-- <h1 class="h6 text-uppercase font-weight-bold mb-4">Advanced</h1>
                                    <h2 class="h1 font-weight-bold">RM 825<span class="text-small font-weight-normal ml-2">/ month</span></h2>

                                    <div class="custom-separator my-4 mx-auto bg-primary"></div>

                                    <ul class="list-unstyled my-5 text-small text-left">
                                        <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> RM 9900 / year</li>
                                        <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> Unlimited users</li>

                                    </ul>
                                    <a href="signup.php" class="btn btn-primary btn-block p-2 shadow rounded-pill">Sign Up</a> -->
                                    </a>
                                    </div>
                                </div>
                                <!-- END -->
                            </div>
                            <br>
                            <p>Your subscription contains the following contents on <a href="index.php">www.PainsBoard.com</a>
                            <h6>BASIC PLAN:</h6>
                            <p>A platform to effectively harvest pain-points from your stakeholders (internal staff, clients, suppliers, contractors, disgruntled customers, non-customers, the public, etc)
                            </p>
                            <h6>INTERMEDIATE & ADVANCED PLANS:</h6>
                            
                            </p>
                            <p>
                                <ol>
                                    <li>A platform to effectively harvest pain-points from your stakeholders (internal staff, clients, suppliers, contractors, disgruntled customers, non-customers, the public, etc)</li>
                                    <li>Data analytics of the data collected over certain period of time.
                                        <ol type="a"> 
                                            <li>The trend of Key Pain-Point Indicators (KPPI) over time.
                                                <ol type="i"> 
                                                    <li>A decreasing trend of KPPI indicates an effective problem solving effort by your organization in addressing the pain-points</li>
                                                    <li>An increasing trend of KPPI indicates a poor problem solving efforts by your organization in addressing the pain-points</li>
                                                </ol>
                                            </li>
                                            <li>Details of KPPI over the 12 months of the current operating year.
                                                <ol type="i"> 
                                                    <li>List of KPPI</li>
                                                    <li>List of KPPI resolved</li>
                                                    <li>List of outstanding unresolved KPPI</li>
                                                </ol>
                                            </li>
                                            <li>Trending over certain period of time.
                                                <ol type="i"> 
                                                    <li>Top pain-point</li>
                                                    <li>Top keywords</li>
                                                    <li>Top contributors</li>
                                                    <li>Top responses on “agreed”, “like” and “neutral”</li>
                                                </ol>
                                            </li>
                                            <li>Data on trending shall provide instant feedbacks on the effectiveness of solutions that are implemented to resolve the pain-points.
                                                
                                            </li>
                                            <li>Analysis of the data shall provide powerful evidence and input for meaningful strategic planning session for the organization.
                                                
                                            </li>
                                        </ol>
 
                                    </li>
                                    
                                    
                                </ol>
                            </p>

                            

                            <!-- <div class="columns">
                                <ul class="price">
                                    <li class="header">Free 30-day Trial</li>
                                    <li class="grey"><small>Price/month, billed yearly</small><br>RM 0</li>
                                    <li class="grey"><small>Price/year</small><br>RM 0</li>
                                    <li><small>Max limit of users</small><br>No Limit</li>
                                    <li class="grey"><a href="signup.php" class="button">Sign Up</a></li>
                                </ul>
                            </div>  -->

                            <!-- <div class="columns">
                                <ul class="price">
                                    <li class="header">Basic</li>
                                    <li class="grey"><small>Price/month, billed yearly</small><br>RM 158</li>
                                    <li class="grey"><small>Price/year</small><br>RM 1900</li>
                                    <li><small>Max limit of users</small><br>500</li>
                                    <li class="grey"><a href="signup.php" class="button">Sign Up</a></li>
                                </ul>
                            </div> 

                            <div class="columns">
                                <ul class="price">
                                    <li class="header">Intermediate</li>
                                    <li class="grey"><small>Price/month, billed yearly</small><br>RM 408</li>
                                    <li class="grey"><small>Price/year</small><br>RM 4900</li>
                                    <li><small>Max limit of users</small><br>5000</li>
                                    <li class="grey"><a href="signup.php" class="button">Sign Up</a></li>
                                </ul>
                            </div> 

                            <div class="columns">
                                <ul class="price">
                                    <li class="header">Advanced</li>
                                    <li class="grey"><small>Price/month, billed yearly</small><br>RM 825</li>
                                    <li class="grey"><small>Price/year</small><br>RM 9900</li>
                                    <li><small>Max limit of users</small><br>No limit</li>
                                    <li class="grey"><a href="signup.php" class="button">Sign Up</a></li>
                                </ul>
                            </div>  -->
                            
                            
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
            <div class="modal-body">
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
		$("body.doc").removeClass("body_dark");

        $(document).ready(function() {
            $('#example').DataTable();
        } );


        function showComplaint(com_title, com_category,com_k1,com_k2,com_k3,com_message,com_solution) {
            document.getElementById("title").innerHTML = com_title;
            document.getElementById("category").innerHTML = com_category;
            document.getElementById("keyword1").innerHTML = com_k1;
            document.getElementById("keyword2").innerHTML = com_k2;
            document.getElementById("keyword3").innerHTML = com_k3;
            document.getElementById("message").innerHTML = com_message;
            document.getElementById("solution").innerHTML = com_solution;
        }
    </script>
</body>

</html>