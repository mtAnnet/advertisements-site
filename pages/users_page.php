<?php
session_start();
require_once  '../config/config.php';
require_once  '../helpers/database_connection.php';
require_once '../autoloader.php';
use Ads\Classes\Categories;
use Ads\Classes\Advertisment;
$ads = new Advertisment(DATABASE_CONFIG);

if(!empty($_SESSION['ads'])){
    $allAds = $_SESSION['ads'];
}
else{
    $allAds = $ads->getAllAdvertisments();
}

if (!isset($_SESSION['user_info'])) {
    header('Location: /');
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- Navigation section
================================================== -->
<section class="navbar navbar-default navbar-fixed-top " role="navigation">
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
            <ul class="nav navbar-nav navbar-right ">
                <li><a href="#blog" class="smoothScroll">BLOG</a></li>
                <li><a href="#addnewads" class="smoothScroll">ADD NEW ADVERTISEMENT</a></li>
                <li><a href="../form_actions/logout.php" class="smoothScroll">LOG OUT</a></li>
                <li><span><?php echo($_SESSION['user_info']['userName'])." ".($_SESSION['user_info']['userLastName']); ?></span></li>
                <li><a href="#"><div class="user-photo"><img src="<?php echo $_SESSION['user_info']['userPhoto']?>" alt="userPhoto"></div></a></li>
            </ul>
        </div>
    </div>
</section>

<!-- blog section
================================================== -->
<section id="blog" class="parallax-section">
    <div class="container">
        <div class="row">
            <h2>OUR BLOG</h2>
            <?php include_once "search_part_page.php"?>
            <h4>Simple and Powerful tips</h4>
            <div class="blog-masonry masonry-true">
                <?php include_once "ads_part_page.php"?>
            </div>

        </div>
    </div>
</section>
<!-- Adding section-->
<section id="addnewads" class="parallax-section" style="background-color: orange; color: white; padding-bottom: 50px; padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form class="form-horizontal" action="../form_actions/add_advertisment.php" method="post" enctype='multipart/form-data'>
                   <div class="form-group"><h2 class="text-center">Add new advertisement</h2></div>
                    <div class="form-group">
                        <div class="input__wrapper">
                            <input name="picture" type="file" id="input__file" class="input input__file" multiple>
                            <label for="input__file" class="input__file-button">
                                <span class="input__file-icon-wrapper"><img class="input__file-icon" src="../images/add.png" alt="Выбрать файл" width="25"></span>
                                <span class="input__file-button-text">Выберите файл</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="advertismentTitle" type="text" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="info">Information</label>
                        <textarea id="info" name="advertismentText" class="form-control" placeholder="Information"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="id_category" class="form-control mr-sm-2">
                            <option selected>Choose...</option>
                            <?php
                            $categories = (new Categories(DATABASE_CONFIG))->getCategories();
                            foreach ($categories as $category) {
                                echo("<option value='{$category['id_category']}'>{$category['categoryTitle']}</option>");
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-12"  style=" display: flex; justify-content: center" >
                        <button style="background-color: black; color: white; width: 150px; padding: 13px 20px 29px 20px;" type="submit" class="form-control">Add</button>
                    </div>
                </form>
            </div>
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
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/smoothscroll.js"></script>
<script src="../js/jquery.nav.js"></script>
<script src="../js/jquery.parallax.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/isotope.min.js"></script>
<script src="../js/wow.min.js"></script>
<script src="../js/counter.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>

