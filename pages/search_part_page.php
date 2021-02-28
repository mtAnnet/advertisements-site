<?php
use Ads\Classes\Categories;
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/animate.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/owl.theme.css">
<link rel="stylesheet" href="../css/owl.carousel.css">
<link rel="stylesheet" href="../css/style.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

<section id="search" class="parallax-section" style="padding-bottom: 50px; padding-top: 50px;">
    <div class="container">
    <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form action="../form_actions/search.php" method="post">
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Search by category</label>
                        <select name="id_category" class="form-control mr-sm-2" id="inlineFormCustomSelect">
                            <?php
                            $categories = (new Categories(DATABASE_CONFIG))->getCategories();
                            foreach ($categories as $category) {
                                echo("<option value='{$category['id_category']}'>{$category['categoryTitle']}</option>");
                            } ?>
                        </select>
                    </div>
                        <div class="col-md-12"  style=" display: flex; justify-content: center" >
                            <button style="background-color: black; color: white; width: 150px; padding: 13px 20px 29px 20px;" type="submit" class="form-control">Search</button>
                        </div>
                </form>
            </div>
    </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form action="../form_actions/part_title_search.php" method="post">
                <div class="form-group">
                    <label class="mr-sm-2" for="part_title">Search by part of title</label>
                    <input id="part_title" name="part_title" type="text" class="form-control" placeholder="search by part">
                </div>
                    <div class="col-md-12"  style=" display: flex; justify-content: center" >
                        <button style="background-color: black; color: white; width: 150px; padding: 13px 20px 29px 20px;" type="submit" class="form-control">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
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