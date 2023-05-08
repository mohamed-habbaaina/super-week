<?php
session_start();
use App\Controller\UserController;

require_once('./UserController.php');


$userController = new UserController();

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $userController->isValid($_POST['email']);
    $password = $userController->isValid($_POST['password']);

    if($userController->login($email, $password))
    {
        echo json_encode('Connected !');
    } else
    {
        echo json_encode('Incorrect login or password');
    }


} else
{
    echo json_encode('Please complete all fields !');
}