<?php

namespace App\Model;
use App\Model\DbConnect;

class BooksModel
{

    public function findAllBooks(): array
    {
        $reqbooks = 'SELECT book.*, user.first_name, user.last_name 
        FROM book INNER JOIN user 
        ON book.id_user = user.id';
        $dataBooks = DbConnect::getDb()->prepare($reqbooks);
        $dataBooks->execute();
        return $dataBooks->fetchAll(\PDO::FETCH_ASSOC);
    }

}