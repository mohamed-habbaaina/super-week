<?php
namespace App\Controller;
use App\Model\UserModel;
// require_once('../Model/UserModel.php');

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

    // Check if email is available.
    public function registerUser($email, $firstName, $lastName, $password): bool
    {
        if(!$this->user->checkDB($email))
        {
            $this->user->register($email, $firstName, $lastName, $password);
            return true;
        } else
        {
            return false;
        }
    }

    public function registerByPOST()
    {
        if (isset($_POST['email'])){

            //******* */ validation inputs HTML.
            // *********************************
        
            $firstName = $this->isValid($_POST['first_name']);
            $lastName = $this->isValid($_POST['last_name']);
            $email = $this->isValid($_POST['email']);
            $password = $this->isValid($_POST['password']);
            $coPass = $this->isValid($_POST['c_pass']);
            $validCoPass = false;
        
        
            //********** validation inputs ***************************
            
            if(!$this->validName($firstName))
            {
                echo json_encode('First name invalid !');
            }
        
            if(!$this->validName($lastName))
            {
                echo json_encode('Last name invalid !');
            }
        
            if(!$this->validEmail($email))
            {
                echo json_encode('Email invalid !');
            }
        
            if(!$this->validPassword($password))
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
                && $this->validName($firstName)
                && $this->validName($lastName)
                && $this->validEmail($email)
                && $this->validPassword($password)
                && $validCoPass
            )
            {
                $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
            
                if($this->registerUser($email, $firstName, $lastName, $password))
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
    }

    public function login($email, $password)
    {
        if($data = $this->user->checkDB($email))
        {
            $passwordDB = $data['password'];

            if (password_verify($password, $passwordDB))
            {
                return true;
            } else
            {
                return false;
            }
        }
        return false;
    }

    public function getUser(int $id): string | false
    {
        if($dataUser = $this->user->findUser($id))
        {
            return json_encode($dataUser);
        }
        return false;
    }


    public function getBook(int $id): string | false
    {
        if($dataBook = $this->user->findBook($id))
        {
            return json_encode($dataBook);
        }
        return false;
    }


}