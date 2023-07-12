<?php   
require "./models/Room.php";
require "./manager/RoomsManager.php";

class RoomController extends AbstractController{
    
    private RoomManager $manager;
    
    public function __construct()
    {
         $this->manager = new RoomManager("komlakplomahodoaziadome_distorsion","3306","db.3wa.io", "komlakplomahodoaziadome", "bb1c7420a0b6e4e3c2470bbd9b5a341f");
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
            $room = new Room ($_POST['name'], $_POST['description']);
            $this->manager->insertRoom($room);
            $allRooms = $this->manager->getAllRooms();
            $this->render('index_room', $allRooms);
        }else {
            $allRooms = $this->manager->getAllRooms();
            $this->render('create_room', $allRooms);
        }
    }
    public function editRoom(array $post= null)
    {
         if(isset($_POST['name'], $_POST['description']))
         {
             $room = new Room ($_SESSION['id'], $_POST['name'], $_['description']);
             $this->manager->editRoom($room);
             $editedRooms = $this->manager->getRoomsById();
             $this->render('edit_room', $editedRooms);
         } else{
            $allRooms = $this->manager->getallRooms();
            $this->render('index_room', $allUsers);
         }
    }
}
?>