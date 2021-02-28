<?php
session_start();
require_once  '../config/config.php';
require_once  '../helpers/database_connection.php';
require_once '../autoloader.php';
use Ads\Classes\Advertisment;

if (!isset($_POST['part_title'])) {
    if (!empty($_SESSION['ads'])){
        unset($_SESSION['ads']);
    }
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
else {
    //поиск по части темы
     unset($_SESSION['ads']);
     $search_result = new Advertisment(DATABASE_CONFIG);
     $_SESSION['ads'] = $search_result->searchByPartTitle($_POST['part_title']);
     header("Location: {$_SERVER['HTTP_REFERER']}");
}


