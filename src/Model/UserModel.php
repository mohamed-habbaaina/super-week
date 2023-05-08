<?php
namespace App\Model;
require_once('DbConnect.php');

use App\Model\DbConnect;

class UserModel
{
    public function __construct()
    {

    }

    public function findAll(): array
    {
        $req = 'SELECT * FROM user';
        $dataAllUsers = DbConnect::getDb()->prepare($req);
        $dataAllUsers->execute();
        return $dataAllUsers->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Check database where email.
    public function checkDB($email): array | false
    {
        $reqCheck = "SELECT * FROM `user` WHERE email=:email LIMIT 1";
        $data = DbConnect::getDb()->prepare($reqCheck);
        $data->bindParam(':email', $email);
        $data->execute();
        return $data->fetch(\PDO::FETCH_ASSOC) ?? false;

    }

    public function register($email, $firstName, $lastName, $password): void
    {
        $reqInser = 'INSERT INTO `user`(`email`, `first_name`, `last_name`, `password`) VALUES (:email, :first_name, :last_name, :password)';
        $creatUser = DbConnect::getDb()->prepare($reqInser);
        $creatUser->bindParam(':email', $email);
        $creatUser->bindParam(':first_name', $firstName);
        $creatUser->bindParam(':last_name', $lastName);
        $creatUser->bindParam(':password', $password);
        $creatUser->execute();
    }


}