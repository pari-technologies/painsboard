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
    <!-- icon css-->
    <link rel="stylesheet" href="assets/elagent-icon/style.css">
    <link rel="stylesheet" href="assets/animation/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>KbDoc</title>
</head>

<body data-scroll-animation="true">
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
    <div class="body_wrapper">
        <section class=" ">
            <div class="row ml-0 mr-0">
                <div class="sign_left signup_left">
                    <h2>We are design changers do what matters.</h2>
                    <img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
                    <img class="position-absolute middle wow fadeInRight" src="img/signup/man_image.png" alt="bottom">
                    <div class="round wow zoomIn" data-wow-delay="0.2s"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <h3>Create your PainsBoard Account</h3>
                            <p>Register for organization <a href="signup_organization.php">here</a></p>
                            <p>Already have an account? <a href="signin.php">Sign in</a></p>
                            <br>
                        </div>
                        <form method="post" action="api/add_users.php" class="row login_form">
                            <div class="col-sm-12 form-group">
                                <div class="small_text">User name</div>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name">
                            </div>
                            
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Category</div>
                                <div class="form-group" >
                                <select class="form-control" name="category" id="category">
                                <?php
                            
                                    $sql = "SELECT * FROM user_type";
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
                                <div class="small_text">Organization</div>
                                <div class="form-group" >
                                <select class="form-control" name="organization" id="organization">
                                <?php
                            
                                    $sql2 = "SELECT * FROM organization";
                                    if($result2 = mysqli_query($link, $sql2)){
                                        if(mysqli_num_rows($result2) > 0){
                                            while($row2 = mysqli_fetch_array($result2)){
                                                echo "<option value='".$row2['id']."'>" . $row2['org_name'] . "</option>";
                                                   
                                                }

                                            // Free result set
                                            mysqli_free_result($result2);
                                        } 
                                        
                                    } 

                                   
                                ?>
                                </select>
                                    </div> 
                                   
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Your email</div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="info@KbDoc.com">
                            </div>
                            
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Password</div>
                                <input id="password" name="password" type="password" class="form-control" placeholder="5+ characters required" autocomplete="off">
                            </div>
                            <!-- <div class="col-lg-12 form-group">
                                <div class="check_box">
                                    <input type="checkbox" value="None" id="squared2" name="check">
                                    <label class="l_text" for="squared2">I accept the <span>politic of confidentiality</span></label>
                                </div>
                            </div> -->
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn action_btn thm_btn">Create an account</button>
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
</body>

</html>