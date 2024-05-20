<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
session_start();
require_once "../config/config.php";

$id = $_GET['id'];


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        .required {
        color: red;
        }
        .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}

    </style>
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
        <section class=" ">
            <div class="row ml-0 mr-0">
                <div class="sign_left signup_left">
                    <br>
                    <!-- <img src="../img/logo_painsboard/quote4.png" alt="" height="180" style="float:right">
                    <h2 style="float:right">“A man who misses his opportunity, and a monkey who misses his branch, cannot be saved.” — Indian Proverb.</h2> -->
                    <h2 >“A man who misses his opportunity, and a monkey who misses his branch, cannot be saved.”</h2>
                    <h5 style="color:white;text-align: center;">— Indian Proverb</h5>
                    <img class="position-absolute middle" width="90%" src="../img/logo_painsboard/monkey1.png" alt="bottom">
                    <img class="position-absolute top" src="../img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="../img/signup/bottom_ornamate.png" alt="bottom">
                    <!-- <img class="position-absolute middle wow fadeInRight" src="../img/signup/man_image.png" alt="bottom"> -->
                    <div class="round wow zoomIn" data-wow-delay="0.2s"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <br><br>
                            <img src="../img/logo_painsboard/logo3.jpeg" alt="" height="80">
                            <h3>Create Your PainsBoard Account<br><small><i>Buka Akaun PainsBoard Anda</i></small></h3>
                            
                            <p>Already have an account? <a href="signin.php?id=<?php echo $id;?>">Sign in</a></p>
                            <br>
                        </div>
                        <form method="post" action="../api/add_users.php" class="row login_form">
                            <div class="col-sm-12 form-group">
                                <div class="small_text">Display Name<small><i>/ Nama Paparan</i></small><span class="required"> *</span></div>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Display Name/Nama Paparan" required>
                                <input type="hidden" class="form-control" name="org_id" id="org_id" value="<?php echo $id;?>">
                            </div>
                            
                            <div class="col-lg-12 form-group">
                            <div class="small_text">Category<small><i>/ Kategori</i></small><span class="required"> *</span></div>
                                <div class="form-group" >
                                <select class="form-control" name="category" id="category" required>
                                <?php
                            
                                    $sql = "SELECT * FROM user_type where org_id = '".$id."' ";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<option>" . $row['name'] . "</option>";
                                                   
                                                }

                                            // Free result set
                                            mysqli_free_result($result);
                                        } 
                                        
                                    } 

                                    
                                ?>
                                </select>
                                    </div> 
                                   
                            </div>

                            
                            <div class="col-lg-12 form-group">
                            <div class="small_text">Your Email<small><i>/ Email Anda<span class="required"> *</span></i></small></div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            
                            <div class="col-lg-12 form-group">
                            <div class="small_text">Your Phone Number<small><i>/ No Telefon Anda<span class="required"> *</span></i></small></div>
                                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Phone Number" required>
                            </div>
                            
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Password<small><i>/ Kata Laluan</i></small><span class="required"> *</span></div>
                                
                                <div class="confirm_password">
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" autocomplete="off" required>
                                    <a  class="forget_btn" onclick="password_toggle()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Reconfirmed Password<small><i>/ Ulang Kata Laluan</i></small><span class="required"> *</span></div>
                                <div class="confirm_password">
                                <input id="repassword" name="repassword" type="password" class="form-control" placeholder="Reconfirmed Password" autocomplete="off" required>
                                    <a  class="forget_btn" onclick="repassword_toggle()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                </div>
                                
                               
                            </div>
                            <!-- <div class="col-lg-12 form-group">
                                <div class="check_box">
                                    <input type="checkbox" value="None" id="squared2" name="check">
                                    <label class="l_text" for="squared2">I accept the <span>politic of confidentiality</span></label>
                                </div>
                            </div> -->
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn action_btn thm_btn">Create an account <br><small>Buka Akaun</small></button>
                                <br><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/pre-loader.js"> </script>
    <script src="../assets/bootstrap/js/popper.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/parallaxie.js"></script>
    <script src="../js/TweenMax.min.js"></script>
    <script src="../assets/wow/wow.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        function repassword_toggle() {
            var x = document.getElementById("repassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            } 

        function password_toggle() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            } 
        </script>
</body>

</html>