<?php
class Author{
    private ?int $authorID;
    private string $authorName;
    private string $authorImage;

    public function __construct($id, $name, $image){
        $this->authorID = $id;
        $this->authorName = $name;
        $this->authorImage = $image;
    }

    public function getAuthorID(){
        return $this->authorID;
    }

    public function getAuthorName(){
        return $this->authorName;
    }

    public function getAuthorImage(){
        return $this->authorImage;
    }
}
?>