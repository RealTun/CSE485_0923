<?php
class Category{
    private $categoryID;
    private $categoryName;
    public function __construct($id, $name){
        $this->categoryID = $id;
        $this->categoryName = $name;
    }
    public function getCategoryID(){
        return $this->categoryID;
    }
    public function getCategoryName(){
        return $this->categoryName;
    }
}
?>