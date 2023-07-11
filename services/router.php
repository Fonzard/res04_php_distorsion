<?php
require "./controller/UserController.php";


function checkRoute(string $route): void
{
    $userController = new UserController(); //Connecte à la BDD
    
    switch($route){
        case 'create_user':
            $userController->createUser();
            break;
        case 'edit_user':
            $userController->editUser();
            break;
        case 'login':
            $userController->indexUser();
            break;
        case 'register':
            require'./views/register/register.phtml';
            break;
        default:
            $userController->indexUser();
            break;
    }
}

?>