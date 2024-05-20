<?php
$id = $_GET['id'];
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
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- icon css-->
    <link rel="stylesheet" href="../assets/elagent-icon/style.css">
    <link rel="stylesheet" href="../assets/animation/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
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
        <section class="signup_area">
            <div class="row ml-0 mr-0">
                <div class="sign_left signin_left">
                    <!-- <img src="img/logo_painsboard/quote1.png" alt="" height="200" style="float:right"> -->
                    <br>
                    <h2 >“A man who misses his opportunity, and a monkey who misses his branch, cannot be saved.”</h2>
                    <h5 style="color:white;text-align: center;">— Indian Proverb</h5>
                    <img src="../img/logo_painsboard/monkey1.png" alt="bottom" style="width:100%">
                    <img class="position-absolute top" src="../img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="../img/signup/bottom_ornamate.png" alt="bottom">
                    <div class="round"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <img src="../img/logo_painsboard/logo3.jpeg" alt="" height="80">
                            <h3>Reset Password</h3>
                            <p>Please key in your email to reset your password</p>
                        </div>
                        
                        <form action="../api/p_forgot_password.php" class="row login_form" method="post">
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Email</div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                <input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $id;?>">
                            </div>
                            

                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn action_btn thm_btn">Reset Password</button>
                                <!-- <a href="organization_profile.php" class="btn action_btn thm_btn">Sign in</a> -->
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
</body>

</html>