<?php 
require "AbstractController.php";
require "./manager/UserManager.php";
require "./models/User.php";

class UserController extends AbstractController {
    private UserManager $manager;
    
    public function __construct()
    {
        $this->manager = new UserManager("komlakplomahodoaziadome_distorsion","3306","db.3wa.io", "komlakplomahodoaziadome","bb1c7420a0b6e4e3c2470bbd9b5a341f");
    }
    public function indexUser()
    {
        $allUsers = $this->manager->getAllUsers();
        $this->render('login', $allUsers);
    }
    public function createUser(array $post = null)
    {
        if(isset($_POST['username'], $_POST['email'], $_POST['password']))
        {
            $user = new User ($_POST['username'], $_POST['email'], $_POST['password']);
            $this->manager->insertUser($user);
            $allUsers = $this->manager->getAllUsers();
            $this->render('login', $allUsers);
        }else{
            $allUsers = $this->manager->getAllUsers();
            $this->render('register', $allUsers);
        }
    }
    public function editUser(array $post = null)
    {
        if(isset($_POST['username'], $_POST['email'], $_POST['password']))
        {
            $user = new User($_SESSION['id'], $_POST['username'], $_POST['email'], $_POST['password']);
            $this->manager->editUser($user);
            $allUsers = $this->manager->getAllUsers();
            $this->render('login', $allUsers);
        } else{
            $allUsers = $this->manager->getAllUsers();
            $this->render('edit_user', $allUsers);
        }
    }
}
?>