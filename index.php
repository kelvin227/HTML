<!DOCTYPE html>
<html>
<head>
    <style>
        .dropdown{
            position: relative;
            display: inline-block;
        }

        .dropdown-content{
            display: None;
            position: absolute;
            
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1px;
        }
        .dropdown-content a {
            decoration: None;
        }
        .dropdoown-content a:hover {
            color: blue !important;
        }
        .dropdown:hover .dropdown-content {
            color: White;
            display:block;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Codegator - Connecting programmers, animators, and gamers. Join our community, collaborate on projects, and grow your skills.">
    <meta name="keywords" content="Codegator, gator, coding, programming, learntocode, Codegator tech connect, Codegator developers network, Codegator animation and gaming, Codegator programming community, Codegator web development, Tech connect, Gamer hub, Digital creative platform, technology, science, developers, html, css, javascript, JS, codegator, PHP, Connect with programmers, animators, and gamers, Tech connect for startups, Web development and animation services, Gaming community forum in Nigeria">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Codegator</title>
    <link rel="icon" type="image/png" href="img/logo.JPG" style="border-radius: 15px;">
    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="main-wrapper">
<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>

<div class="uc-mobile-menu-pusher">

<div class="content-wrapper">
<nav class="navbar m-menu navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="index.html"><img src="img/logo_header_.png" alt=""></a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="#navbar-collapse-1">

            

            <ul class="nav navbar-nav navbar-right main-nav">
                <li class="active"><a href="index.html">Home</a></li>
                <li>
                    <a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Features
                    <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="m-menu-content">
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Developer Platform</li>
                                    <li><a href="#">Awesome Features</a></li>
                                    <li><a href="#">Clean Interface</a></li>
                                    <li><a href="#">Reputation system</a></li>
                                    <li><a href="#">Convention</a></li>
                                    <li><a href="#">fast development phrase</a></li>
                                </ul>
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Coding Courses</li>
                                    <li><a href="includes/lessons.php">Realistic language Character</a></li>
                                    <li><a href="includes/lessons.php">Clean Interface</a></li>
                                    <li><a href="includes/lessons.php">Fun learning Environment</a></li>
                                    <li><a href="includes/lessons.php">Responsive Design</a></li>
                                    <li><a href="includes/lessons.php">Digital Certificate</a></li>
                                </ul>
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Web builder</li>
                                    <li><a href="#">Thousand of templates</a></li>
                                    <li><a href="#">Clean Interface</a></li>
                                    <li><a href="#">Available Possibilities</a></li>
                                    <li><a href="#">limitless Code snippets</a></li>
                                    <li><a href="#">Drag and drop interface</a></li>
                                </ul>
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Customer Service</li>
                                    <li><a href="#">24/7 customer service</a></li>
                                    <li><a href="#">friendly customer services</a></li>
                                    <li><a href="#">Easy to fin and connect</a></li>
                                    <li><a href="#">knowledgeable team</a></li>
                                    <li><a href="#">available via mutilple channels</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
         
                <li class="dropdown">
                <!-- sign up drop down-->
                    <a href="#">Sign Up<span><i class="fa fa-angle-down"></i></span></a>
                        <div class="dropdown-content"> 
                            <h4><a href="sign_up.php">Developer platform</a></h4>
                            <h4><a href="animator_corner/sign_up.php">Animator's corner</a></h4>
                        </div>
                </li>
                <li class="dropdown">
                <!-- sign up drop down-->
                    <a href="#">Login<span><i class="fa fa-angle-down"></i></span></a>
                        <div class="dropdown-content"> 
                            <h4><a href="login.php">Developer platform</a></h4>
                            <h4><a href="animator_corner/login.php">Animator's corner</a></h4>
                        </div>
                </li>
                
            </ul>

        </div>
        <!-- .navbar-collapse -->
    </div>
    <!-- .container -->
</nav>
<!-- .nav -->

<div id="x-corp-carousel" class="carousel slide hero-slide hidden-xs" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#x-corp-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#x-corp-carousel" data-slide-to="1"></li>
        <li data-target="#x-corp-carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/hero-slide-1.jpg" alt="Hero Slide">

            <div class="carousel-caption">
                <h1>It′s simple, smart and occasionally magical.</h1>

                <p>Intrinsicly negotiate corporate synergy rather than user-centric web services. Synergistically
                    transition emerging schemas and.</p>
            </div>
        </div>
        <div class="item">
            <img src="img/hero-slide-2.jpg" alt="...">

            <div class="carousel-caption">
                <h1>It′s profitable and successful!</h1>

                <p>Synergistically enhance low-risk high-yield testing procedures with clicks-and-mortar architectures.
                    Compellingly revolutionize future-proof interfaces and.</p>
            </div>
        </div>
        <div class="item">
            <img src="img/hero-slide-3.jpg" alt="...">

            <div class="carousel-caption">
                <h1>Good solutions for your business!</h1>

                <p>Monotonectally envisioneer 24/7 bandwidth with reliable imperatives. Continually unleash unique
                    niches after go forward.</p>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#x-corp-carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#x-corp-carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- #x-corp-carousel-->

<section class="x-services ptb-100 gray-bg">

    <section class="section-title">
        <div class="container text-center">
            <h2>What We Offer</h2>
            <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive" src="img/img-offer-2.jpg" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="#">Web Application Development</a></h3>

                        <p>Ignite innovation ad elevate user experiences with Codegator - Premier web Application Development. Unleash the power of dynamic and responsive web application  tailored to your unique needs. our expert developers craft solutions that seamlessly blend functionality and creativity, Empower your digital journey with Codegator - Where Vision meets Web Excellence.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive" src="img/img-offer-1.jpg" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="#">Website Development</a></h3>

                        <p>Transform your digital vision into reality with Codegator - pioneering Website Development. elvate your online presence wit bespoke, user-centric websites crafted by our expert team. from concept to code, we bring your brand to life on the web. Ignite the sucess with Codegator</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive" src="img/img-offer-3.png" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="#">Mobile Application</a></h3>

                        <p>Discover a world of possiblities with Codegator Elevate Your experience with our premium mobile application development tailored just for you. Quality, innovation, and satisfaction - we redefine excellence. Your satisfgaction, our priority.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive" src="img/img-offer-4.jpg" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="#">Third Party Hosting Services</a></h3>

                        <p>Empower your business with TPH - your trusted Third-Party Hosting Service. Seamlessly host your applications and data with our reliable infrastructure. Unleash effiency , Security, and scalability. focus on growth while we handle the hosting. Elevate your digital presence with TPH - Where hosting meets Excellence.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive" src="img/img-offer-5.jpg" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="#">Coding Courses</a></h3>

                        <p>Embark on coding adventures with Codegator- Unlocking Knowledge through Online Coding Courses. Dive into our comprehensive courses designed for learners of all levels. Master programmiung languages, conquer challenges, and propel your coding skills to new heights, Enroll with Codegator- Where learning meets Code Mastery.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail clearfix">
                    <a href="#"><img class="img-responsive" src="img/img-offer-6.jpg" alt="Image"></a>

                    <div class="caption">
                        <h3><a href="#">Developer platform</a></h3>

                        <p>Elevate your workflow with integrate - the Seamless Integration Platform. Connect, automate, and streamline your processess effortlessly. our platform empowers you to integrate diverse systems and applicatio, fostering a cohesive digital ecosystem. Experience effciency and agility like never before with Intergate - Where Integratin fuels success.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>
<!-- .x-services -->

<section class="x-features">
    <section class="section-title">
        <div class="container text-center">
            <h2>Our Capabilities</h2>
            <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 img-left">
                <img class="img-responsive" src="img/img-about.png" alt="">
            </div>
            <div class="col-md-6">
                <div class="promo-block-wrapper clearfix">
                    <div class="promo-icon">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <div class="promo-content">
                        <h3>We teach you how to Code and improve your coding skills</h3>

                        <p>We offer top-notch coding lessons and documents to help improve your coding skills.</p>
                    </div>
                </div>
                <!-- /.promo-block-wrapper -->

                <div class="promo-block-wrapper clearfix">
                    <div class="promo-icon">
                        <i class="fa fa-life-ring"></i>
                    </div>
                    <div class="promo-content">
                        <h3>We make the technology affordable for you</h3>

                        <p>We make the technology cheap and afforable for you.</p>
                    </div>
                </div>
                <!-- /.promo-block-wrapper -->

                <div class="promo-block-wrapper clearfix">
                    <div class="promo-icon">
                        <i class="fa fa-calculator"></i>
                    </div>
                    <div class="promo-content last-type">
                        <h3>Seamlessly grow your business and manage Your business.</h3>

                        <p>Grow your business from anywhere in the world with the technology we offer nothing is impossible.</p>
                    </div>
                </div>
                <!-- /.promo-block-wrapper -->

            </div>
        </div>
    </div>
</section>
<!-- .x-features -->

<!--<section class="team ptb-100">
    <section class="section-title">
        <div class="container text-center">
            <h2>Our Team</h2>
            <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <figure class="thumbnail">
                    <a href="#"><img src="img/img-team-1.jpg" class="img-responsive" alt="Image"></a>
                    <figcaption class="caption text-center">
                        <h3>Reena Scot -
                            <small>Director</small>
                        </h3>
                    </figcaption>
                </figure>
            </div>
            <!-- /.col-sm-4 

            <div class="col-sm-4">
                <figure class="thumbnail">
                    <a href="#"><img src="img/img-team-2.jpg" class="img-responsive" alt="Image"></a>
                    <figcaption class="caption text-center">
                        <h3>David Martin -
                            <small>Founder</small>
                        </h3>
                    </figcaption>
                </figure>
            </div>
            <!-- /.col-sm-4

            <div class="col-sm-4">
                <figure class="thumbnail">
                    <a href="#"><img src="img/img-team-3.jpg" class="img-responsive" alt="Image"></a>
                    <figcaption class="caption text-center">
                        <h3>Jenefir White -
                            <small>marketing</small>
                        </h3>
                    </figcaption>
                </figure>
            </div>
            <!-- /.col-sm-4 

        </div>
        <!-- /.row 
        <div class="row">
            <div class="col-sm-4">
                <figure class="thumbnail">
                    <a href="#"><img src="img/img-team-4.jpg" class="img-responsive" alt="Image"></a>
                    <figcaption class="caption text-center">
                        <h3>Reena Scot -
                            <small>Director</small>
                        </h3>
                    </figcaption>
                </figure>
            </div>
            <!-- /.col-sm-4 

            <div class="col-sm-4">
                <figure class="thumbnail">
                    <a href="#"><img src="img/img-team-5.jpg" class="img-responsive" alt="Image"></a>
                    <figcaption class="caption text-center">
                        <h3>David Martin -
                            <small>Founder</small>
                        </h3>
                    </figcaption>
                </figure>
            </div>
            <!-- /.col-sm-4 

            <div class="col-sm-4">
                <figure class="thumbnail">
                    <a href="#"><img src="img/img-team-6.jpg" class="img-responsive" alt="Image"></a>
                    <figcaption class="caption text-center">
                        <h3>Jenefir White -
                            <small>marketing</small>
                        </h3>
                    </figcaption>
                </figure>
            </div>
            <!-- /.col-sm-4 

        </div>
        <!-- /.row 
    </div>
    <!-- /.container
</section>-->
<!-- .team -->

<section class="client-logo ptb-100">
    <section class="section-title">
        <div class="container text-center">
            <h2>Our Products</h2>
            <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img src="img/gator_logo2.png" alt="Image"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img src="img/gator_logo3.png" alt="Image"></a>
            </div>
        </div>
    </div>
    <!--end of .container -->
</section>
<!-- /.client-logo -->


<footer class="footer">

    <!-- Footer Widget Section -->
    <div class="footer-widget-section">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-4 footer-block">
                    <div class="footer-widget widget_text">
                        <div class="footer-logo">
                            <a href="#"><img src="img/gator_logo.png" alt="" height="50%" width="200px"></a>
                        </div>
                        <p>Continually matrix cross functional opportunities whereas ethical information. Compellingly streamline enabled human capital before resource-leveling internal or "organic".</p>

                    </div>
                </div><!-- /.col-sm-4 -->

                <div class="col-sm-4 footer-block">
                    <div class="footer-widget widget_text">
                        <h3>We work for your \profit</h3>
                        <p>Dedicated to driving your success, our mission is clear - "we work for your profit" with a commitment to excellence, we tirelessly strive to enhance your business outcomes, ensuring that every effort ans innovation directly contributes to your prosperity. partner with us, and let's build a future of mutual growth an accomplishment.</p>
                    </div>
                </div><!-- /.col-sm-4 -->

                <div class="col-sm-4 footer-block last">
                    <div class="footer-widget widget_text">
                        <h3>Contact Us Today</h3>
                        <address>
                            Call Us 09132477584 OR 09139013750<br>
                            Send an Email on <a href="mailto:codegatorinc@gmail.com">Codegatorinc@gmail.com</a><br>
                           <!---- Visit Us 123 Fake Street- Blla 12358<br>
                            Fake Kingdom<br>-->
                        </address>

                        <ul class="list-inline social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div><!-- /.col-sm-4 -->
            </div>
        </div>
    </div><!-- /.Footer Widget Section -->

    <div class="copyright-section">
        <div class="container clearfix">
                <span class="copytext">Copyright &copy; 2016 | <a href="https://uicookies.com/downloads/x-corporation-free-bootstrap-html-template/">Codegator</a> Designed And Developed By: <strong style="color: #31aae2;">uiCookies.com</strong></span>

            <ul class="list-inline pull-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Softwares</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div><!-- .container -->
    </div><!-- .copyright-section -->
</footer>
<!-- .footer -->

</div>
<!-- .content-wrapper -->
</div>
<!-- .offcanvas-pusher -->

<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
            id="uc-mobile-menu-close-btn">&times;</button>
    <div>
        <div>
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="dropdown">
                <!-- sign up drop down-->
                    <a href="#">Sign Up<span><i class="fa fa-angle-down"></i></span></a>
                        <span class="dropdown-content"> 
                            <a href="sign_up.php">Developer platform</a>
                            <a href="animator_corner/sign_up.php">Animator's corner</a>
                        </span>
                </li><br />
                <li class="dropdown">
                <!-- sign up drop down-->
                    <a href="#">Login<span><i class="fa fa-angle-down"></i></span></a>
                        <span class="dropdown-content"> 
                            <h4><a href="login.php">Developer platform</a></h4>
                            <h4><a href="animator_corner/login.php">Animator's corner</a></h4>
                        </span>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- .uc-mobile-menu -->

</div>
<!-- #main-wrapper -->


<!-- Script -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/mobile-menu.js"></script>
<script src="js/flexSlider/jquery.flexslider-min.js"></script>
<script src="js/scripts.js"></script>
<div>
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="http://www.uicookies.com">HTML Templates by uiCookies</a>        
	</div>
</body>
</html>