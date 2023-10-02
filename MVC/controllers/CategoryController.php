<?php
require_once APP_ROOT.'/services/CategoryServices.php';
class CategoryController{
    public function index(){
        $categoryServices = new CategoryServices();
        $categories = $categoryServices->getAllCategory();
        
        include APP_ROOT.'/views/category/index.php';
    }

    public function add(){
        if(isset($_POST['btnAdd'])){
            $categorytName = $_POST['name'];

            $categoryServices = new CategoryServices();
            $categoryServices->addCategory(new Category(null, $categorytName));

        }
        include APP_ROOT.'/views/category/add.php';
    }
    public function edit(){
        $categoryServices = new CategoryServices();
        $category = $categoryServices->getCategory($_GET['id']);

        if(isset($_POST['btnEdit'])){
            $categoryID = $_GET['id'];
            $categoryName = $_POST['name'];

            if($category->getCategoryName() == $categoryName){
                header("location: ". DOMAIN.'/views/index.php?controller=category&action=list&error=edit_category_failed');
            }
            else{
                $category = new Category($categoryID, $categoryName);
                $categoryServices->editCategory($category);
            }
        }
        include APP_ROOT.'/views/category/edit.php';
    }
    
    public function delete(){
        $categoryServices = new CategoryServices();
        $id = $_GET['id'];
        $categoryServices->deleteCategory($id);
        include APP_ROOT.'/views/category/index.php';
    }
}
?>