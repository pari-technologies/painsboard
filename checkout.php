<?php
session_start();
require_once "config/config.php";
require_once 'config/IPay88.class.php';

$ipay88 = new IPay88('M36290');

$ipay88->setMerchantKey('0mtPxOuTGd');
$id = $_GET['id'];

if($_SESSION["org_id"]== ""){
    echo "<script>";
    echo "alert('Please sign up or login to use this feature');";
    echo "window.history.back();"; // redirect with javascript, after page loads
    echo "</script>";
}

$sql = "SELECT * FROM organization where id = '".$_SESSION["org_id"]."'";
echo $sql;
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $org_id = $row['id'];
                        $org_name = $row['org_name'];
                        $org_email = $row['org_email'];
                        $contact_person_phone = $row['contact_person_phone'];   
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

                            <h4>Subscription plan&nbsp;</h4>
                            <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Package</th>
                                            <th>No of users</th>
                                            <th>Quantity</th>
                                            <th width="20%">Price/Year (RM)</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($id == '1'){ ?>
                                            <tr>
                                                <th>Basic</th>
                                                <td>500</td>
                                                <td>1</td>
                                                <td>RM1,900.00</td>
                                            </tr>
                                        <?php }?>
                                        <?php if($id == '2'){ ?>
                                            <tr>
                                                <th>Intermediate</th>
                                                <td>5,000</td>
                                                <td>1</td>
                                                <td>RM4,900.00</td>
                                            </tr>
                                        <?php }?>
                                        <?php if($id == '3'){ ?>
                                            <tr>
                                                <th>Advanced</th>
                                                <td>Unlimited</td>
                                                <td>1</td>
                                                <td>RM9,900.00</td>
                                            </tr>
                                        <?php }?>
                                        <?php if($id == '100'){ ?>
                                            <tr>
                                                <th>Testing</th>
                                                <td>Unlimited</td>
                                                <td>1</td>
                                                <td>RM1.00</td>
                                            </tr>
                                        <?php }?>
                                        <!-- <tr>
                                            <th></th>
                                            <td></td>
                                            <td></td>
                                            <td><a href="#" class="btn action_btn thm_btn">Check Out</td>
                                        </tr> -->
                                    </tbody>
                            </table>
                            <h5>Payment Details&nbsp;<small>(please make sure your details are correct)</small></h5>
                            <br>
                            <form action="api/request.php" class="contact_form" method="post">
                                <div class="row contact_fill">
                                    <div class="col-lg-4 form-group">
                                        <h6>Email</h6>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email here" value="<?php echo $org_email;?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <h6>Contact Number</h6>
                                        <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Contact number" value="<?php echo $contact_person_phone;?>">
                                        <input type="hidden" class="form-control" name="org_name" id="org_name" value="<?php echo $org_name;?>">
                                        <input type="hidden" class="form-control" name="org_id" id="org_id" value="<?php echo $org_id;?>">
                                        <?php
                                            if($id == '1'){
                                        ?>
                                        <input type="hidden" class="form-control" name="amount" id="amount" value="1900.00">
                                        <input type="hidden" class="form-control" name="plan" id="plan" value="Basic">
                                        <?php
                                            }
                                        
                                            else if($id == '2'){
                                        ?>
                                        <input type="hidden" class="form-control" name="amount" id="amount" value="4900.00">
                                        <input type="hidden" class="form-control" name="plan" id="plan" value="Intermediate">
                                        <?php
                                            }
                                        
                                            else if($id == '3'){
                                        ?>
                                        <input type="hidden" class="form-control" name="amount" id="amount" value="9900.00">
                                        <input type="hidden" class="form-control" name="plan" id="plan" value="Advance">
                                        <?php
                                            }
                                        
                                            else if($id == '100'){
                                        ?>
                                        <input type="hidden" class="form-control" name="amount" id="amount" value="1.00">
                                        <input type="hidden" class="form-control" name="plan" id="plan" value="Testing">
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    
                                    <div class="col-lg-4 form-group">
                                        <!--<input type="hidden" class="form-control" name="payment_method" id="payment_method" value="6">-->
                                        <button type="submit" class="btn action_btn thm_btn">Check Out</button>
                                    </div>  
                                    
                                    <!-- <div class="col-lg-4 form-group">
                                        <h6>Payment Method</h6>
                                        <select class="form-control" name="payment_method" id="payment_method">
                                            <option value="6">Maybank2U</option>
                                            <option value="8">Alliance Online</option>
                                            <option value="10">AmOnline</option>
                                            <option value="14">RHB Online</option>
                                            <option value="15">Hong Leong Online</option>
                                            <option value="20">CIMB Click</option>
                                            <option value="31">Public Bank Online</option>
                                            <option value="102">Bank Rakyat Internet Banking</option>
                                            <option value="103">Affin Online</option>
                                            <option value="124">BSN Online</option>
                                            <option value="134">Bank Islam</option>
                                            <option value="152">UOB</option>
                                            <option value="166">Bank Muamalat</option>
                                            <option value="167">OCBC</option>
                                            <option value="168">Standard Chartered Bank</option>
                                            <option value="198">HSBC Online Banking</option>
                                        </select>
                                    </div> -->
                                    
                                    
                                    <!-- <div class="col-lg-12 form-group">
                                        <button type="submit" class="btn action_btn thm_btn">Check Out</button>
                                    </div> -->
                                </div>
                            </form>
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