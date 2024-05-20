
<?php

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
                    <img src="img/logo_painsboard/logo3.jpeg" alt="" height="80">
                </div>
            </div>
            <!-- <h2 class="head">Did You Know?</h2>
            <p></p> -->
        </div>
    </div>
    <div class="body_wrapper sticky_menu">
    <nav class="navbar navbar-expand-lg menu_two" id="sticky">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo_painsboard/logo3.jpeg"  alt="logo" height="50">
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
                        <a href="index.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Home</a>
                      
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="about.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">About</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Resources
                        </a>
                        <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                           data-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="blogs.php" class="nav-link">Blog</a></li>
                            <li class="nav-item"><a href="buy_books.php" class="nav-link">Buy Books</a></li>
                            <li class="nav-item"><a href="ebooks.php" class="nav-link">Free eBooks</a></li>
                            <li class="nav-item"><a href="articles.php" class="nav-link">Articles</a></li>
                            <li class="nav-item"><a href="videos.php" class="nav-link">Videos</a></li>
                            <!-- <li class="nav-item"><a href="#" class="nav-link" >Related Sites</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="pricing.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Plans & Pricing</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="contact.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Contact Us</a>
                    </li>
                   
                    <?php
                        if(!isset($_SESSION['org_id'])){
                            

                    ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="signin.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign In</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="signup.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign Up</a>
                    </li>
                    <?php
                        }

                        else{
                            if($_SESSION['org_id'] == ""){

                                ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="signin.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign In</a>
                    </li>
                    <li class="nav-item dropdown submenu active">
                        <a href="signup.php" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Sign Up</a>
                    </li>

                    <?php

                            }

                            else{


                                ?>
                    <li class="nav-item dropdown submenu active">
                        <a href="organization_profile.php?id=<?php echo $_SESSION['org_id'];?>" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dashboard</a>
                    </li>

                <?php
                            }
                        }
                    ?>
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
            
        </div>
        <section class="doc_documentation_area doc_documentation_full_area body_fixed">
            <div class="overlay_bg"></div>
            <div class="container-fluid pl-60 pr-60">
                <div class="row">
                <div class="col-lg-2 col-md-2">
                    </div>
                    
                    <div class="col-lg-9 col-md-9">
                        <div id="post" class="documentation_info">
                            <article class="documentation_body" id="documentation">
  
                            </article>

                            <h4>Terms and Conditions &nbsp;</h4>
                            <h5>The Digital Access Subscription &nbsp;</h5>
                            <p>These Terms of Use govern your use of “The PainsBoard Digital Access Subscription” service (“<b>Service</b>”). Please 
                                read the following terms carefully before subscribing to the Service as they contain binding legal terms and 
                                obligations, which shall include but not limited to, limitations or exclusion of our liability. By subscribing 
                                to the Service, you are deemed to have fully read, understood and agreed to be bound by these terms and 
                                conditions governing the Service. 
                            </p>
                            <p>
                            <h5>INTRODUCTION &nbsp;</h5>
                            </p>
                            <p>The Service is offered by <b>Harvest The Minds Sdn Bhd (Company No: 875289-X)</b> (“<b>Company</b>”) to subscribers of <a href="https://painsboard.com">www.painsboard.com</a> portal (“<b>Platform</b>”). 
                                Subscribers will receive access to content and personalised features on the Platform. 
                            </p>

                            <h5>SUBSCRIPTION PLANS AND FEE &nbsp;</h5>
                            <p>
                            <table class="table table_shortcode">
                                    <thead>
                                        <tr>
                                            <th>Plan</th>
                                            <th>Max no of participants</th>
                                            <th>Fees/month, billed yearly (RM)</th>
                                            <th>Fees (RM)/year</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>30-Day Free Trial</th>
                                            <td>No limit</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th>Basic</th>
                                            <td>500</td>
                                            <td>158.33</td>
                                            <td>1,900.00</td>
                                        </tr>
                                        <tr>
                                            <th>Intermediate</th>
                                            <td>5000</td>
                                            <td>408.33</td>
                                            <td>4,900.00</td>
                                        </tr>
                                        <tr>
                                            <th>Advanced</th>
                                            <td>No limit</td>
                                            <td>825.00</td>
                                            <td>9,900.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </p>
                            <p>The Company offers one (1) month free subscription (“<b>Free Subscription</b>”) to allow new subscribers 
                                and current visitors of the Platform to use the Service. 
                            </p>

                            <p>Free Subscription eligibility is determined by the Company at its sole discretion and the Company may amend/review the 
                                eligibility from time to time. The Company reserves the right to revoke the Free Subscription and put your account on 
                                hold in the event that the Company determines that you are not eligible.
                            </p>

                            <p>The Company reserves the right to:
                                <ul>
                                    <li>charge the recurring subscription fee for the next billing cycle at the specific billing date as indicated in 
                                        your registered account unless you cancel your subscription prior to the end of the current billing cycle.</li>
                                    <li>amend the subscription plans and/or fee and/or withdraw any of the plans at any time without prior notice. 
                                        Details of the amendment and/or withdrawal will be uploaded at <a href="https://painsboard.com/pricing.php">https://www.painsboard.com/subscribe/</a>. You are 
                                        encouraged to visit the web page on a regular basis to ensure that you are aware of any amendments made by the Company. 
                                        Your continued usage of the Service after amendments are posted onto the web page means you agree to be legally bound by 
                                        these amendments. Price changes will apply to subsequent billing cycles.</li>
                                    <li>upgrade or remove any of the features of the subscription plans. </li>
                                    <li>withdraw any section(s)/subsection(s)/component(s) in the subscription plan and/or Platform at any time as and when the Company deems fit 
                                        without prior notification. </li>
                                </ul>
                            </p>
                            <h5>BILLING CYCLE &nbsp;</h5>
                            <p>Subscription fee will be billed on an annual basis, according to the selected plan and payment method corresponding to the date of the activation of the Service. If a payment is overdue, the Company may suspend the Service and 
                                you will not be able to access the Platform unless payment has been fully settled.
                            </p>
                            <p>The Company will not be held liable for any additional interest or fee charged by the bank/financial institution/payment gateway service provider for any 
                                transaction/admin fee. Please check with your bank/financial institution/payment gateway service provider for details.
                            </p>

                            <h5>APPLICABLE TAX AND TAX INVOICE &nbsp;</h5>
                            <p>In addition to the subscription fee, you shall be liable for payment of any applicable government taxes and/or levies as may be imposed 
                                by the relevant governmental agency/authority in Malaysia or in your country. For the avoidance of doubt, the subscription fee provided 
                                herein excludes the relevant service tax under the Service Tax Act 2018. The Company will make available to you a valid tax invoice in 
                                respect of the amount payable but you will be responsible for prompt payment even if you have not received the tax invoice. For avoidance 
                                of doubt, nothing herein shall preclude the Company from correcting at any time any error or discrepancy in the amount stated in the tax 
                                invoice.
                            </p>
                            <p>A certificate signed by an officer of the Company shall be conclusive evidence as to any amounts owing under or in respect of the Service (save 
                                for demonstrable error).
                            </p>

                            <h5>PAYMENT METHOD &nbsp;</h5>
                            <p>You shall provide complete and accurate information required by the Company to facilitate the subscription.
                            </p>
                            <p>You may subscribe to the Service through <a href="https://painsboard.com">www.painsboard.com</a>. Payment can be made via credit card or debit card and eWallet through ‘iPay88’ payment gateway.
                            </p>
                            <p>Upon successful processing of your registration and payment, the Company will send you an email for verification purposes. Subscribers who do not 
                                receive our email notification within the next twenty four (24) hours from the time of payment should contact our Customer Service email 
                                at <a href="mailto:info@painsboard.com">info@painsboard.com</a>.
                            </p>
                            <p>For details of your registration, you shall log into your account at <a href="https://painsboard.com">www.painsboard.com</a>.
                            </p>


                            <h5>CANCELLATION, CHANGING PLANS AND REFUNDS &nbsp;</h5>
                            <p><b>Cancellation</b></p>
                            <p>The Company will require three (3) days to process your cancellation request. Termination will only take effect at the end of the current 
                                billing cycle. You may continue to access the Platform until the end of your billing cycle. Subscription fee charged will not be refunded 
                                after the cancellation.</p>
                            <p>To cancel your subscription via <a href="https://painsboard.com">www.painsboard.com</a>, please do the following:</p>
                            <ul>
                                <li>Log into your account via www.PainsBoard.com > My Account (Membership info) and deactivate auto-renewal function.</li>
                                <li>Please note that uninstalling the website will not cancel your subscription. </li>
                            </ul>

                            <p><b>Change Plan</b></p>
                            <p>You are allowed to change your subscription plan from lower price to higher price Plan but not vice versa. Please contact the company for this request. The Company has 
                                the right to reject refund requests due to any mistake, wrong plan update or change of mind.

                            </p>

                            <p><b>Refunds</b></p>
                            <p>A refund may be allowed at the Company’s sole discretion under exceptional circumstances, of which the Company will review on 
                                a case to case basis.

                            </p>


                            <h5>PASSWORD AND ACCOUNT ACCESS &nbsp;</h5>
                            <p>As a paid subscriber, you will have access and control over your registered account. Your registered account contains some sensitive information such as subscription information, 
                                payment method, billing and payment information, personalised settings and recommended content. To safeguard your details and privacy, do NOT 
                                reveal your password nor your payment details to anyone. 
                            </p>
                            <p>You shall be responsible for keeping your account details up-to-date and accurate.
                            </p>
                            <p>Subscribers should be mindful of any communication requesting credit card or other account information. You hereby acknowledge that providing information in response to these types 
                                of communications can result in identity theft. You are advised to access your sensitive account information by going directly to <a href="https://painsboard.com">www.painsboard.com</a> and not through hyperlink in an 
                                email or any specific electronic communication.
                            </p>


                            <h5>USE AND DISCLOSURE OF PERSONALLY IDENTIFIABLE INFORMATION AND ANONYMOUS INFORMATION &nbsp;</h5>
                            <p>By subscribing to the Service, you hereby allow the Company to collect and process your Personal Data (as defined by Section 4 of the Personal Data Protection Act 2010) for the provision of the Service. 
                            </p>
                            <p>Click here [<a href="https://painsboard.com/privacy.php">www.painsboard.com/privacy</a>] to view the full Privacy Policy of <b>Harvest The Minds Sdn Bhd.</b> 
                            </p>


                            <h5>WARRANTIES AND LIMITATIONS OF LIABILITY &nbsp;</h5>
                            <p>The Service is provided on an "as is where is" basis and without warranty or condition. In particular, the Service may not be uninterrupted or error-free. You waive all special, indirect and consequential damages against the Company in relation to the use of the Service.
                            </p>

                            <h5>GOVERNING LAW &nbsp;</h5>
                            <p>These Terms of Use shall be governed by the laws of Malaysia.
                            </p>

                            <h5>CUSTOMER SERVICE &nbsp;</h5>
                            <p>Kindly contact us if you need further assistance about the Access Package.
                            </p>
                            <p>
                            <b>Email</b>: <a href="mailto:info@painsboard.com">info@painsboard.com</a>
                            </p>

                            <p>
                            (Last updated 06 October 2021).
                            </p>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <footer class="footer_area footer_p_top f_bg_color">
        <img class="p_absolute leaf" src="img/v.svg" alt="">
        <img class="p_absolute f_man wow fadeInLeft" data-wow-delay="0.4s" src="img/home_two/f_man.png" alt="">
        <img class="p_absolute f_cloud" src="img/home_two/cloud.png" alt="">
        <!-- <img class="p_absolute f_email" src="img/home_two/email-icon.png" alt=""> -->
        <!-- <img class="p_absolute f_email_two" src="img/home_two/email-icon_two.png" alt=""> -->
        <!-- <img class="p_absolute f_man_two wow fadeInLeft" data-wow-delay="0.2s" src="img/home_two/man.png" alt=""> -->
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="f_widget subscribe_widget wow fadeInUp">
                            <!-- <a href="index.html" class="f_logo"><img src="img/logo_painsboard/logo3.jpeg" alt="" height="60"></a> -->
                            <div class="f_widget link_widget pl_30 wow fadeInUp" data-wow-delay="0.2s">
                            <h3 class="f_title">Quick Link</h3>
                            <ul class="list-unstyled link_list">
                                <li><a href="about.php">About</a></li>
                                <li><a href="privacy.php">Privacy Policy</a></li>
                                <li><a href="tnc1.php">Terms and Conditions (Harvest The Minds Sdn Bhd) </a></li>
                                <li><a href="tnc2.php">Terms and Conditions (PainsBoard)</a></li>
                                
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="f_widget link_widget pl_30 wow fadeInUp" data-wow-delay="0.2s">
                            <h3 class="f_title">Contact</h3>
                            <p>Harvest the Minds Sdn Bhd (875289-X)</p>
                            B-03-10, Gateway Corporate Suites,<br>
                            Gateway Kiaramas, No 1,<br>
                            Jalan Desa Kiara, Mont Kiara, <br>
                            50480 Kuala Lumpur,<br>
                            Malaysia<br>
                            <p>+60 17-689 6598</p>
                            <p>info@painsboard.com</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="f_widget link_widget wow fadeInUp" data-wow-delay="0.4s">
                            <!-- <iframe allowfullscreen="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.034263808653!2d101.57992991475712!3d3.0855302977531083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4d3d0bc5a403%3A0xb6e013a2ec3a8e51!2sP.A.R.I.+Technologies+(M)+Sdn+Bhd!5e0!3m2!1sen!2smy!4v1535077127686" style="border:0;   box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);" width="400" height="250" frameborder="0"></iframe> -->
                            <div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=Gateway%20Corporate%20Suites,%20Gateway%20Kiaramas,%20No%201,%20Jalan%20Desa%20Kiara,%20Mont%20Kiara,%2050480%20Kuala%20Lumpur&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net"></a><br><style>.mapouter{position:relative;text-align:right;height:250px;width:400px;}</style><a href="https://www.embedgooglemap.net">google maps embed api</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:250px;width:400px;}</style></div></div>
                        </div>
                    </div>
                   
                </div>
                <div class="border_bottom"></div>
            </div>
        </div>
        <div class="footer_bottom text-center">
            <div class="container">
                <p>© 2024 All Rights Reserved by <a href="index.php">PainsBoard</a></p>
            </div>
        </div>
    </footer>
    </div>
   
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Complaint Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
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
                            <!-- <div class="col-lg-9 form-group">
                                <h6>Add Pdf/Photos/Videos (Optional. Max 2 MB) <small><i>/ Lampirkan Pdf/foto/video (Jika ada. Maks 2MB)</i></small></h6>
                                <div class="col-lg-6 form-group">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                            </div> -->
                            
                           
                        </div>
                    <!-- </form> -->
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
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


        function showComplaint(com_title, com_category,com_k1,com_k2,com_k3,com_message,com_solution) {
            document.getElementById("title").innerHTML = com_title;
            document.getElementById("category").innerHTML = com_category;
            document.getElementById("keyword1").innerHTML = com_k1;
            document.getElementById("keyword2").innerHTML = com_k2;
            document.getElementById("keyword3").innerHTML = com_k3;
            document.getElementById("message").innerHTML = com_message;
            document.getElementById("solution").innerHTML = com_solution;
        }
    </script>
</body>

</html>