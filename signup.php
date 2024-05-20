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
    <style>
        .required {
        color: red;
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
                    <img src="img/logo_painsboard/logo3.jpeg" alt="" height="80">
                </div>
            </div>
            <!-- <h2 class="head">Did You Know?</h2>
            <p></p> -->
        </div>
    </div>
    <div class="body_wrapper">
        <section class="">
            <div class="row ml-0 mr-0">
                <div class="sign_left signup_left">
                    <br>
                    <!-- <img src="img/logo_painsboard/quote2.png" alt="" height="200" style="float:right">
                    <h2 style="float:right">“Every problem is an opportunity in disguise.” ― John Adams (2nd US President).</h2> -->
                    <h2 >“A pessimist sees the difficulty in every opportunity; an optimist sees the opportunity in every problem.”</h2>
                    <h5 style="color:white;text-align: center;">— Sir Winston Churchill</h5>
                    <h5 style="color:white;text-align: center;"><i>(Prime Minister of the United Kingdom)</i></h5>
                    <img class="middle" width="90%" style="padding-top:130px" src="img/logo_painsboard/president1.png" alt="bottom">
                    <img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
                    <!-- <img class="position-absolute middle wow fadeInRight" src="img/signup/man_image.png" alt="bottom"> -->
                    <div class="round wow zoomIn" data-wow-delay="0.2s"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <br><br>
                            <img src="img/logo_painsboard/logo3.jpeg" alt="" height="80">
                            <h3>Create Your Organization’s PainsBoard Account</h3>
                            <p>Already have an account? <a href="signin.php">Sign in</a></p>
                            <br>
                        </div>
                        <form method="post" action="api/add_org.php" class="row login_form" enctype="multipart/form-data">
                            <div class="col-sm-12 form-group">
                                <div class="small_text">Organization Name<span class="required"> *</span></div>
                                <input type="text" class="form-control" name="org_name" id="org_name" placeholder="Organization Name" required>
                            </div>
                            <div class="col-sm-12 form-group">
                                <div class="small_text">Organization Registration No/Code No/Reference No<span class="required"> *</span></div>
                                <input type="text" class="form-control" name="org_reg_no" id="org_reg_no" placeholder="Organization Registration No/Code No/Reference No" required>
                            </div>
                            <div class="col-lg-12 form-group">
                            <div class="small_text">Organization Logo<span class="required"> *</span></div>
                                <div class="col-lg-12 form-group">
                                    <input type="file" name="org_logo" id="org_logo" required>
                                    <!-- <input type="file" class="custom-file-input" id="customFile" required> -->
                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                  </div>
                            </div>
                           
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Company Email<span class="required"> *</span></div>
                                <input type="email" class="form-control" id="org_email" name="org_email" placeholder="Company Email" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <div class="small_text">Password<span class="required"> *</span></div>
                                <div class="confirm_password">
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Password" autocomplete="off" required>   
                                    <a  class="forget_btn" onclick="password_toggle()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                </div>
                                
                                
                            </div>

                            <div class="col-lg-6 form-group">
                                <div class="small_text">Reconfirm Password<span class="required"> *</span></div>
                                <div class="confirm_password">
                                    <input name="repassword" id="repassword" type="password" class="form-control" placeholder="Reconfirm Password" autocomplete="off" required>
                                    <a  class="forget_btn" onclick="repassword_toggle()"><i class="far fa-eye" id="togglePassword" style=" cursor: pointer;"></i></a>
                                </div>
                               
                            </div>
                            <div class="col-sm-12 form-group">
                                <div class="small_text">Organization’s Website/FB/LinkedIn<span class="required"> *</span></div>
                                <input type="text" class="form-control" name="org_social" id="org_social" placeholder="Organization’s Website/FB/LinkedIn" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Contact Person<span class="required"> *</span></div>
                                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <div class="small_text">Contact Person's Email<span class="required"> *</span></div>
                                <input type="text" class="form-control" id="contact_person_email" name="contact_person_email" placeholder="Contact Person's Email" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <div class="small_text">Contact Person's Phone Number<span class="required"> *</span></div>
                                <input class="form-control" id="phone_no" name="phone_no" type="tel" required style="padding-left: 60px;"/>
                                <!-- <input type="text" class="form-control" id="contact_person_phone" name="contact_person_phone" placeholder="Contact Person's Phone No" required> -->
                            </div>
                            
                            
                            <!-- <div class="col-lg-12 form-group">
                                <div class="check_box">
                                    <input type="checkbox" value="None" id="squared2" name="check">
                                    <label class="l_text" for="squared2">I accept the <span>politic of confidentiality</span></label>
                                </div>
                            </div> -->
                            <div class="col-lg-6 text-center">
                                <button type="submit" class="btn action_btn thm_btn">Free Trial For 30 Days.<br>Create an Account</button>
                            </div>
                            <div class="col-lg-6 text-center">
                                <a href="pricing.php" class="btn action_btn thm_btn">For Time-limited Special Offer on Subscription,<br> Click Here</a>
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
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/pre-loader.js"> </script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/parallaxie.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="assets/wow/wow.min.js"></script>
    <script src="js/main.js"></script>
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

            
            const phoneInputField = document.querySelector("#phone_no");
            const phoneInput = window.intlTelInput(phoneInputField, {
                preferredCountries: ["my"],
                hiddenInput: "contact_person_phone",
                utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });
 
        </script>
</body>

</html>