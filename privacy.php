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

                            <h4>Privacy Policy&nbsp;</h4>
                            <p>We, <b>Harvest The Minds Sdn Bhd (Company No: 875289-X),</b> 
                                respect the privacy of individuals with regard to personal data and are 
                                committed to protecting the privacy of our users/subscribers/customers 
                                (collectively, <b>“Users”</b>), and strive to provide a safe and secure user experience. 
                            </p>

                            <p>This Privacy Policy is formulated in accordance with the Personal Data Protection Act 2010 ("<b>Act</b>"), 
                                which describes how your information (“<b>Personal Data</b>”) is collected and used and your choices with 
                                respect to your Personal Data. For absolute clarity, any reference to “we”, “our” or “us” in this 
                                Privacy Policy shall include any member of <b>Harvest The Minds Sdn Bhd.</b> 
                            </p>

                            <p>The following discloses our information gathering and dissemination practices for 
                            <b>Harvest The Minds Sdn Bhd</b>, <a href="https://painsboard.com">www.painsboard.com</a> and websites created and/or owned by 
                            <b>Harvest The Minds Sdn Bhd</b> that are made available to you for the use of, or subscription to, 
                                or purchase of any products and/or services offered by <b>Harvest The Minds Sdn Bhd.</b>
                            </p>

                            <p><b>1.	Information collected by the Websites</b><br>
                                Our Websites’ servers do not automatically recognize specific information about 
                                individual users on our Websites. In addition, our servers do not automatically record 
                                information regarding a User's e- mail address unless the User supplies it.

                            </p>

                            <p>We collect information about Users during the registration process for certain parts of our sites; 
                                through their participation in certain activities, including contests, forums, and polls; 
                                and through the use of cookies. When you request pages from our server, it automatically 
                                collects some information about your preferences, including your internet protocol (“<b>IP</b>”) address. 
                                We use this to help diagnose problems with our server, and to administer our Websites.
                            </p>

                            <p>The User-supplied information collected through the registration process, surveys, contest 
                                entry forms, polls or other similar vehicles is used to improve the content of our sites, 
                                or used for our marketing purposes. It is not shared with other organizations for commercial 
                                purposes unless specifically stated herein.
                            </p>

                            <p><b>2.	Purpose of Personal Data collected</b><br>
                            Personal Data that you provide to us voluntarily on our Websites and the other related channels 
                            may be processed and/or disclosed to our Vendors (as hereinafter defined) for the following 
                            purposes (collectively, "<b>Purposes</b>"):

                            <ul>
                                <li>to manage, verify and complete transactions with you;</li>
                                <li>to manage and verify your membership for our customer loyalty scheme (where applicable);</li>
                                <li>to direct market our products and/or services to you;</li>
                                <li>to understand and analyse our sales, and your needs and preferences;</li>
                                <li>to develop, enhance, market and provide products and services to meet your needs;</li>
                                <li>to enable you to participate in promotions and contests;</li>
                                <li>to process exchanges or product returns;</li>
                                <li>to improve our services;</li>
                                <li>to respond to your requests or complaints;</li>
                                <li>to send you updates on products, news and event updates, rewards and promotions, special privileges and initiatives offered by 
                                    <b>Harvest The Minds Sdn Bhd</b> and/or its partners and/or advertisers;</li>
                                <li>to process your payment transactions;</li>
                                <li>for our credit control service and/or collection of debts due and owing to us; and</li>
                                <li>to comply with any regulatory, statutory or legal obligation imposed on us by any relevant authority.</li>
                            </ul>

                            </p>
                            <p>Although the precise details of the Personal Data collected will vary according to the specific 
                                purpose (such as contests, forums, surveys etc.) whether via online or otherwise, we may typically 
                                collect the following Personal Data from or in relation to you:
                                <ul>
                                    <li>Name;</li>
                                    <li>Address;</li>
                                    <li>Phone number(s);</li>
                                    <li>Date of birth;</li>
                                    <li>Email address;</li>
                                    <li>Gender;</li>
                                    <li>Identity card number or passport number</li>
                                </ul>
                            </p>
                            <p><b>3.	Use and Disclosure</b><br>
                            We may disclose your Personal Data within <b>Harvest The Minds Sdn Bhd</b> and/or to the 
                            Vendors (as hereinafter defined) for the Purposes set forth hereinabove in accordance with the 
                            terms and conditions set out herein.

                            </p>

                            <p>We are responsible for the Personal Data under our control, including Personal Data disclosed 
                                by us to a Vendor (often referred to as the data processor and third party service providers). "<b>Vendor</b>" 
                                in this Privacy Policy means in relation to Personal Data, any person or entity (other than our own employee) 
                                who processes the Personal Data on behalf of us and/or who provide third party services for us. 
                            </p>

                            <p>"<b>Processing</b>", in relation to Personal Data means for example obtaining, recording, holding or 
                                using the Personal Data in carrying out any operation or set of operations on the Personal 
                                Data and/or providing its respective services to us. 
                            </p>

                            <p>We take every measure to provide a comparable level of protection for Personal Data should the information be processed by a Vendor. 
                            </p>

                            <p>We use and disclose aggregated non-personally identifying information collected through the Websites as part of our organization's process of constantly improving the Websites, 
                                and the products and services offered by <b>Harvest The Minds Sdn Bhd.</b> 
                            </p>

                            <p><b>4.	Impact of Non Provision of Personal Data</b><br>
                            Please note that in the event that sufficient Personal Data is not supplied, or is not satisfactory to us, 
                            then your application or request for any of the above Purposes may not be accepted or acted upon or your request 
                            to browse some information on the Websites, or the use of, or subscription to, or purchase of any products and/or 
                            services offered by <b>Harvest The Minds Sdn Bhd</b> may be denied or affected.
                            </p>

                            <p><b>5.	Storage and Retention of Personal Data</b><br>
                            Your Personal Data shall be stored either in hard copies in our offices or in servers 
                            located in Malaysia. It may be necessary to transfer your Personal Data to third party 
                            services providers based/located outside Malaysia. By continuing to use the Websites, 
                            products and/or services of <b>Harvest The Minds Sdn Bhd</b>, you hereby consent to such transfer.
                            </p>

                            <p>Any Personal Data supplied by you will be retained by us as long as necessary for the fulfilment of the Purposes stated in paragraph (2) above or as required to 
                                satisfy legal regulatory, accounting requirements or to protect our interests.
                            </p>

                            <p>Save and except as provided in paragraph (15) hereof, we do not offer any online facilities 
                                for you to delete your Personal Data held by us.
                            </p>

                            <p><b>6.	How Email and 'Contact Us' messages are being handled</b><br>
                            We may preserve the content of any email or "Contact Us" or other electronic message that we receive
                            </p>

                            <p>Any Personal Data contained in those messages will only be used or disclosed in ways set out in this Privacy Policy.
                            </p>

                            <p>The message content may be monitored by our service providers or employees for purposes including but not limited to compliance, 
                                auditing and maintenance or where email abuse is suspected.
                            </p>

                            <p><b>7.	Communication or Utilisation Data</b><br>
                            Through your use of telecommunications services to access the Websites 
                            and/or any other sites operated and/or managed by <b>Harvest The Minds Sdn Bhd</b>, your communications data 
                            (e.g. IP address) or utilization data (e.g. information on the beginning, end and extent of each access, 
                            and information on the telecommunications services you accessed) are technically generated and could conceivably relate to Personal Data.
                            </p>

                            <p>To the extent that there is a compelling necessity, the collection, processing and use of your communications or utilization data will occur and will 
                                be performed in accordance with the applicable data privacy protection legal framework.
                            </p>

                            <p><b>8.	Automatic Collection of Non-Personally Identifiable Data</b><br>
                            When you access the Websites and/or use of any product/services offered by <b>Harvest The Minds Sdn Bhd</b>, we may automatically (i.e., not by registration) collect, 
                            use and disclose non-personally identifiable data, including but not limited to information about your Internet browser and operating system, domain name of the 
                            website from which you came, number of visits, average time spent on the site and pages viewed.
                            </p>

                            <p>We may use and disclose these non-personally identifiable data and share it within <b>Harvest The Minds Sdn Bhd</b> and/or 
                                third parties to inter alia; monitor the attractiveness of the Websites and improve our performance/product/services/content 
                                on an aggregate, anonymize and non-personally identifiable basis. However, please be assured that this information is not 
                                intended to be used to personally identify you.
                            </p>

                            <p>
                            For example, we may collect:
                            <ul>
                                <li>Device information— such as your hardware model, IP address, other unique device identifiers, operating system version, 
                                    browser type and settings, such as language and available font settings, and settings of the device you use to access our Websites.</li>
                                <li>Usage information— such as information about your usage of the Websites, products and/or services offered 
                                    by <b>Harvest The Minds Sdn Bhd</b>, the time and duration of your usage and other information about your interaction with 
                                    content offered by <b>Harvest The Minds Sdn Bhd</b>, and any information stored using cookies, mobile ad identifiers, and similar 
                                    technologies that we have set on your device. For detailed information about our use of cookies, web beacons, and other technologies, 
                                    see Online Tracking and Advertising in paragraph (9) below</li>
                                <li>Location information— such as your computer’s IP address, your mobile device’s global positioning system (GPS) signal or information 
                                    about nearby WiFi access points and cell towers that may be transmitted to us when you use certain services.</li>
                            </ul>
                            </p>

                            <p><b>9.	Online Tracking and Advertising</b><br>
                            <b>How We Use Cookies, Web Beacons, and Similar Technologies and How to Disable These Technologies</b><br>
                            We and any third parties duly appointed/authorized by us to provide content, advertising, or functionality or 
                            measure and analyze advertisement performance on our Websites (collectively, “<b>Authorized Third Parties</b>”), may use cookies, 
                            web beacons, mobile advertising identifiers, and similar technologies to facilitate administration and navigation, 
                            to better understand and improve our Websites, to determine and/or improve the advertising shown to you here or within the 
                            online sites operated and/or managed by <b>Harvest The Minds Sdn Bhd</b>, and to provide you with a customized online experience.
                            </p>

                            <p>
                            <b>Cookies</b>. Cookies are small files that are placed on your computer when you visit the Websites. Cookies may be used to store a 
                            unique identification number tied to your computer or device so that you can be recognized as the same user across 
                            one or more browsing sessions, and across one or more sites. Cookies serve many useful purposes. For example:
                            <ul>
                                <li>Cookies can remember your sign-in credentials so you do not have to enter those credentials each time you visit a Website.</li>
                                <li>Cookies can help us and the Authorized Third Parties understand which parts of our Websites are the most popular because 
                                    they help us see which pages and features users access and how much time they spend on the pages. By studying this kind of 
                                    information, we are better able to adapt our Websites and provide you with a better experience.</li>
                                <li>Cookies help us and the Authorized Third Parties understand which advertisements you have seen so that you don’t receive the same 
                                    advertisement each time you visit our Websites.</li>
                            </ul>
                            </p>

                            <p>
                            Most browsers accept cookies automatically, but can be configured not to do so or to notify the user when a cookie is being sent. 
                            If you wish to disable cookies, refer to your browser help menu to learn how to disable cookies. If you disable browser cookies or 
                            flash cookies, it may interfere with the proper functioning of our Websites.
                            </p>

                            <p>
                            <b>Beacons</b>. We, along with the Authorized Third Parties, also may use technologies called beacons (or “pixels”) that communicate 
                            information from your device to a server. Beacons can be embedded in online content, videos, and emails, and can allow a server 
                            to read certain types of information from your device, know when you have viewed particular content or a particular email message, 
                            determine the time and date on which you viewed the beacon, and the IP address of your device. We and third parties use beacons for a 
                            variety of purposes, including to analyze the use of the Websites and products and/or services offered 
                            by <b>Harvest The Minds Sdn Bhd</b> and (in conjunction with cookies) to provide content and advertisements that are more relevant to you.
                            </p>

                            <p>
                            <b>Local Storage & Other Tracking Technologies</b>. We, along with third parties, may use other kinds of technologies, 
                            such as Local Shared Objects (also referred to as “Flash cookies”) and Hypertext Markup Language revision 5 
                            (HTML5) local storage, in connection with our Websites. We also may use unique identifiers associated with your 
                            device, such as mobile advertising identifiers. These technologies are similar to the cookies discussed above in 
                            that they are stored on your device and can be used to store certain information about your activities and preferences. 
                            However, these technologies may make use of different parts of your device from standard cookies, and so you might not be 
                            able to control them using standard browser tools and settings. For HTML5 local storage, the method for disabling HTML5 will 
                            vary depending on your browser. 
                            </p>

                            <p>
                            <b>Additional Choices With Respect To Targeted Advertising</b><br>
                            As described above, we and the Authorized Third Parties may use cookies and other tracking technologies 
                            to facilitate serving relevant advertisements to you. For example, these technologies help us determine 
                            whether you have seen a particular advertisement before, tailor advertisements to you if you have visited our 
                            Websites before, and avoid sending you duplicate advertisements.

                            </p>

                            <p>
                            Due to differences between using apps and websites on mobile devices, you may need to take additional steps 
                            to disable tracking technologies in mobile applications. Many mobile devices allow you to opt-out of targeted 
                            advertising for mobile applications using the settings within the mobile application or your mobile device. 
                            For more information, please check your mobile settings. You also may uninstall our applications using the 
                            standard uninstall process available on your mobile device or app marketplace.
                            </p>


                            <p><b>10.	Public Forums</b><br>
                            Our Websites make information sharing, feedback, forums, and/or message boards available to Users. 
                            Please remember that any information that is disclosed in these areas becomes public information and you should 
                            exercise caution when deciding to disclose your Personal Data. We request that users treat each other with 
                            courtesy and mutual respect.
                            </p>

                            <p><b>11.	Job Applicants</b><br>
                            Personal Data provided in connection with an application for employment will be used to determine your suitability for a position 
                            with <b>Harvest The Minds Sdn Bhd</b> and, if applicable, your terms of employment or engagement.
                            </p>

                            <p>
                            Your information may also be used to monitor our recruitment initiatives and equal opportunities policies.
                            </p>

                            <p>
                            Your details may be disclosed to third parties to verify or obtain additional information including education institutions, 
                            current/previous employers and credit reference agencies. Credit reference agencies record these searches and you can contact 
                            us to find out which agencies we used. Unsuccessful applications may be retained to match your skills to future job opportunities.
                            </p>

                            <p><b>12.	Confidentiality</b><br>
                            Personal Data held by us will be kept confidential in accordance with this Privacy Policy pursuant to any 
                            applicable law that may from time to time be in force.
                            </p>

                            <p>
                            Any questions, comments, suggestions or information other than Personal Data sent or posted to the Websites, or any part 
                            thereof by Users will be deemed voluntarily provided to us on a non-confidential and non-proprietary basis.
                            </p>

                            <p>
                            We reserve the right to use, reproduce, disclose, transmit, publish, broadcast and/or post elsewhere 
                            such information freely without further reference to you.
                            </p>

                            <p><b>13.	Security</b><br>
                            Our Websites have security measures in place to protect the loss, misuse and alteration of the information under 
                            our control. When a User is asked to provide his/her credit card information, we provide a secure environment 
                            through our partners' systems (using industry standard SSL or SET protocols) for this purpose.
                            </p>

                            <p>
                            For the internet, unfortunately, no data transmission over the internet can be guaranteed as completely secure. 
                            So while we strive to protect such Personal Data, we cannot ensure or warrant the security of any Personal Data 
                            transmitted to us and individuals do so at their own risk. Once any Personal Data comes into our possession, 
                            we will take reasonable steps to protect that information from misuse and loss and from unauthorised access, 
                            modification or disclosure.
                            </p>

                            <p>
                            A username and password may be essential for you to use some sections of the Websites. For your own protection,
                             we require you to keep these confidential and to change your password regularly (if required).
                            </p>

                            <p><b>14.	Links</b><br>
                            Our Websites contain links to other sites. We are not responsible for the privacy practices or the content 
                            of such sites. We have established relationships with advertisers and/or business partners but such relationships 
                            are generally technical in nature, or content collaborations. If any advertisers and/or business partners access 
                            to any information entered by Users in our database, this fact shall be disclosed to the Users upon initiating 
                            the registration process. Users who feel they do not wish their information to be shared by anyone other than the 
                            Websites may then opt out of completing the registration.
                            </p>

                            <p><b>15.	Access to, Correction and Update of Personal Data & Opt-out / Unsubscribe</b><br>
                            Under the Act, you have the right to access your Personal Data held by us by paying a fee that may be imposed 
                            by us to cover our reasonable administration costs and to request correction and/or to update your Personal Data 
                            which are inaccurate, incomplete, misleading and/or not up-to-date.
                            </p>

                            <p>
                            If you have any questions regarding this Privacy Policy or if you wish to request access to your 
                            Personal Data or if you wish to correct and/or update your Personal Data, you may send your request in writing to:
                            </p>

                            <p>
                            <b>By Email</b>: <a href="mailto:info@painsboard.com">info@painsboard.com</a>
                            </p>

                            <p>
                            </b>By Mail</b>: Harvest The Minds Sdn Bhd,  B-03-10, Gateway Corporate Suites, Gateway Kiaramas, No 1, Jalan Desa Kiara, Mont Kiara, 50480 Kuala Lumpur
                            </p>

                            <p>
                            We may use your Personal Data to contact you in the future to tell you about our products and/or services 
                            that we believe will be of interest to you. If we do so, our marketing communication will contain instruction 
                            enabling you to “opt-out / unsubscribe”. If you do not wish to receive any future communication, you may click 
                            on the “opt-out / unsubscribe” button so that you will be removed from our mailing lists.
                            </p>

                            <p>
                            If you would like us to delete your Personal Data, you can write to us by using the above contact 
                            information at any time.
                            </p>

                            <p><b>16.	Changes to Privacy Policy</b><br>
                            We reserve the right to amend this Privacy Policy from time to time without prior notice. Any changes 
                            to the Privacy Policy will be uploaded onto our Websites and therefore, we encourage you to check/visit 
                            the Websites from time to time for any changes on a regular basis.
                            </p>

                            <p>
                            In the event of conflict between the English and Bahasa Melayu versions of the Privacy Policy, the English version of the Privacy Policy shall prevail.
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