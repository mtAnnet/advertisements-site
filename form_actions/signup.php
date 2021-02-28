<?php
session_start();
unset($_SESSION['ads']);
require_once '../autoloader.php';
include_once '../config/config.php';
include_once '../helpers/database_connection.php';
use Ads\Classes\User;

if (!isset($_POST['userEmail']) || !isset($_POST['userPassword']) || !isset($_POST['userName']) || !isset($_POST['userLastName'])) {
    header('Location: /');
}

$uploaddir = '/var/www/ads.local/uploads/';
if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploaddir .
    $_FILES['picture']['name'])) {

    print "File is valid, and was successfully uploaded.";
} else {
    print "There some errors!";
}
$uploadfile = "/uploads/" . basename($_FILES['picture']['name']);

$user = new User(DATABASE_CONFIG);
$user->setUserPhoto($uploadfile);
$user->setUserName($_POST['userName']);
$user->setUserLastName($_POST['userLastName']);
$user->setUserEmail($_POST['userEmail']);
$user->setUserPassword($_POST['userPassword']);

if ($user->signUp()) {
    $_SESSION['user_info'] = [
        'user_id'=>$user->getUserId(),
        'userEmail'=>$user->getUserEmail(),
        'userPhoto'=>$user->getUserPhoto(),
        'userName'=>$user->getUserName(),
        'userLastName'=>$user->getUserLastName()
    ];
    header("Location: ../pages/users_page.php");
}
else{
    header("Location: /");
}

