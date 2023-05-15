<?php
namespace App\Controller;
use App\Controller\UserController;
use App\Model\UserModel;

class AuthController
{
    private UserController $userController;
    private UserModel $userModel;


    public function __construct()
    {
        $this->userController = new UserController();
        $this->userModel = new UserModel();

    }


    public function register($firstName, $lastName, $email, $password, $coPass): void
    {
        $response = [];
        $response['succes'] = false;


        //******* */ validation inputs HTML.
        // *********************************

        $firstName = $this->userController->isValid($firstName);
        $lastName = $this->userController->isValid($lastName);
        $email = $this->userController->isValid($email);
        $password = $this->userController->isValid($password);
        $coPass = $this->userController->isValid($coPass);
        $validCoPass = false;


        //********** validation inputs ***************************
        
        if(!$this->userController->validEmail($email))
        {
            $response['message'] = 'Email invalid !';
        }

        elseif(!$this->userController->validName($firstName))
        {
            $response['message'] = 'First name invalid !';
        }

        elseif(!$this->userController->validName($lastName))
        {
            $response['message'] = 'Last name invalid !';
        }


        elseif(!$this->userController->validPassword($password))
        {
            $response['message'] = 'Password invalid !';
        }

        elseif($password === $coPass)
        {
            $validCoPass = true;

        } else
        {
            $response['message'] = 'Passwords do not match !';
        }

        if (empty($response['message']))
        {

                $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
            
                if(!$this->userModel->checkDB($email)){

                    $this->userModel->register($email, $firstName, $lastName, $password);

                    $_SESSION['user'] = [
                        'email' => $email,
                        'firstName' => $firstName
                    ];

                    $response['success'] = true;
                    $response['message'] = 'Created account !';

                    echo json_encode($response);

                }else
                {
                    $response['message'] = 'Email Unavailable !';

                    echo json_encode($response);
                }
            
        } else
        {
            echo json_encode($response);
        }
    } 


        public function login($email, $password)
        {
            $response = [];
            $response['succes'] = false;
        
            if($data = $this->userModel->checkDB($email))
            {
                $passwordDB = $data['password'];
            
                if (password_verify($password, $passwordDB))
                {
                    $_SESSION['user'] = [
                        'email' => $email,
                        'id' => $data['id'],
                        'firstName' => $data['first_name']
                    
                    ];
                
                    $response['success'] = true;
                    $response['message'] = 'Connected !';
                
                } else
                {
                
                    $response['message'] = 'Incorrect email or password !';
                }
            } else
            {
                $response['message'] = 'Incorrect email or password !';
            
            }
        
            echo json_encode($response);
        }

}