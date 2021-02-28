<?php
namespace Ads\Classes;

class User extends Connect
{
    private $userName;
    private $userLastName;
    private $userPassword;
    private $userEmail;
    private $userPhoto;
    private $user_id;

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserLastName()
    {
        return $this->userLastName;
    }

    /**
     * @param mixed $userLastName
     */
    public function setUserLastName($userLastName)
    {
        $this->userLastName = $userLastName;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * @param mixed $userPassword
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserPhoto()
    {
        return $this->userPhoto;
    }

    /**
     * @param mixed $userPhoto
     */
    public function setUserPhoto($userPhoto)
    {
        $this->userPhoto = $userPhoto;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

//Авторизация пользователя
    public function logIn($userEmail, $userPassword)
    {
        $query = $this->pdo->prepare("
        SELECT * FROM Users 
        WHERE userEmail=:userEmail AND userPassword=:userPassword");
        $query->execute([
            'userEmail' => $userEmail,
            'userPassword' => $userPassword,
        ]);
        $user = $query->fetch();
        if(!$user){
            return false;
        }
        else{
            $this->user_id = $user['id_user'];
            $this->userName = $user['userName'];
            $this->userLastName = $user['userLastName'];
            $this->userEmail = $user['userEmail'];
            $this->userPassword = $user['userPassword'];
            $this->userPhoto = $user['userPhoto'];
            return true;
        }

    }
//Регистрация пользователя
    public function signUp()
    {
        $query = $this->pdo->prepare("
        INSERT INTO Users(userName, userLastName, userEmail, userPassword, userPhoto) 
        VALUES(:userName, :userLastName, :userEmail, :userPassword, :userPhoto)");
        return $query->execute([
            'userName' => $this->userName,
            'userLastName' => $this->userLastName,
            'userEmail' => $this->userEmail,
            'userPassword'=>$this->userPassword,
            'userPhoto'=>$this->userPhoto
        ]);
    }

}