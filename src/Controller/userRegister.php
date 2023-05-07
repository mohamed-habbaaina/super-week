<?php
session_start();
use App\Controller\UserController;
require_once('./UserController.php');

$userController = new UserController();
// var_dump($userController);

if (isset($_POST['email'])){

    //******* */ validation inputs HTML.
    // *********************************

    $firstName = $userController->isValid($_POST['first_name']);
    $lastName = $userController->isValid($_POST['last_name']);
    $email = $userController->isValid($_POST['email']);
    $password = $userController->isValid($_POST['password']);
    $coPass = $userController->isValid($_POST['c_pass']);
    $validCoPass = false;


    //********** validation inputs ***************************
    
    if(!$userController->validName($firstName))
    {
        echo json_encode('First name invalid !');
    }

    if(!$userController->validName($lastName))
    {
        echo json_encode('Last name invalid !');
    }

    if(!$userController->validEmail($email))
    {
        echo json_encode('Email invalid !');
    }

    if(!$userController->validPassword($password))
    {
        echo json_encode('Password invalid !');
    }

    if($password === $coPass)
    {
        $validCoPass = true;
    } else
    {
        echo json_encode('Same Password !');
    }

    if(
        isset($_POST['first_name'])
        && isset($_POST['last_name'])
        && isset($_POST['email'])
        && isset($_POST['password'])
        && isset($_POST['c_pass'])
        && $userController->validName($firstName)
        && $userController->validName($lastName)
        && $userController->validEmail($email)
        && $userController->validPassword($password)
        && $validCoPass
    )
    {
        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
    
        if($userController->registerUser($email, $firstName, $lastName, $password))
        {
            $_SESSION['user'] = [
                'email' => $email,
                'firstName' => $firstName
            ];
            echo json_encode('Created account !');
        }
        else
        {
            echo json_encode('Email Unavailable !');
        }
    }
}else
{
    echo json_encode('Please complete all fields !');
}