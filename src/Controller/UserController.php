<?php
namespace App\Controller;
require_once('./../Model/UserModel.php');

use App\Model\UserModel;
class UserController
{

    private  $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function list(): string
    {
        $data = $this->user->findAll();
        return json_encode($data);
    }

    public function isValid(string $input): string
    {

        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = strip_tags($input);

        return $input;
    }
    // validate name: alphabetical letter, lower case, upper case, special letter (ç,é,,etc) and space.
    public function validName(string $input): bool
    {
        $regexName = '/^[a-zA-ZÀ-ÿ\s]+$/';
        
        if (preg_match($regexName, $input))
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function validEmail(string $email): bool
    {
        $regExpEmail = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-z]{2,5})$/'; 

        if(preg_match($regExpEmail, $email))
        {
            return true;
        } else
        {
            return false; 
        }
    }

    // regExp valid Password: strlen >4, accept only [A-Za-z0-9] && minimum 1 lower case 1 upper case 1 number.
    public function validPassword(string $password): bool
    {
        $regExpPass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{4,}$/';

        if(preg_match($regExpPass,$password))
        {
            return true;
        } else
        {
            return false;
        }
    }

}