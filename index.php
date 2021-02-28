<?php
session_start();
require_once  'config/config.php';
require_once  'helpers/database_connection.php';
require_once 'autoloader.php';
use Ads\Classes\Advertisment;
$ads = new Advertisment(DATABASE_CONFIG);
if(!empty($_SESSION['ads'])){
    $allAds = $_SESSION['ads'];
}
else{
    $allAds = $ads->getAllAdvertisments();
}

if (isset($_SESSION['user_info'])) {
    header('Location: pages/users_page.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Modern Town</title>

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--

    Template 2077 Modern Town

    http://www.tooplate.com/view/2077-modern-town

    -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- Home section
================================================== -->
<section id="home" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <h3 class="wow fadeInDown" data-wow-delay="0.2s">START A GOOD DAY</h3>
                <h1 class="wow fadeInDown">MODERN TOWN</h1>
                <a href="#contact" class="btn btn-default smoothScroll wow fadeInUp" data-wow-delay="0.6s">JOIN</a>
            </div>

        </div>
    </div>
</section>


<!-- Navigation section
================================================== -->
<section class="navbar navbar-default navbar-fixed-top sticky-navigation" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Modern Town</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right main-navigation">
                <li><a href="#home" class="smoothScroll">HOME</a></li>
                <li><a href="#blog" class="smoothScroll">BLOG</a></li>
                <li><a href="#contact" class="smoothScroll">LOGIN</a></li>
            </ul>
        </div>

    </div>
</section>


<!-- blog section
================================================== -->
<section id="blog" class="paralla-section">
    <div class="container">
        <div class="row">
            <h2>OUR BLOG</h2>
            <?php
                include_once "pages/search_part_page.php";
            ?>
            <h4>Simple and Powerful tips</h4>
            <div class="blog-masonry masonry-true">
            <?php include_once "pages/ads_part_page.php"?>
            </div>

        </div>
    </div>
</section>


<!-- Contact section
================================================== -->
<section id="contact" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">

                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a style="color: white; background-color: black;" href="#Section1" aria-controls="home" role="tab" data-toggle="tab">sign in</a></li>
                        <li role="presentation"><a style="color: white; background-color: black;" href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">sign up</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                            <form class="form-horizontal" action="form_actions/login.php" method="post">
                                <div class="form-group">
                                    <input name="userEmail" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input name="userPassword" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button style="background-color: white; color: black;" type="submit" class="form-control">Sign in</button>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                            <form class="form-horizontal" action="form_actions/signup.php" method="post" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <div class="input__wrapper">
                                        <input name="picture" type="file" id="input__file" class="input input__file" multiple>
                                        <label for="input__file" class="input__file-button">
                                            <span class="input__file-icon-wrapper"><img class="input__file-icon" src="images/add.png" alt="Выбрать файл" width="25"></span>
                                            <span class="input__file-button-text">Выберите файл</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="userName" type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input name="userLastName" type="text" class="form-control" placeholder="Last name">
                                </div>
                                <div class="form-group">
                                    <input name="userEmail" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input name="userPassword" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button style="background-color: white; color: black;" type="submit" class="form-control">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- /.col-md-offset-3 col-md-6 -->
        </div>
    </div>
</section>


<!-- Footer section
================================================== -->
<footer>
    <div class="container">
        <div class="col-md-6 col-sm-6" data-wow-delay="0.3s">
            <p>Modern Town - just start your day</p>
        </div>
    </div>
</footer>

<!-- Javascript
================================================== -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
</body>
</html>




















