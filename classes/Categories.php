<?php


namespace Ads\Classes;


class Categories extends Connect
{

    public function getCategories()
    {
        $allCategories = $this->pdo->query("
            SELECT * FROM Category
        ");
        $allCategories->execute();
        return $allCategories->fetchAll();
    }
}

