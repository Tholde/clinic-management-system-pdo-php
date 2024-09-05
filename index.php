<?php
require_once "user.php";
require_once "classes/docteur.php";
require_once "classes/contactUs.php";
require_once "classes/page.php";
//error_reporting(0);
$action = new User();
$infor = new ContactUs();
$page = new About();
if (isset($_POST['submit'])) {

    $infor->fullname = $_POST['fullname'];
    $infor->phone = $_POST['mobileno'];
    $infor->email = $_POST['emailid'];
    $infor->message = $_POST['description'];
    $infor->isRead = 0;
    $action->connect();
    $action->insertContact($infor);
    echo "<script>alert('Your information succesfully submitted');</script>";
    echo "<script>window.location.href ='index.php'</script>";
} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Th Clinic </title>

    <link rel="shortcut icon" href="asset/images/fav.jpg">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="asset/css/animate.css">
    <link rel="stylesheet" type="text/css" href="asset/css/style.css" />
</head>

<body>

    <!-- ################# Header Starts Here#######################--->

    <header id="menu-jk">

        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3  col-sm-12" style="color:#000;font-weight:bold; font-size:42px; margin-top: 1% !important; ">Th Clinic
                        <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#conseil">Conseil</a></li>
                            <li><a href="#about_us">About Us</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contact_us">Contact Us</a></li>
                            <li><a href="#logins">Logins</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2 d-none d-lg-block appoint">
                        <a class="btn btn-success" href="user-login.php">Appointment</a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ################# Slider Starts Here#######################--->

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="d-block w-100" src="asset/images/slider/slider_2.jpg" alt="Second slide">
                    <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Th Clinic</h5>
                        <p>The clinic management system is based on the idea of providing an automated system.</p><br>
                        <p> This saves additional time and overhead to perform the action.</p>


                    </div>
                </div>

                <div class="carousel-item active">
                    <img class="d-block w-100" src="asset/images/slider/slider_3.jpg" alt="Third slide">
                    <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Th Clinic</h5>
                        <p>The clinic management system is based on the idea of providing an automated system.</p><br>
                        <p> This saves additional time and overhead to perform the action.</p>

                    </div>

                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>

    <!--  ************************* Logins ************************** -->


    <section id="logins" class="our-blog container-fluid">
        <div class="container">
            <div class="inner-title">

                <h2>Logins</h2>
            </div>
            <div class="col-sm-12 blog-cont">
                <div class="row no-margin">
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="asset/images/patient.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Patient Login</h6>
                                <a href="user-login.php" target="_blank">
                                    <button class="btn btn-success btn-sm">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="asset/images/doctor.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Doctors login</h6>
                                <a href="doctor" target="_blank">
                                    <button class="btn btn-success btn-sm">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="asset/images/personal.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Personal Login</h6>

                                <a href="personnel" target="_blank">
                                    <button class="btn btn-success btn-sm">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="asset/images/admin.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Admin Login</h6>

                                <a href="admin" target="_blank">
                                    <button class="btn btn-success btn-sm">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <!-- ################# Our Departments Starts Here#######################--->


    <section id="services" class="key-features department">
        <div class="container">
            <div class="inner-title">

                <h2>Our Key Features</h2>
                <p>Take a look at some of our key features</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-heartbeat"></i>
                        <h5>Cardiology</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-ribbon"></i>
                        <h5>Orthopaedic</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fab fa-monero"></i>
                        <h5>Neurologist</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-capsules"></i>
                        <h5>Pharma Pipeline</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-prescription-bottle-alt"></i>
                        <h5>Pharma Team</h5>
                    </div>
                </div>

            </div>
        </div>

    </section>


    <!-- ************************** Conseil *****************************************-->
    <div id="conseil" class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="d-block w-100" src="asset/images/slider/4331465.jpg" alt="Second slide">
                    <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Cancer broncho pulmonaire primitif</h5>
                        <p>Travaux directement associés à la production des matériaux
                            contenant de l’amiante
                            Travaux nécessitant l’utilisation d’amiante en vrac
                            Travaux d’isolation utilisant des matériaux contenant de
                            l’amiante
                            Travaux de retrait d’amiante
                            Travaux de pose et de dépose de matériaux isolants à base
                            d’amiante
                            Travaux de construction et de réparation navale
                            Travaux d’usinage, de découpe et de ponçage de matériaux
                            contenant de l’amiante
                            Fabrication de matériels de friction contenant de l’amiante
                            Travaux d’entretien ou de maintenance effectués sur des
                            équipements contenant des matériaux à base d’amiante</p>

                    </div>
                </div>

                <div class="carousel-item active">
                    <img class="d-block w-100" src="asset/images/slider/6460.jpg" alt="Third slide">
                    <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Insuffisance rénale chronique.</h5>
                        <p>Pour toutes les manifestations chroniques, l’exposition au
                            plomb doit être caractérisée par une plombémie antérieure
                            supérieure à 80 microgrammes /100ml ou, à défaut, par des
                            perturbations biologiques spécifiques d’une exposition
                            antérieure au plomb
                            Syndrome biologique associant deux anomalies :
                             D’une part, atteinte biologique comprenant soit un taux
                            d’acide delta aminolévulinique urinaire supérieure à 15
                            milligramme/g de créatinine , soit un taux de
                            protoporphyrine érythrocytaire supérieure à 20
                            microgramme /g d’hémoglobine
                             d’autre part, plombinémie supérieure à 80
                            microgrammes /100ml de sang
                            Le syndrome biologique doit être confirmé par la répétition
                            de deux retenus , pratiqués dans un intervalle rapproché par
                            un laboratoire agréé dans les conditions prévues ) l’article 4
                            du n°88-120 du 1er février 1998 relatif à la protection des
                            travailleurs exposés au plomb métallique et ses composés</p>

                    </div>

                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>

    <!--  ************************* About Us Starts Here ************************** -->

    <section id="about_us" class="about-us">
        <div class="row no-margin">
            <div class="col-sm-6 image-bg no-padding">

            </div>
            <div class="col-sm-6 abut-yoiu">
                <h3>About Our Hospital</h3>
                <?php
                $action->connect();
                $abo = $action->fetchAllAbout();
                foreach ($abo as $key => $val) {
                ?>
                    <p><?php echo $val['pageDescription']; ?>.</p>
                <?php } ?>
            </div>
        </div>
    </section>


    <!--  ************************* Gallery Starts Here ************************** -->
    <div id="gallery" class="gallery">
        <div class="container">
            <div class="inner-title">

                <h2>Our Gallery</h2>
                <p>View Our Gallery</p>
            </div>
            <div class="row">


                <div class="gallery-filter d-none d-sm-block">
                    <button class="btn btn-default filter-button" data-filter="all">All</button>
                    <button class="btn btn-default filter-button" data-filter="hdpe">Dental</button>
                    <button class="btn btn-default filter-button" data-filter="sprinkle">Cardiology</button>
                    <button class="btn btn-default filter-button" data-filter="spray"> Neurology</button>
                    <button class="btn btn-default filter-button" data-filter="irrigation">Laboratry</button>
                </div>
                <br />



                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                    <img src="asset/images/gallery/gallery_01.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                    <img src="asset/images/gallery/gallery_02.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                    <img src="asset/images/gallery/gallery_03.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                    <img src="asset/images/gallery/gallery_04.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                    <img src="asset/images/gallery/gallery_05.jpg" class="img-responsive">
                </div>



                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                    <img src="asset/images/gallery/gallery_06.jpg" class="img-responsive">
                </div>

            </div>
        </div>


    </div>
    <!-- ######## Gallery End ####### -->


    <!--  ************************* Contact Us Starts Here ************************** -->

    <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">

            <div class="col-sm-12 cop-ck">
                <form method="post">
                    <h2>Contact Form</h2>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Enter Name :</label></div>
                        <div class="col-sm-8"><input type="text" placeholder="Enter Name" name="fullname" class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Email Address :</label></div>
                        <div class="col-sm-8"><input type="text" name="emailid" placeholder="Enter Email Address" class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Mobile Number:</label></div>
                        <div class="col-sm-8"><input type="text" name="mobileno" placeholder="Enter Mobile Number" class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Enter Message:</label></div>
                        <div class="col-sm-8">
                            <textarea rows="5" placeholder="Enter Your Message" class="form-control input-sm" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label></label></div>
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-sm" type="submit" name="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>





    <!-- ################# Footer Starts Here#######################--->


    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <h2>Useful Links</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="about" href="#about">About us</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" href="#services">Services</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="products" href="#logins">Logins</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="gallery" href="#gallery">Gallery</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="contact" href="#contact">Contact us</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12 map-img">
                    <h2>Contact Us</h2>
                    <address class="md-margin-bottom-40">

                        <?php
                        $action->connect();
                        $cont = $action->fetchAllContact();
                        foreach ($cont as $key => $row) {
                        ?>


                            <?php echo $row['pageDescription']; ?> <br>
                            Phone: <?php echo $row['phone']; ?> <br>
                            Email: <a href="mailto:<?php echo $row['email']; ?>" class="">
                                <?php echo $row['email']; ?>
                            </a><br>
                            Timing: <?php echo $row['disponibleTime']; ?>
                    </address>

                <?php } ?>
                </div>
            </div>
        </div>


    </footer>
    <div class="copy">
        <div class="container">
            Th clinic
        </div>

    </div>

</body>

<script src="asset/js/jquery-3.2.1.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/plugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="asset/plugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="asset/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>

<script src="asset/js/script.js"></script>



</html>