<?php
require_once APP_ROOT.'/services/AuthorServices.php';
class AuthorController{
    public function index(){
        $authorServices = new AuthorServices();
        $authors = $authorServices->getAllAuthor();
        
        include APP_ROOT.'/views/author/index.php';
    }

    public function add(){
        if(isset($_POST['btnAdd'])){
            $authorName = $_POST['name'];
            $authorImage = $_FILES['file']['name'];

            $authorServices = new AuthorServices();
            $authorServices->addAuthor(new Author(null, $authorName, $authorImage));

        }
        include APP_ROOT.'/views/author/add.php';
    }
    public function edit(){
        $authorServices = new AuthorServices();
        $author = $authorServices->getAuthor($_GET['id']);

        if(isset($_POST['btnEdit'])){
            $authorID = $_GET['id'];
            $authorName = $_POST['name'];
            $authorImage = $_FILES['file']['name'];
            if($author->getAuthorName() == $authorName){
                header("location: ". DOMAIN.'/views/index.php?controller=author&action=list&error=edit_author_failed');
            }
            else{
                $author = new Author($authorID, $authorName, $authorImage);
                $authorServices->editAuthor($author);
            }
        }
        include APP_ROOT.'/views/author/edit.php';
    }
    
    public function delete(){
        $authorServices = new AuthorServices();
        $id = $_GET['id'];
        $authorServices->deleteAuthor($id);
        include APP_ROOT.'/views/author/index.php';
    }
}
?>