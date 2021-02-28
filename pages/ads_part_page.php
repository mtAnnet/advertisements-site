<?php
use Carbon\Carbon;
foreach ($allAds as $ad) {
?>
<div class="post-masonry col-md-4 col-sm-6 wow fadeInUp">
    <div class="blog-wrapper">
        <form action="../form_actions/save.php" method="post">
        <img src="<?php echo $ad['advertismentPhoto']?>" class="img-responsive" alt="blog img">
        <h3><a href="#"><?= mb_strtoupper($ad["advertismentTitle"])?></a></h3>
        <small><?=Carbon::now()->diffInDays(Carbon::parse($ad['advertismentDateCreate']));?> days left</small>
        <p><?= mb_strimwidth($ad["advertismentText"] , 0, 500, "...")?></p>
        <button style="color: white; background-color: black" class="btn btn-default smoothScroll wow fadeInUp" data-wow-delay="0.6s" type="submit" name="download" value="<?= $ad['id_advertisment']?>" >Download</button>
        </form>
    </div>
</div>

<?php
}
?>