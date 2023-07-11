<?php
require "./controller/UserController.php";


function checkRoute(string $route): void
{
    $userController = new UserController(); //Connecte à la BDD
    
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
        default:
            $userController->indexUser();
            break;
    }
}

?>