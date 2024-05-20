<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "../config/config.php";
$id = $_GET['id'];
$org_id = $_GET['org_id'];
$c_id = $_GET['c_id'];


$sql = "SELECT * FROM complaints where id = '".$c_id."'";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){

                        $complaint_id = $row['id'];
                        $title = $row['title'];
                        $category = $row['category'];
                        $keyword1 = $row['keyword1'];
                        $keyword2 = $row['keyword2'];
                        $keyword3 = $row['keyword3'];
                        $message = $row['message'];
                        $solution = $row['solution'];
                        $upload_files = $row['upload_files'];
                          
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
    <nav class="navbar navbar-expand-lg menu_two" id="sticky">
        <div class="container">
            <a class="navbar-brand" href="index.php?id=<?php echo $id;?>">
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
                            <a href="index.php?id=<?php echo $id;?>&org_id=<?php echo $org_id;?>" class="nav-link">Home</a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a href="../api/logout.php?id=<?php echo $id;?>&org_id=<?php echo $org_id;?>" class="nav-link">Logout</a>
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
                                    <a href="index.php?id=<?php echo $id;?>&org_id=<?php echo $org_id;?>"  class="nav-link"><img src="../img/side-nav/home.png" alt="">Dashboard</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="../api/logout.php?id=<?php echo $id;?>&org_id=<?php echo $org_id;?>" class="nav-link"><img src="../img/side-nav/home.png" alt="">Logout</a>
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
                                        <a href="profile.php?id=<?php echo $id;?>&org_id=<?php echo $org_id;?>"  class="nav-link"><img src="../img/side-nav/home.png" alt="">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.php?id=<?php echo $org_id;?>"  class="nav-link"><img src="../img/side-nav/document2.png" alt="">File My Concern</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="#" class="nav-link"><img src="../img/side-nav/briefcase.png" alt="briefcase">User Profile</a>
                                        <span class="icon"><i class="arrow_carrot-down"></i></span>
                                        <ul class="list-unstyled dropdown_nav">
                                            <li><a href="profile_detail.php?id=<?php echo $id;?>&org_id=<?php echo $org_id;?>" class="active">View Profile</a></li>
                                            <li><a href="profile_picture.php?id=<?php echo $id;?>">Change Profile Picture</a></li>
                                            <li><a href="profile_password.php?id=<?php echo $id;?>&org_id=<?php echo $org_id;?>">Change Password</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                                
                                
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div id="post" class="documentation_info">
                            <article class="documentation_body" id="documentation">
                                
                              
                                <h4>Edit Complaint&nbsp;</h4>
                                    <div class="contact_info" style="padding-top:50px">
                                        <form method="post" action="../api/edit_complaint.php" class="contact_form" enctype="multipart/form-data">
                                            <div class="row contact_fill">
                                                <div class="col-lg-6 form-group">
                                                    <h6>Title <small><i>/ Tajuk</i></small></h6>
                                                    <input type="text" class="form-control" name="title" id="title" placeholder="Provide title for your concern (max 7 words) / Berikan tajuk keprihatinan anda (maksima 7 perkataan)" autocomplete="off" required value="<?php echo $title;?>">
                                                    <span style="float:right">/7</span><span id="show" style="float:right">0</span>
                                                    <input type="hidden" class="form-control" name="c_id" id="c_id" value="<?php echo $complaint_id;?>">
                                                    <input type="hidden" class="form-control" name="org_id" id="org_id" value="<?php echo $org_id;?>">
                                                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $id;?>">
                                                </div>
                                                
                                                <div class="col-lg-6 form-group">
                                                    <h6>Concern Category <small><i>/ Bidang Berkaitan</i></small></h6>
                                                    <div class="form-group" >
                                                        <select class="form-control" name="category" id="category">
                                                        <?php
                                                                $sql2 = "SELECT * FROM complaints_type where org_id = '".$org_id."'";
                                                                if($result2 = mysqli_query($link, $sql2)){
                                                                    if(mysqli_num_rows($result2) > 0){
                                                                        while($row2 = mysqli_fetch_array($result2)){
                                                                            if($row2['name'] == $category){
                                                                                echo "<option selected>" . $row2['name'] . "</option>";
                                                                            }
                                                                            else{
                                                                                echo "<option>" . $row2['name'] . "</option>";
                                                                            }
                                                                            
                                                                            
                                                                            }

                                                                        // Free result set
                                                                        mysqli_free_result($result2);
                                                                    } 
                                                                    
                                                                } 

                                                            
                                                            ?>
                                                        
                                                        </select>
                                                    </div> 
                                                </div>
                                            
                                            <div class="row">
                                                    <div class="col-lg-4 form-group">
                                                    <h6>Keywords <small><i>/ Kata Kunci</i></small></h6>   
                                                        <input type="text" value="<?php echo $keyword1;?>" class="form-control" name="keyword1" id="keyword1" placeholder="Keyword 1 / Kata Kunci 1" required>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                    <h6> &nbsp;</h6>   
                                                        <input type="text" value="<?php echo $keyword2;?>" class="form-control" name="keyword2" id="keyword2" placeholder="Keyword 2 / Kata Kunci 2" required>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                    <h6> &nbsp;</h6>   
                                                        <input type="text" value="<?php echo $keyword3;?>" class="form-control" name="keyword3" id="keyword3" placeholder="Keyword 3 / Kata Kunci 3" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12 form-group">
                                                    <h6>Message <small><i>/ Maklumat</i></small></h6>
                                                    <textarea class="form-control message" minlength="350" id="message" data-toggle="popover" data-container="body" data-placement="right" data-html="true" name="message" placeholder="Please provide as much information as possible / Sila nyatakan maklumat terperinci" required><?php echo urldecode($message);?></textarea>
                                                    <span style="float:right">/250</span><span id="show_message" style="float:right">0</span>
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <h6>Your propose solution (Optional. Maximum 250 words) <small><i>/ Cadangan solusi anda (Jika ada. Maksima 250 perkataan) </i></small></h6>
                                                    <textarea class="form-control message" id="solution" name="solution" placeholder="Please provide as much information as possible / Sila nyatakan maklumat terperinci"><?php echo urldecode($solution);?></textarea>
                                                    <span style="float:right">/250</span><span id="show_solution" style="float:right">0</span>
                                                </div>

                                                <div class="col-lg-12 form-group">
                                                    <h6>Add Pdf/Photos/Videos (Optional. Max 2 MB) <small><i>/ Lampirkan Pdf/foto/video (Jika ada. Maks 2MB)</i></small></h6>
                                                    <div class="col-lg-6 form-group">
                                                        <input type="file" id="customFile" name="customFile">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 form-group">
                                                <a href="../attachments/<?php echo $upload_files;?>" target="_blank"> <label>View uploaded file<small><i>/ Lihat lampiran</i></small></label></a>
                                                    
                                                </div>
                                                
                                                
                                                <div class="col-lg-12 form-group">
                                                    <button type="submit" class="btn action_btn thm_btn">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
                        <p>© 2024 All Rights Reserved by <a href="index.php?id=<?php echo $org_id;?>">PainsBoard</a></p>
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

        function urldecode (str) {
            return decodeURIComponent((str + '').replace(/\+/g, '%20'));
            }

        $(document).ready(function() {
            $('#example').DataTable();


        document
        .querySelector("#title")
        .addEventListener("keyup", function countWord() {
          let res = [];
          let str = this.value.replace(/[\t\n\r\.\?\!]/gm, " ").split(" ");
          str.map((s) => {
            let trimStr = s.trim();
            if (trimStr.length > 0) {
              res.push(trimStr);
            }
          });
          if(res.length > 7){
           alert("only 7 words are allowed.");
           var textVal = $('#title').val();
            $('#title').val(textVal.substring(0, textVal.lastIndexOf(' ')));
          }
          else{
            document.querySelector("#show").innerText = res.length;
          }
          
        });


          let res = [];
          let str = document.getElementById("title").value.replace(/[\t\n\r\.\?\!]/gm, " ").split(" ");
          str.map((s) => {
            let trimStr = s.trim();
            if (trimStr.length > 0) {
              res.push(trimStr);
            }
          });
          if(res.length > 7){
           alert("only 7 words are allowed.");
           var textVal = $('#title').val();
            $('#title').val(textVal.substring(0, textVal.lastIndexOf(' ')));
          }
          else{
            document.querySelector("#show").innerText = res.length;
          }
          
        


        document
        .querySelector("#message")
        .addEventListener("keyup", function countWord() {
          let res = [];
          let str = this.value.replace(/[\t\n\r\.\?\!]/gm, " ").split(" ");
          str.map((s) => {
            let trimStr = s.trim();
            if (trimStr.length > 0) {
              res.push(trimStr);
            }
          });
          if(res.length > 250){
           alert("only 250 words are allowed.");
           var textVal = $('#message').val();
            $('#message').val(textVal.substring(0, textVal.lastIndexOf(' ')));
          }
          else{
            document.querySelector("#show_message").innerText = res.length;
          }
          
        });

        let res_m = [];
          let str_m = document.getElementById("message").value.replace(/[\t\n\r\.\?\!]/gm, " ").split(" ");
          str_m.map((s) => {
            let trimStr_m = s.trim();
            if (trimStr_m.length > 0) {
              res_m.push(trimStr_m);
            }
          });
          if(res_m.length > 250){
           alert("only 250 words are allowed.");
           var textVal = $('#message').val();
            $('#message').val(textVal.substring(0, textVal.lastIndexOf(' ')));
          }
          else{
            document.querySelector("#show_message").innerText = res_m.length;
          }


        document
        .querySelector("#solution")
        .addEventListener("keyup", function countWord() {
          let res = [];
          let str = this.value.replace(/[\t\n\r\.\?\!]/gm, " ").split(" ");
          str.map((s) => {
            let trimStr = s.trim();
            if (trimStr.length > 0) {
              res.push(trimStr);
            }
          });
          if(res.length > 250){
           alert("only 250 words are allowed.");
           var textVal = $('#solution').val();
            $('#solution').val(textVal.substring(0, textVal.lastIndexOf(' ')));
          }
          else{
            document.querySelector("#show_solution").innerText = res.length;
          }
          
        });

        let res_s = [];
          let str_s = document.getElementById("solution").value.replace(/[\t\n\r\.\?\!]/gm, " ").split(" ");
          str_s.map((s) => {
            let trimStr_s = s.trim();
            if (trimStr_s.length > 0) {
              res_s.push(trimStr_s);
            }
          });
          if(res_s.length > 250){
           alert("only 250 words are allowed.");
           var textVal = $('#solution').val();
            $('#solution').val(textVal.substring(0, textVal.lastIndexOf(' ')));
          }
          else{
            document.querySelector("#show_solution").innerText = res_s.length;
          }


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


        
    
    </script>
</body>

</html>