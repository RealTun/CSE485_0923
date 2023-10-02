<?php
require_once APP_ROOT.'/services/PostServices.php';
require_once APP_ROOT.'/services/AuthorServices.php';
require_once APP_ROOT.'/services/CategoryServices.php';
class PostController{
    public function index(){
        $postServices = new PostServices();
        $posts = $postServices->getAllPost();
        
        include APP_ROOT.'/views/post/index.php';
    }

    public function add(){
        $authorServices = new AuthorServices();
        $authors = $authorServices->getAllAuthor();

        $categoryServices = new CategoryServices();
        $categories = $categoryServices->getAllCategory();
        if(isset($_POST['btnAdd'])){
            $nameFile = $_FILES['file']['name'];            
            $title = $_POST['title'];
            $song = $_POST['nameSong'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $nameAuthor = $_POST['nameAuthor'];
            $nameCategory = $_POST['nameCategory'];
            
            //
            $author = $authorServices->getAuthorByName($nameAuthor);
            $category = $categoryServices->getCategoryByName($nameCategory);
            $postServices = new PostServices();
            $postServices->addPost(new Post(null, $title, $song, $category->getCategoryID(), $summary, $content, $author->getAuthorID(), null, $nameFile));

        }
        include APP_ROOT.'/views/post/add.php';
    }
    public function edit(){
        $postServices = new PostServices();
        $post = $postServices->getPost($_GET['id']);

        $authorServices = new AuthorServices();
        $authors = $authorServices->getAllAuthor();
        $author = $authorServices->getAuthor($post->getAuthorID());

        $categoryServices = new CategoryServices();
        $categories = $categoryServices->getAllCategory();
        $category = $categoryServices->getCategory($post->getCategoryID());

        if(isset($_POST['btnEdit'])){
            $postID = $_GET['id'];
            $nameFile = $_FILES['file']['name'];            
            $title = $_POST['title'];
            $song = $_POST['nameSong'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $nameAuthor = $_POST['nameAuthor'];
            $nameCategory = $_POST['nameCategory'];
            //
            $author = $authorServices->getAuthorByName($nameAuthor);
            $category = $categoryServices->getCategoryByName($nameCategory);
            if($post->getNameSong() == $song){
                header("location: ". DOMAIN.'/views/index.php?controller=post&action=list&error=edit_post_failed');
            }
            else{
                $postServices->editPost(new Post($postID, $title, $song, $category->getCategoryID(), $summary, $content, $author->getAuthorID(), null, $nameFile));     
            }
        }
        include APP_ROOT.'/views/post/edit.php';
    }
    
    public function delete(){
        $postServices = new PostServices();
        $id = $_GET['id'];
        $postServices->deletePost($id);
        include APP_ROOT.'/views/post/index.php';
    }
}
?>