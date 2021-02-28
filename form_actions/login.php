<?php
    session_start();
    unset($_SESSION['ads']);
    include_once '../config/config.php';
    include_once '../helpers/database_connection.php';
    include_once '../autoloader.php';
    use Ads\Classes\User;

    if (!isset($_POST['userEmail']) || !isset($_POST['userPassword'])) {
        header('Location: /');
    }
    $user = new User(DATABASE_CONFIG);
    $login_user = $user->logIn($_POST['userEmail'],$_POST['userPassword']);

    if($login_user){
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
