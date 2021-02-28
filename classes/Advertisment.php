<?php
namespace Ads\Classes;

class Advertisment extends Connect
{
    private $advertismentTitle;
    private $advertismentText;
    private $advertismentPhoto;
    private $id_category;
    private $id_user;
    private $advertismentDateCreate;
    private $id_advertisment;

    /**
     * @return mixed
     */
    public function getAdvertismentTitle()
    {
        return $this->advertismentTitle;
    }

    /**
     * @param mixed $advertismentTitle
     */
    public function setAdvertismentTitle($advertismentTitle)
    {
        $this->advertismentTitle = $advertismentTitle;
    }

    /**
     * @return mixed
     */
    public function getAdvertismentText()
    {
        return $this->advertismentText;
    }

    /**
     * @param mixed $advertismentText
     */
    public function setAdvertismentText($advertismentText)
    {
        $this->advertismentText = $advertismentText;
    }

    /**
     * @return mixed
     */
    public function getAdvertismentPhoto()
    {
        return $this->advertismentPhoto;
    }

    /**
     * @param mixed $advertismentPhoto
     */
    public function setAdvertismentPhoto($advertismentPhoto)
    {
        $this->advertismentPhoto = $advertismentPhoto;
    }

    /**
     * @return mixed
     */
    public function getIdCategory()
    {
        return $this->id_category;
    }

    /**
     * @param mixed $id_category
     */
    public function setIdCategory($id_category)
    {
        $this->id_category = $id_category;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getAdvertismentDateCreate()
    {
        return $this->advertismentDateCreate;
    }

    /**
     * @param mixed $advertismentDateCreate
     */
    public function setAdvertismentDateCreate($advertismentDateCreate)
    {
        $this->advertismentDateCreate = $advertismentDateCreate;
    }

    /**
     * @return mixed
     */
    public function getIdAdvertisment()
    {
        return $this->id_advertisment;
    }

    /**
     * @param mixed $id_advertisment
     */
    public function setIdAdvertisment($id_advertisment)
    {
        $this->id_advertisment = $id_advertisment;
    }


    public function addAdvertisment()
    {
        $query = $this->pdo->prepare("
        INSERT INTO Advertisment(advertismentTitle, advertismentText, advertismentPhoto, id_category, id_user)
        VALUES (:advertismentTitle, :advertismentText, :advertismentPhoto, :id_category, :id_user)
        ");
        return $query->execute([
            'advertismentTitle'=>$this->advertismentTitle,
            'advertismentText'=>$this->advertismentText,
            'advertismentPhoto'=>$this->advertismentPhoto,
            'id_category'=>$this->id_category,
            'id_user'=>$this->id_user
        ]);
    }

    public function getAllAdvertisments() {
        $allAdvertisment = $this->pdo->query("
            SELECT Advertisment.*, Category.categoryTitle
            FROM Advertisment
            LEFT JOIN Category ON Advertisment.id_category = Category.id_category
            ");
        return $allAdvertisment->fetchAll();
    }

    public function searchByCategory($id_category){
        $result = $this->pdo->query("
        SELECT * 
        FROM Advertisment 
        WHERE id_category=$id_category
        ");
        return $result->fetchAll();
    }
    public function searchByPartTitle($part_title){
        $result = $this->pdo->prepare("
        SELECT * 
        FROM Advertisment
        WHERE advertismentTitle LIKE ?
        ");
        $result->execute((array("%$part_title%")));
        return $result->fetchAll();
    }

    public function getAdById($id){
        $result = $this->pdo->query("
        SELECT * 
        FROM Advertisment
        WHERE id_advertisment=$id
        ");
        return $result->fetch();
    }
}
