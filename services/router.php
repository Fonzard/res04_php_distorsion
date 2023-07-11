<?php
require "./controller/UserController.php";
require "./controller/RoomsController.php";


function checkRoute(string $route): void
{
    $userController = new UserController(); //Connecte à la BDD
    $roomController = new RoomController();
    
    switch($route){
        case 'edit_user':
            $userController->editUser();
            break;
        case 'login':
            $userController->indexUser();
            break;
        case 'register':
             $userController->createUser();
            break;
        case 'index_room':
            $roomController->indexRoom();
            break;
        case'create_room':
            $roomController->createRoom();
            break;
        case'edit_room':
            $roomController->editRoom();
            break;
        default:
            $userController->indexUser();
            break;
    }
}
?>