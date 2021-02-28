<?php
session_start();
require_once '../autoloader.php';
use Ads\Classes\Advertisment;
include_once '../config/config.php';
var_dump($_SESSION['user_info']['user_id']);

if(!isset($_POST['advertismentTitle']) || !isset($_POST['advertismentText']) || !isset($_POST['id_category'])){
    echo 'Error';
}
else{
$uploaddir = '/var/www/ads.local/uploads/';
if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploaddir .
    $_FILES['picture']['name'])) {

    print "File is valid, and was successfully uploaded.";
} else {
    print "There some errors!";
}
$uploadfile = "/uploads/" . basename($_FILES['picture']['name']);

    $new_ad = new Advertisment(DATABASE_CONFIG);
    $new_ad->setAdvertismentPhoto($uploadfile);
    $new_ad->setAdvertismentTitle($_POST['advertismentTitle']);
    $new_ad->setAdvertismentText($_POST['advertismentText']);
    $new_ad->setIdCategory($_POST['id_category']);
    $new_ad->setIdUser($_SESSION['user_info']['user_id']);
    $result = $new_ad->addAdvertisment();
    if($result){
        header('Location: ' .$_SERVER["HTTP_REFERER"]);
    }
    else{
        echo 'Error2';
    }
}
