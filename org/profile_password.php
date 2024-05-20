<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "../config/config.php";
$id = $_GET['id'];
$uid = $_SESSION["user_id"];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
                            <a href="index.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" >Home</a>
                            
                        </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="../api/logout.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" >Logout</a>
                            
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
                                    <li class="nav-item active">
                                        <a href="#" class="nav-link"><img src="../img/side-nav/briefcase.png" alt="briefcase">User Profile</a>
                                        <span class="icon"><i class="arrow_carrot-down"></i></span>
                                        <ul class="list-unstyled dropdown_nav">
                                            <li><a href="profile_detail.php?id=<?php echo $id;?>">View Profile</a></li>
                                            <li><a href="profile_picture.php?id=<?php echo $id;?>">Change Profile Picture</a></li>
                                            <li><a href="profile_password.php?id=<?php echo $id;?>" class="active">Change Password</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                                
                                
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div id="post" class="documentation_info">
                            <article class="documentation_body" id="documentation">
                                
                              
                            <h4>Change Password&nbsp;</h4>
                            <form method="post" action="../api/edit_users_password.php" class="row login_form" >

                                <div class="col-lg-12 form-group">
                                    <div class="small_text">Current Password</div>
                                    <input name="org_id" id="org_id" type="hidden" class="form-control" value="<?php echo $id; ?>">
                                    <input name="user_id" id="user_id" type="hidden" class="form-control" value="<?php echo $uid; ?>">
                                    <div class="confirm_password">
                                        <input name="current_password" id="current_password" type="password" class="form-control" placeholder="Current Password" autocomplete="off" required>
                                        <a class="forget_btn" onclick="password_toggle()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-12 form-group">
                                    <div class="small_text">New Password</div>
                                    <div class="confirm_password">
                                        <input name="new_password" id="new_password" type="password" class="form-control" placeholder="Password" autocomplete="off" required>
                                        <a class="forget_btn" onclick="password_toggle2()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-12 form-group">
                                    <div class="small_text">Reconfirm Password</div>
                                    <div class="confirm_password">
                                        <input name="re_password" id="re_password" type="password" class="form-control" placeholder="Reconfirm Password" autocomplete="off" required>
                                        <a class="forget_btn" onclick="password_toggle3()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6 text-center">
                                    <button type="submit" class="btn action_btn thm_btn">Change Password</button>
                                </div>
                            
                            </form>
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
                                <h6>Propose solution</h6>
                                <label id="solution" name="solution"></label>
                            </div>
                            <div class="col-lg-9 form-group">
                                <h6>Reply</h6>
                                <label id="reply" name="reply"></label>
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
    <script src="../assets/niceselectpicker/jquery.nice-select.min.js"></script>
    <script src="../assets/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/datatable/datatables/datatable.custom.js"></script>
    <script src="../js/main.js"></script>
    <script>
		$("body.doc").removeClass("body_dark");

        $(document).ready(function() {
            $('#example').DataTable();
        } );


        function showComplaint(com_title, com_category,com_k1,com_k2,com_k3,com_message,com_solution,reply) {
            document.getElementById("title").innerHTML = com_title;
            document.getElementById("category").innerHTML = com_category;
            document.getElementById("keyword1").innerHTML = com_k1;
            document.getElementById("keyword2").innerHTML = com_k2;
            document.getElementById("keyword3").innerHTML = com_k3;
            document.getElementById("message").innerHTML = com_message;
            document.getElementById("solution").innerHTML = com_solution;
            document.getElementById("reply").innerHTML = reply;
        }

        
        function password_toggle() {
            var x = document.getElementById("current_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            } 

            function password_toggle2() {
            var x = document.getElementById("new_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            } 

            function password_toggle3() {
            var x = document.getElementById("re_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            } 
    
    </script>
</body>

</html>