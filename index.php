<?php
session_start();
require "controller/AbstractController.php";
require "manager/AbstractManager.php";
require "services/router.php";

if(isset($_GET['id']))
{
    $_SESSION['id'] = $_GET['id'];
}


if(isset($_GET["route"]))
{
    checkRoute($_GET["route"]);
}
else
{
    checkRoute("");    
}    
?>