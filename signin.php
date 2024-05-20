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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
        <section class="signup_area">
            <div class="row ml-0 mr-0">
                <div class="sign_left signin_left">
                    <!-- <img src="img/logo_painsboard/quote1.png" alt="" height="200" style="float:right"> -->
                    <br>
                    <h2 >“Victory comes from finding opportunities in problems.”</h2>
                    <h5 style="color:white;text-align: center;">— Sun Tzu</h5>
                    <h5 style="color:white;text-align: center;"><i>(Chinese Philosopher)</i></h5>
                    
                    <!-- <h5 style="color:white">“Victory comes from finding opportunities in problems.”— Sun Tzu (Chinese Philosopher).</h5>
                    <h5 style="color:white">“Every problem is an opportunity in disguise.” ― John Adams (2nd US President).</h5>
                    <h5 style="color:white">“A pessimist sees the difficulty in every opportunity; an optimist sees the opportunity in every problem.” — Sir Winston Churchill (Prime Minister of the United Kingdom)</h5>
                    <h5 style="color:white">“Four things come not back: The spoken word. The sped arrow. The past life. The neglected opportunity.” — Arabian Proverb.</h5>
                    <h5 style="color:white">“A man who misses his opportunity, and a monkey who misses his branch, cannot be saved.” — Indian Proverb.</h5> -->
                    <img src="img/logo_painsboard/tsu1.png" alt="bottom" style="width:100%">
                    <img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
                    <!-- <img class="position-absolute middle" src="img/signup/door.png" alt="bottom"> -->
                    <div class="round"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <img src="img/logo_painsboard/logo3.jpeg" alt="" height="80">
                            <h3>Sign in to Organization’s PainsBoard Platform</h3>
                            <p>Don’t have an account yet? <a href="signup.php">Sign up here</a></p>
                        </div>
                        
                        <form action="api/org_login.php" class="row login_form" method="post">
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Email</div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Password</div>
                                <div class="confirm_password">
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Password" autocomplete="off" required>   
                                    <a class="forget_btn" onclick="password_toggle()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                </div>
                                
                            </div>
                            <div class="col-lg-12 form-group">
                                <span style="float:right"><a href="forgot_password.php" class="forget_btn">Forgotten password?</a></span>
                            </div>
                            
                            

                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn action_btn thm_btn">Sign in</button>
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
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/pre-loader.js"> </script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/parallaxie.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="assets/wow/wow.min.js"></script>
    <script src="js/main.js"></script>
    <script>
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