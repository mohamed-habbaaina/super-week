<?php
require_once('./vendor/autoload.php');

use App\Controller\UserController;
use App\Model\DbConnect;

$router = new AltoRouter();

$router->setBasePath('/super-week');

$router->map('GET', '/', function(){
    // echo 'Hello Word';
    require_once __DIR__ . '/src/View/home.php';
});

$router->map('GET', '/users', function(){
    echo "<h1>Users</h1>";

    $user = new UserController;
    echo $user->list();
});

$router->map('GET', '/register', function(){
    
    require (__DIR__ . '/src/View/register.php');
});

$router->map('GET', '/login', function(){
    
    require (__DIR__ . '/src/View/login.php');
});

$router->map('GET', '/users/[i:id]', function($id){
    $user = new UserController;
    echo $user->getUser($id);
});

$router->map('GET', '/books', function(){
    $user = new UserController;
    echo $user->getAllBooks();
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