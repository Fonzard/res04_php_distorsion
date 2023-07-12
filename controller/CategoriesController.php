<?php 
require "AbstractController.php";
require "./manager/CategoriesManager.php";
require "./models/Category.php";
class CategorieController extends AbstractController {
    private CategoriesManager $manager;
    
    public function __construct()
    {
        $this->manager = new CategoriesManager("komlakplomahodoaziadome_distorsion","3306","db.3wa.io", "komlakplomahodoaziadome","bb1c7420a0b6e4e3c2470bbd9b5a341f");
    }
    public function indexCategory()
    {
        $allCategories = $this->manager->getAllCategories();
        $this->render('./views/login/login.phtml', $allCategories);
    }
    public function createCategory(array $post = null)
    {
        if(isset($_POST['name'], $_POST['description']))
        {
            $categorie = new Category ($_POST['name'], $_POST['description']);
            $this->manager->insertCategory($categorie);
            $allcategories = $this->manager->getAllCategories();
            $this->render('index_category', $allCategories);
        }else{
            $allCategories = $this->manager->getAllCategories();
            $this->render('create_category', $allCategorie);
        }
    }
    public function editCategory(array $post = null)
    {
        if(isset($_POST['name'], $_POST['description']))
        {
            $categorie = new Category($_SESSION['id'], $_POST['name'], $_POST['description']);
            $this->manager->editCategory($categorie);
            $allCategories = $this->manager->getAllCategories();
            $this->render('index_category', $allCategories);
        } else{
            $allCategories = $this->manager->getAllCategories();
            $this->render('edit_category', $allCategories);
        }
    }
}
?>
CategoriesController_1.php
2 Ko