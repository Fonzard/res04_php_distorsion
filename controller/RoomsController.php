<?php   
require "AbstractController.php";
require "../models/Room.php";
require "../manager/RoomsManager.php";


class RoomController extends AbstractController{
    
    private RoomManager $manager;
    
    public function __construct()
    {
         $this->manager = new UserManager("komlakplomahodoaziadome","3306","db.3wa.io", "bb1c7420a0b6e4e3c2470bbd9b5a341f");
    }
    public function indexRoom()
    {
        $allRooms = $this->manager->getAllRooms();
        $this->render('index_room',$allRooms);
    }
    public function createRoom(array $post = null)
    {
        if(isset($_POST['name'], $_POST['description']))
        {
            $room = new Room ($_SESSION['id'], $_POST['name'], $_POST['description']);
            $this->manager->editRoom($room);
            $allRooms = $this->manager->getAllRooms();
            $this->render('index_room', $allRooms);
        }else {
            $allRooms = his->manager->getAllUsers();
            $this->render('create_room', $allRooms);
        }
    }
    public function editRoom(array $post= null)
    {
         if(isset($_POST['name'], $_POST['description']))
         {
             $room = new Room ($_SESSION['id'], $_POST['name'], $_['description']);
             $this->manager->editRoom($room);
             $allRooms = $this->manager->getAllRooms();
             $this->render('index_room', $allRooms);
         } else{
            $allRooms = $this->manager->getallRooms();
            $this->render('edit_room', $allUsers);
         }
    }
}
?>