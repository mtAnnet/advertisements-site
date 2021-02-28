<?php
include_once '../config/config.php';
include_once '../helpers/database_connection.php';
include_once '../autoloader.php';
use Ads\Classes\Advertisment;
$id_ad = $_POST['download'];
$saveAd = new Advertisment(DATABASE_CONFIG);
$advertisment = $saveAd->getAdById($id_ad);
$filed = $advertisment['advertismentTitle'].'.txt';
$rez = $advertisment['advertismentTitle'].PHP_EOL.$advertisment['advertismentText'];
$filepath = $_SERVER['DOCUMENT_ROOT']."/file_for_download/{$filed}";
$pathToDownload = "/file_for_download/{$filed}";
file_put_contents($filepath, $rez);
echo "<a style='visibility: hidden' id='linkToDownload' download href='$pathToDownload'>Download</a>";
?>

<script>
    window.onload = function() {
        document.getElementById('linkToDownload').click();
        window.history.back();
    };
</script>
