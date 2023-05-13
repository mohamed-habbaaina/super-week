<?php
require_once('./vendor/autoload.php');

$router = new AltoRouter();

$router->setBasePath('/super-week');

use App\Controller\UserController;
use App\Controller\BooksController;
use App\Controller\AuthController;

$router->map('GET', '/', function(){
    // echo 'Hello Word';
    require_once __DIR__ . '/src/View/home.php';
});

$router->map('GET', '/users', function(){
    echo "<h1>Users</h1>";

    // $user = new UserController;
    // echo $user->list();
    require (__DIR__ . '/src/View/users.php');
});

$router->map('GET', '/users/json', function(){

    $user = new UserController;
    echo $user->list();
    // require (__DIR__ . '/src/View/users.php');
});

$router->map('GET', '/register', function(){
    
    require (__DIR__ . '/src/View/register.php');
});

$router->map('POST', '/register', function(){

    
    $authController = new AuthController();
    $authController->register($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['c_pass']);
    
});


$router->map('GET', '/login', function(){

    echo 'login  !!';

    // $authController = new AuthController();
    // if(isset($_POST['email'])){

    //     $authController->register($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['c_pass']);
    // }

});

$router->map('GET', '/users/[i:id]', function($id){
    $user = new UserController;
    echo $user->getUser($id);
});

$router->map('GET', '/books', function(){
    require (__DIR__ . '/src/View/books.php');
});

$router->map('GET', '/books/json', function(){
    $booksController = new BooksController();
    echo $booksController->getAllBooks();
});


$router->map('GET', '/books/[i:id]', function($id){
    $user = new UserController;
    echo $user->getBook($id);
});



$match = $router->match();
// var_dump(is_callable($match['target']));
if(is_array($match) && is_callable($match['target']))
{
    call_user_func_array($match['target'], $match['params']);
} else
{
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

// $faker = Faker\Factory::create();

// for($i=0; $i<20; $i++)
// {
//     $email = $faker->email();
//     $firstName =  $faker->firstName();
//     $lastName =  $faker->lastName();

//     $req = 'INSERT INTO `user`(`email`, `first_name`, `last_name`) VALUES (:email, :first_name, :last_name)';
//     $reqInsert = DbConnect::getDb()->prepare($req);
//     $reqInsert->bindParam(':email', $email);
//     $reqInsert->bindParam(':first_name', $firsName);
//     $reqInsert->bindParam(':last_name', $lastName);
//     $reqInsert->execute();
// }

// echo $faker->lastName();
// echo '<pre>';
// var_dump($router);
// echo '</pre>';
// $user = new User();