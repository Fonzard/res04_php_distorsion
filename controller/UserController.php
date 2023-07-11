<?php 

class UserController extends AbstractController {
    private UserManager $manager;
    
    public function __construct()
    {
        $this->manager = new UserManager("komlakplomahodoaziadome","3306","db.3wa.io", "bb1c7420a0b6e4e3c2470bbd9b5a341f");
    }
    public function index()
    {
        
    }
    public function create(array $post = null)
    {
        
    }
    public function edit(array $post = null)
    {
        
    }
}
?>