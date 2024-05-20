<?php
$id = $_GET['id'];
$cid = $_GET['cid'];
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
                    <h2 >“Every problem is an opportunity in disguise.”</h2>
                    <h5 style="color:white;text-align: center;">— John Adams</h5>
                    <h5 style="color:white;text-align: center;"><i>(2<sup>nd</sup> US President)</i></h5>
                    <!-- <h5 style="color:white">“Victory comes from finding opportunities in problems.”— Sun Tzu (Chinese Philosopher).</h5>
                    <h5 style="color:white">“Every problem is an opportunity in disguise.” ― John Adams (2nd US President).</h5>
                    <h5 style="color:white">“A pessimist sees the difficulty in every opportunity; an optimist sees the opportunity in every problem.” — Sir Winston Churchill (Prime Minister of the United Kingdom)</h5>
                    <h5 style="color:white">“Four things come not back: The spoken word. The sped arrow. The past life. The neglected opportunity.” — Arabian Proverb.</h5>
                    <h5 style="color:white">“A man who misses his opportunity, and a monkey who misses his branch, cannot be saved.” — Indian Proverb.</h5> -->
                    <img  src="../img/logo_painsboard/john1.png" alt="bottom" style="width:100%">
                    <img class="position-absolute top" src="../img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="../img/signup/bottom_ornamate.png" alt="bottom">
                    <!-- <img class="position-absolute middle" src="img/signup/door.png" alt="bottom"> -->
                    <div class="round"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <img src="../img/logo_painsboard/logo3.jpeg" alt="" height="80">
                            <h3>Reset Password</h3>
                            <p>Please key in your new password</p>
                        </div>
                        
                        <form action="../api/p_reset_password.php" class="row login_form" method="post">
                            <div class="col-lg-12 form-group">
                                <div class="small_text">New password</div>
                                <div class="confirm_password">
                                    <input name="new_pass" id="new_pass" type="password" class="form-control" placeholder="Password" autocomplete="off" required>   
                                    <a class="forget_btn" onclick="password_toggle()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                </div>
                                
                                
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $cid; ?>">
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Confirm password</div>
                                <div class="confirm_password">
                                    <input name="re_pass" id="re_pass" type="password" class="form-control" placeholder="Confirm Password" autocomplete="off" required>   
                                    <a class="forget_btn" onclick="repass_toggle()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                </div>
                               
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
    <script>
        function password_toggle() {
            var x = document.getElementById("new_pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            } 

        function repass_toggle() {
            var x = document.getElementById("re_pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            } 
    </script>
    
</body>

</html>