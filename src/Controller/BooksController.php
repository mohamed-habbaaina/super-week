<?php
namespace App\Controller;
use App\Model\BooksModel;


class BooksController{

    private BooksModel $booksModel;
    public function __construct()
    {
        $this->booksModel = new BooksModel();
    }

    public function getAllBooks(): string
    {
        $books = $this->booksModel->findAllBooks();
        return json_encode($books);
    }


}