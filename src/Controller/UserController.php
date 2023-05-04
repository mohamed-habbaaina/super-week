<?php
namespace App\Controller;
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

}