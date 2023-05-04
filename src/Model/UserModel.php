<?php
namespace App\Model;
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
}