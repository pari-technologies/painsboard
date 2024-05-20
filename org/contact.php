<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";
$id = $_GET['id'];
session_start();

if($_SESSION["user_id"]== ""){
    echo "<script>";
    echo "alert('Please sign up or login to use this feature');";
    echo "window.history.back();"; // redirect with javascript, after page loads
    echo "</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8"> -->
    <!-- <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- icon css-->
    <link rel="stylesheet" href="../assets/elagent-icon/style.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/all.css">
    <link rel="stylesheet" href="../assets/niceselectpicker/nice-select.css">
    <link rel="stylesheet" href="../assets/animation/animate.css">
    <link rel="stylesheet" href="../assets/mcustomscrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    
    <title>PainsBoard</title>
</head>

<body data-spy="scroll" data-target="#navbar-example3" data-offset="86" data-scroll-animation="true">
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
                            <a href="index.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" >Home</a>
                           
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
                        <a href="signin.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" >Sign In</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="signup.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" >Sign Up</a>
                    </li>
                    <?php
                        }

                        else{
                            if($_SESSION['user_id'] == ""){

                                ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="signin.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle" >Sign In</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="signup.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle"  >Sign Up</a>
                    </li>

                    <?php

                            }

                            else{


                                ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="profile.php?id=<?php echo $id;?>" class="nav-link dropdown-toggle"  >Dashboard</a>
                    </li>

                <?php
                            }
                        }
                    ?>
                    
                    </ul>
                    <a class="action_btn" style="margin-left: 80px;padding: 8px 25px;" href="contact.php?id=<?php echo $id;?>">File My Concern</a>
                    <!-- <a class="nav_btn" href="contact.php?id=<?php echo $id;?>">File My Concern</a> -->
                   <!--  <a class="nav_btn" href="signup.php"><i class="icon_profile"></i>Register</a> -->
                </div>
            </div>
        </nav>
        <section class="breadcrumb_area breadcrumb_area_four">
            <!-- <img class="p_absolute bl_left" src="img/v.svg" alt="">
            <img class="p_absolute bl_right" src="img/home_one/b_leaf.svg" alt="">
            <img class="p_absolute one wow fadeInRight" src="img/home_one/b_man_two.png" alt=""> -->
            <div class="container">
                <div class="breadcrumb_content_two text-center">
                    <h2>File My Concern<br><small><i>Ini Keprihatinan Saya</i></small></h2>
                    
                </div>
            </div>
        </section>
        <section class="">
            <div class="container">
                <div class="contact_info">
                    <div class="section_title text-left">
                        <h2 class="h_title wow fadeInUp">Look Forward to Receiving Your Concerns</h2>
                        <p>Kami Amat Teruja Untuk Membaca Keprihatinan Anda</p>
                    </div>
                    <form method="post" action="../api/add_complaint.php" class="contact_form" enctype="multipart/form-data">
                        <div class="row contact_fill">
                            <div class="col-lg-5 form-group">
                                <h6>Title <small><i>/ Tajuk</i></small></h6>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Provide title for your concern (max 7 words) / Berikan tajuk keprihatinan anda (maksima 7 perkataan)" autocomplete="off" required>
                                <span style="float:right">/7</span><span id="show" style="float:right">0</span>
                                <input type="hidden" class="form-control" name="org_id" id="org_id" value="<?php echo $id;?>">
                                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $_SESSION["user_id"];?>">
                            </div>
                            
                            <div class="col-lg-4 form-group">
                                <h6>Concern Category <small><i>/ Bidang Berkaitan</i></small></h6>
                                <div class="form-group" >
                                    <select class="form-control" name="category" id="category">
                                    <?php
                                            $sql2 = "SELECT * FROM complaints_type where org_id = '".$id."'";
                                            if($result2 = mysqli_query($link, $sql2)){
                                                if(mysqli_num_rows($result2) > 0){
                                                    while($row2 = mysqli_fetch_array($result2)){
                                                        echo "<option value='".$row2['id']."'>" . $row2['name'] . "</option>";
                                                        
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
                                    <input type="text" class="form-control" name="keyword1" id="keyword1" placeholder="Keyword 1 / Kata Kunci 1" required>
                                </div>
                                <div class="col-lg-4 form-group">
                                <h6> &nbsp;</h6>   
                                    <input type="text" class="form-control" name="keyword2" id="keyword2" placeholder="Keyword 2 / Kata Kunci 2">
                                </div>
                                <div class="col-lg-4 form-group">
                                <h6> &nbsp;</h6>   
                                    <input type="text" class="form-control" name="keyword3" id="keyword3" placeholder="Keyword 3 / Kata Kunci 3">
                                </div>
                            </div>
                            
                            <div class="col-lg-9 form-group">
                                <h6>Message (compulsory, min 50 characters, max 250 words) <small><i>/ Maklumat (wajib diisi, minima 50 huruf, maksima 250 perkataan)</i></small></h6>
                                <textarea class="form-control message" minlength="50" id="message" data-toggle="popover" data-container="body" data-placement="right" data-html="true" name="message" placeholder="Please provide as much information as possible / Sila nyatakan maklumat terperinci" required></textarea>
                                <span style="float:right">/min 50ch</span><span id="show_message" style="float:right">0</span>
                            </div>
                            <div class="col-lg-9 form-group">
                                <h6>Your propose solution (Optional. Maximum 250 words) <small><i>/ Cadangan solusi anda (Jika ada. Maksima 250 perkataan) </i></small></h6>
                                <textarea class="form-control message" id="solution" name="solution" placeholder="Please provide as much information as possible / Sila nyatakan maklumat terperinci"></textarea>
                                <span style="float:right">/250</span><span id="show_solution" style="float:right">0</span>
                            </div>
                            <div class="col-lg-9 form-group">
                                <h6>Add Pdf/Photos/Videos (Optional. Max 5 MB) <small><i>/ Lampirkan Pdf/foto/video (Jika ada. Maks 5MB)</i></small></h6>
                                <div class="col-lg-6 form-group">
                                    <input type="file" id="customFile" name="customFile">
                                  </div>
                            </div>
                            
                            
                            <div class="col-lg-9 form-group">
                                <button type="submit" class="btn action_btn thm_btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="popover-content" class="hide" style="display:none">
                    <h6>Details Information:</h6>
                    <p>Please provide as much information as possible on the what, who, where, when, why and how (5W1H) within minimum 50 characters and maximum 250 words. Your brief should include the 3 selected keywords.
                        Please also attach any relevant information (pdf, images or video within 2MB), if you have any.    
                        Please be polite, avoid using abusive words and avoid using capital letters.
                    </p>
                    <h6>Maklumat Lengkap:</h6>
                    <p><small><i>Sila nyatakan maklumat terperinci tentang apa, siapa, dimana, bila, mengapa dan bagaimana dalam minima 50 huruf dan maksima 250 perkataan. Maklumat anda perlu mengandungi 3 kata kunci yang telah dipilih. Sila sertakan maklumat tambahan (pdf, foto, video), jika ada
                        Mohon berhemat dalam penulisan, tidak gunakan bahasa kasar atau kesat dan tidak gunakan huruf besar.
                    </i></small></p>
                        
                </div>
            </div>
        </section>
        <footer class="footer_area f_bg_color">
            
         
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
    <script src="../js/pre-loader.js"> </script>
    <script src="../assets/bootstrap/js/popper.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/parallaxie.js"></script>
    <script src="../js/TweenMax.min.js"></script>
    <script src="../js/jquery.wavify.js"></script>
    <script src="../js/anchor.js"></script>
    <script src="../assets/wow/wow.min.js"></script>
    <script src="../assets/niceselectpicker/jquery.nice-select.min.js"></script>
    <script src="../assets/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5.4.2-90/tinymce.min.js'></script>
    <script src="https://cdn.tiny.cloud/1/7abuniyifrjzm6mimwnk1wq7pl2i809m6wfhgwbcfn4oey13/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script> -->
    <!-- <script src="../js/main.js"></script> -->
    <script>
        $("[data-toggle=popover]").popover({
            html: true, 
            content: function() {
                return $('#popover-content').html();
                }
            });

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

        document
        .querySelector("#message")
        .addEventListener("keyup", function countWord() {
          let res = [];
        //   let str = this.value.replace(/[\t\n\r\.\?\!]/gm, " ").split(" ");
        let str = this.value;
        // console.log(str);
        //   str.map((s) => {
            //let trimStr = str.trim();
            // if (trimStr.length > 0) {
            //   res.push(str);
            //   console.log(res.length);
            // }
        //   });
        //   if(str.length < 50){
        //    alert("Minimum 50 characters are required.");
        //    var textVal = $('#message').val();
        //     $('#message').val(textVal.substring(0, textVal.lastIndexOf(' ')));
        //   }
        //   else{
            document.querySelector("#show_message").innerText = str.length;
        //   }
          
        });


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
    

        </script>
</body>

</html>