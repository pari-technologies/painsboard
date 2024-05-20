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

                            <h4>Terms and Conditions&nbsp;</h4>
                            <p><b>Harvest The Minds Sdn Bhd</b>
                            </p>

                            <p><b>PLEASE READ THESE TERMS AND CONDITIONS CAREFULLY BEFORE VISITING/ACCESSING ANY OF OUR SITES AS THEY 
                                CONTAIN BINDING LEGAL TERMS. BY VISITING/ACCESSING ANY OF OUR SITES, YOU ARE DEEMED TO HAVE FULLY READ, 
                                UNDERSTOOD AND AGREE TO THESE TERMS AND CONDITIONS AS MAY BE AMENDED BY US FROM TIME TO TIME. </b>
                            </p>

                            <p><b>IF YOU DO NOT AGREE TO ANY OF THESE TERMS AND CONDITIONS, YOU MUST CEASE VISITING/ACCESSING ALL OUR SITES.</b>
                            </p>

                            <p><b>1.	Copyright</b><br>
                            All editorial content, graphics, video and soundbites on <a href="https://painsboard.com">www.painsboard.com</a> and other subsites 
                                (hereinafter collectively referred to as “Sites”) under <b>Harvest The Minds Sdn Bhd (Company No: 875289-X)</b> 
                                (hereinafter referred to as “The Company”) are protected by Malaysian copyright law and international treaties and may not 
                                be copied or re-used without the express permission of The Company, which reserves all rights. Re-use of any of such 
                                content online for any purpose is strictly prohibited. Permission to use The Company's proprietary content may be granted on 
                                a case-by-case basis. Please direct your enquiries to <a href="mailto:info@painsboard.com">info@painsboard.com</a>
                            </p>

                            <p>The materials from the Sites are available for informational and non-commercial offline use only, 
                                provided that: the content and/or graphics are not modified, amended or altered in any way whatsoever; 
                                all copyright and other notices on any copy are retained; and permission in writing has been granted by 
                                The Company. You may not reproduce, upload, display or distribute the content or material from the Sites 
                                whether for commercial or personal purposes without the express written permission of The Company.
                            </p>

                            <p>You may not copy or adapt the HTML code that The Company creates to display pages. 
                                It also is covered by The Company's copyright. The "look" and "feel" of the Sites are also 
                                trademarks of The Company. This includes but not limited to colour scheme, button shapes, layout, 
                                and all other graphical elements.
                            </p>

                            <p>Third party news agency material contained in the Sites is protected by copyright and shall not be 
                                published, broadcast, rewritten for broadcast or publication or redistributed directly or indirectly 
                                in any medium. Neither this material nor any portion thereof may be stored in a computer except for personal 
                                and non-commercial use.
                            </p>

                            <p>The Company and/or news agency/agencies, as the case maybe, will not be held liable for any delays, 
                                inaccuracies, errors or omissions therefrom or in the transmission or delivery of all or any part thereof 
                                or for any damages arising from any of the foregoing.
                            </p>

                            <p><b>2.	The Company and its subsidiaries</b><br>
                            The Company and its group of companies operates in Malaysia. 
                            </p>

                            <p><b>3.	Trademarks</b><br>
                            Among the trademarks and service marks owned by The Company and/or its subsidiaries which shall 
                            include but not limited to : Harvest the Minds, Break the Pattern, PainsBoard, SealTribes, brainsthon 
                            and the respective logos of all the sites. All other trademarks and trade names are the property of their 
                            respective owners.
                            </p>

                            <p><b>4.	House Rules</b><br>
                            The Company has a thriving user community and actively encourages commenting on articles and stories. 
                            We are dedicated to this community and strive to maintain a respectful, engaging and informative conversation. 
                            Towards that end, we have general guidelines for commenting. They are enforced 24/7 by a moderating system that 
                            features a team of staff and moderation tools.
                            </p>

                            <p>If in our absolute opinion, your comments consistently or intentionally make this community a 
                                less civil and enjoyable place to be, you and your comments will be excluded from it.
                            </p>

                            <p>The Company promotes a receptive, transparent and civil atmosphere for comments and users. 
                                Critical, in-depth and intelligent discussions and debates are encouraged.
                            </p>

                            <p><b>A. The Dont's.</b> Everyone is welcomed and encouraged to voice their opinion regardless of identity, politics, 
                                ideology, religion or agreement with other community members, the author of the post or members as long as 
                                those opinions are respectful and constructively add to the conversation. However, this community does not 
                                tolerate direct or indirect attacks, name-calling or insults, nor does it tolerate intentional attempts to 
                                derail, hijack, troll or bait others into an emotional response. We reserve absolute discretion to remove these 
                                types of comments from the community where warranted. Individuals who consistently or intentionally post 
                                these types of comments may be warned online and, if necessary, excluded from the community and/or be reported 
                                to the relevant authorities. We've established the following House Rules so that everyone can get the most out 
                                of the Sites. Please note that these rules also apply to rich media submissions such as images, video and audio 
                                clips, as well as content associated with you such as avatar images. Examples of comments that are not permitted 
                                under our House Rules include, but shall not be limited to:

                                <ul>
                                    <li>Vulgar/offensive/obscene in nature;</li>
                                    <li>Fraudulent, deceptive or misleading;</li>
                                    <li>Off topic;</li>
                                    <li>Spam (such as the same comment posted repeatedly) or include certain links to other sites;</li>
                                    <li>Impliedly or expressly attacks and/or defames any third party;</li>
                                    <li>Offensive towards any gender, ethnic, religion, race or culture;</li>
                                    <li>Advocating any illegal activity;</li>
                                    <li>Describe or encourage activities which could endanger the safety or well-being of others;</li>
                                    <li>Promoting particular services, products, or political organizations;</li>
                                    <li>Appear to impersonate someone else;</li>
                                    <li>Contains disclosure of personal information including name, contact number, address, email and others;</li>
                                    <li>Infringing the proprietary rights, copyrights or trademarks of any party;</li>
                                    <li>Illegal and/or breaches any regulations or laws currently in force;</li>
                                    <li>Are written in anything other than English, Bahasa Malaysia unless expressly stated;</li>
                                    <li>Any other comments that the Team deems inappropriate;</li>
                                    <li>Advertising or promoting products or websites is strictly prohibited . This may include links to:</li>
                                    <li>Personal websites or forums;</li>
                                    <li>Surveys and questionnaires;</li>
                                    <li>Commercial websites or auction sites that mainly exist to sell products.</li>
                                    <li><b>Details of charity or fundraising events</b>
                                    <p>For example, if it's relevant to the debate, it is fine to link to a website that sells 
                                        an album or book if it helps another user or recommends something they would like. However, 
                                        posting up links to your own band's album or trying to drive buyers to your e-bay auction or fundraising 
                                        site may result in your post being removed.
                                        
                                    </p>
                                    </li>
                                    <li><b>Risk breaching copyright law</b>
                                    <p>Copyright law exists to stop someone from plagiarising another's work. It applies to the internet in the same way as 
                                        it does to TV, books and the press. Breaking copyright law can result in being taken to court.
                                    </p>

                                    <p>Please do not post large chunks of text copied from other sources, as this may be an infringement of copyright. 
                                        Short quotes to illustrate a point may be permissible, although this is at our discretion.
                                    </p>

                                    <p>If you wish to refer to external sources of information, it's better to include a link to an 
                                        appropriate external website.
                                    </p>

                                    <p>In addition to this, postings with heavy text speak or unintelligible language such as codes, 
                                        are also not allowed as this may disrupt the natural flow of conversation.
                                    </p>

                                    <p>Contributing material to any of the Sites’ community with the intention to commit a crime, break the 
                                        law, or condone or encourage unlawful activity is strictly prohibited.
                                    </p>
                                    <p>In addition, we may remove posts which we consider could endanger other users - which shall include but not 
                                        limited to, offering medical and health advice, or encouraging drug or alcohol abuse or self-harm.
                                    </p>
                                    </li>
                                    <li><b>Contain potentially defamatory statements</b>
                                    <p>Defamation laws exist to protect individuals and/or organisations from unwarranted, mistaken, or untruthful attacks on their reputation.
                                    </p>

                                    <p>Posting a defamatory statement on our Sites is the same as publishing it in a newspaper or magazine 
                                        and can result in legal proceedings being commenced.
                                    </p>

                                    <p>To avoid legal proceedings being commenced, please ensure that you verify the information in your posting as true and 
                                        accurate, especially when presenting negative statements as facts. Also, avoid jumping to conclusions, exaggerating or 
                                        making subtle implications. Remember that adding the word 'allegedly' to a statement does not stop it being defamatory.
                                    </p>

                                    <p>Both you and The Company can be held liable if you make a defamatory statement on the Sites. So we will remove 
                                        comments where we have insufficient evidence to defend publication of your statement. This means the Sites
                                        moderators may err on the side of caution when considering some comments.
                                    </p>
                                    </li>
                                    <li><b>Are abusive or disruptive</b>
                                        <p>Abusive or disruptive behaviour is not allowed on the Sites. This includes, but shall not be limited to:
                                            <ul>
                                                <li>Using swear words (including abbreviations or alternative spellings) or other language likely to offend.</li>
                                                <li>Harassing, threatening, or causing distress or inconvenience to any person or people.</li>
                                                <li>Flaming: This means posting something that's angry and mean-spirited.</li>
                                                <li>Trolling: This means saying deliberately provocative things just to stir up trouble.</li>
                                                <li>Infringing the rights of, restrict or inhibit anyone else's use and enjoyment of the Sites.</li>
                                                <li>Attempting to impersonate somebody.</li>
                                                <li>Using multiple accounts to disrupt boards, annoy users, or to avoid pre-moderation.</li>
                                                <li>Bumping or creating duplicate threads, posting in such a way as to cause technical errors, 
                                                    or any other attempts to disrupt the normal flow of conversation. Users who seriously or repeatedly 
                                                    demonstrate such behaviour may have their accounts pre-moderated or permanently restricted and will 
                                                    not be allowed to return.</li>
                                            
                                            </ul>
                                        </p>
                                    </li>
                                    <li><b>Are offensive</b>
                                    <p>Comments that contain offensive content are not allowed on the Sites. Racist, sexist, homophobic, disabling,
                                        sexually explicit, abusive, or otherwise objectionable material will be removed and if extreme will result 
                                        in immediate and permanent restriction of your account.
                                        
                                    </p>
                                    </li>
                                    <li><b>Are off-topic</b>
                                        <p>Comments that are unrelated to the subject of the article entry to which you are contributing are considered 'off-topic'.
                                        </p>

                                        <p>Please do not contribute off-topic material in subject-specific article, except where an article has designated open post. 
                                            If your comment has been removed for being off-topic, you may be able to resubmit your comment in a more relevant topic area.
                                        </p>
                                    </li>

                                    <li><b>Contain personal details</b>
                                        <p>Including contact or identification details in comments such as phone numbers, postal or email 
                                            addresses is not allowed on most services. Please do not reveal any personal information about 
                                            yourself or others as it might inadvertently put you or someone else at risk.
                                        </p>
                                    </li>

                                    <li><b>Risk contempt of court</b>
                                        <p>Once a suspect is arrested for an offence, or offences, legal restrictions apply. Please use caution when discussing 
                                            reports of an arrest or court proceedings. Even linking to archived news stories, blog entries, and comments may be 
                                            unlawful as Malaysian contempt law, would usually prohibit any reference to the previous conviction(s) of someone facing 
                                            new court proceedings
                                        </p>
                                    </li>

                                    <li><b>Contain spam</b>
                                        <p>Spamming or flooding is not allowed on the Sites. Spamming means submitting the same or very similar contribution many times across 
                                            blogs or entries. Flooding comprises a resubmission of your contribution to the same site multiple times.
                                        </p>

                                        <p>Please do not use a signature beneath your comment to promote websites, services, products, or campaigns. This will cause your posts to be 
                                            removed as spam.
                                        </p>
                                    </li>

                                    <li><b>Contain unsuitable URLs</b>
                                        <p>For example you should not link to
                                            <ul>
                                                <li>Unlawful, unsuitable or sexually explicit content.</li>
                                                <li>Websites that require payment to access.</li>
                                                <li>Foreign language content.</li>
                                                <li>Websites that initiate a file download or require additional software in order to view them. This includes .pdf and .mp3 files.</li>
                                            </ul>
                                        </p>
                                    </li>

                                    <li><b>Websites that advertise or promote products</b>
                                        <p>In some cases the moderator will edit out the link/s leaving the rest of the comment visible on the board. If so the link will 
                                            be replaced by [Unsuitable/ broken URL removed by moderator]
                                        </p>

                                        <p>The Company welcomes feedback, both positive and negative, about our programmes and services but please make sure your comments 
                                            are in line with the above House Rules.
                                        </p>
                                        <p>
                                        Repeatedly posting personal or offensive comments about individual members of the public or people who 
                                        work for the Company and its group of subsidiaries and/or companies may be considered harassment. We 
                                        reserve the right to remove such messages and take action against those responsible.
                                        </p>
                                    </li>


                                </ul>
                            </p>

                            <p><b>B. Moderation Process.</b> To maintain a civil atmosphere, our moderation team may read comments before they 
                            are displayed to other users. If this is the case, you may see your comment pending approval. Approval times can vary 
                            depending on the site-wide comment load, so please be patient; we will get to all comments as quickly as possible.
                            </p>

                            <p><b>C. The Do's.</b> Be yourself, only yourself, and just one of yourself. Every person's opinion is valuable and 
                            unique. Pretending to be someone else removes that unique value from you or from others. Don't misrepresent yourself 
                            or others, spread misinformation, create multiple accounts or "astroturf" (Where a user pretends to be an objective 
                            commentator, but has a vested interest in the subject matter) If you do, you will make the community a less enjoyable 
                            and valuable place to be and will be removed when we see it.
                            </p>

                            <p>This community is a safe space. We strongly believe that the Sites’ should be a safe space for individuals, groups 
                                and their ideas. As such, violent and hostile language or calls for violence and hostility are not welcome here. 
                                If you directly or indirectly threaten the physical or mental wellbeing of a member of this community, or an individual 
                                or group who is the subject of an article, you will be removed immediately. If a credible threat is made against an 
                                individual or group, not only will it be removed but it is likely that it will be reported to law enforcement agencies and 
                                we will cooperate with them to any extent requested. Personal identifiable information should never be posted. It never 
                                turns out well for anyone. If you see any threats, harassment or personal information trolling please report it quickly.
                            </p>

                            <p>If you have comments, we are here and we have real people who read and reply.<br>
                                If you have complaints, questions, concerns, or just feedback - positive or critical - please get in touch with us at <a href="mailto:info@painsboard.com">info@painsboard.com</a>

                            </p>

                            <p><b>5.	Disclaimers and Warnings</b><br>
                            <b>A. Disclaimer Option.</b>
                            <ol type="i">
                                <li>The Company seeks to ensure that information contained in these pages is accurate. However, The Company makes no representations as 
                                    to accuracy, correctness, completeness, suitability, validity of any information on these pages and will not be liable for any errors, 
                                    omissions, delay in the information contained in this pages or any other information accessed via any of the Sites, including without 
                                    limitation, any information reached via links on the Sites to external sites, or any losses, injuries or damages arising from its 
                                    display or use. All users are strongly encouraged to seek professional advice before relying on any information provided herein.</li>
                                <li>The Company shall not be liable in anyway whatsoever for any and all losses or damages which you may suffer including but not limited to any 
                                    financial and/or information loss.</li>
                            </ol>

                            <b>B. Warning Option.</b>
                            <ol type="i">
                                <li>To avoid disappointment, we encourage you to consult our Terms and Conditions and House Rules before commenting. 
                                    Please be aware that your comment is subject to these rules as well as our Terms & Conditions and may be removed 
                                    without prior notice should it violate either of the aforementioned.</li>
                                <li>You shall not use <a href="https://painsboard.com">www.painsboard.com</a> on any illegally modified devices such as jailbroken device, rooted device or any device that has been 
                                    altered in any way whatsoever.</li>
                                <li>You shall be fully responsible for any losses or damages that you may suffer in anyway whatsoever should you breach any of the terms herein.</li>
                            </ol>
                            </p>

                            <p><b>6.	Assignment</b><br>
                            You shall not assign or in any other way transfer your rights or obligations under these Terms and Conditions or part thereof. We may assign these Terms and Conditions whether in whole 
                            or in part to any third party without prior notice.
                            </p>

                            <p><b>7.	Waiver</b><br>
                            No failure or delay in exercising any of our rights under these Terms and Condition will operate as a waiver of such right unless otherwise acknowledged and agreed by us in writing.
                            </p>

                            <p><b>8.	Governing Law</b><br>
                            These Terms and Conditions shall be construed in accordance with and governed by the law of Malaysia and you hereby agree to submit to the exclusive jurisdiction of the Malaysian courts.
                            </p>

                            <p><b>9.	PRIVACY of Personal Information</b><br>
                            Please refer to the privacy policy (<a href="https://painsboard.com/privacy.php">https://www.painsboard/privacy</a>) to view the terms regarding the use of your information.
                            </p>

                            <p><b>10.	Contact Us</b><br>
                            If there are any questions or concerns regarding this Terms and Conditions or the consent practices outlined herein, please contact us as follows:
                            </p>
                            <p>
                            <b>By Email</b>: <a href="mailto:info@painsboard.com">info@painsboard.com</a>
                            </p>

                            <p>
                            </b>By Mail</b>: Harvest The Minds Sdn Bhd,  B-03-10, Gateway Corporate Suites, Gateway Kiaramas, No 1, Jalan Desa Kiara, Mont Kiara, 50480 Kuala Lumpur
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