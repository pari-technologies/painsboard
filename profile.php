<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "config/config.php";
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
                    <img src="img/spinner_logo.png" alt="">
                    <h4><span>Pains</span>Board</h4>
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
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                            
                        </li>
                        <li class="nav-item dropdown submenu active">
                            <a href="index.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logout</a>
                            
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
                <div class="mobile_logo">
                    <a href="#"><img src="img/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="mobile_nav_wrapper">
                <nav class="mobile_nav_top">
                    <ul class="navbar-nav menu ml-auto">
                        <li class="nav-item dropdown submenu">
                            <a href="#" class="nav-link">Home</a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a href="index.php" class="nav-link">Logout</a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
                        </li>
                      

                    </ul>
                </nav>
                <div class="mobile_nav_bottom">
                    <aside class="doc_left_sidebarlist">
                        <h2>PainsBoard</h2>
                        <div class="scroll">
                            <ul class="list-unstyled nav-sidebar">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"><img src="img/side-nav/home.png" alt="">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link"><img src="img/side-nav/home.png" alt="">Logout</a>
                                </li>
                                
                                
                                
                               
                                <li class="nav-item">
                                    <a href="changelog.html" class="nav-link"><img src="img/side-nav/document2.png" alt="">Change Log</a>
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
                                        <a href="#" class="nav-link"><img src="img/side-nav/home.png" alt="">Home</a>
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
                                        <div class="counter">842</div>
                                        <h3 class="title">Users</h3>
                                    </div>
                                    <!-- /.funfact-box -->
                
                                    <div class="funfact-box text-center color-two wow fadeInRight" data-wow-delay="0.5s">
                                        <div class="fanfact-icon">
                                            <img src="img/home_support/fun-fact-2.png" alt="funfact">
                                        </div>
                                        <div class="counter">10,23</div>
                                        <h3 class="title">Topics</h3>
                                    </div>
                                    <!-- /.funfact-box text-center -->
                
                                    <div class="funfact-box text-center color-three wow fadeInRight" data-wow-delay="0.7s">
                                        <div class="fanfact-icon">
                                            <img src="img/home_support/fun-fact-3.png" alt="funfact">
                                        </div>
                                        <div class="counter">196</div>
                                        <h3 class="title">Forums</h3>
                                    </div>
                                    <!-- /.funfact-box text-center -->
                
                                    <div class="funfact-box text-center color-four wow fadeInRight" data-wow-delay="0.9s">
                                        <div class="fanfact-icon">
                                            <img src="img/home_support/fun-fact-4.png" alt="funfact">
                                        </div>
                                        <div class="counter">650</div>
                                        <h3 class="title">Replies</h3>
                                    </div>
                                    <!-- /.funfact-box text-center -->
                
                                    
                                </div>
                                <h4>Complaints&nbsp;</h4>
                            <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            
                                        $sql = "SELECT * FROM complaints";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo "<tr>";
                                                            echo "<td>" . $row['title'] . "</td>";
                                                            echo "<td>" . $row['message'] . "</td>";
                                                            echo "<td>" . $row['status'] . "</td>";
                                                        // echo "<td>" . $row['event_organizer'] . "</td>";
                                                        // echo "<td><img src='https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=" . $row['event_id'] . "&choe=UTF-8'/></td>";
                                                            echo "<td width='20%'>";
                                                                echo '<a href="#" class="mr-3" title="Edit Complaint" data-toggle="tooltip"><span class="fa fa-edit"></span></a>';
                                                                echo '&nbsp;&nbsp;';
                                                                echo '<a href="#" class="mr-3" title="Show Complaint" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                                            echo "</td>";
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
    </script>
</body>

</html>