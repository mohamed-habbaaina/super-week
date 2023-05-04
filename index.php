<?php
require_once('./vendor/autoload.php');

use App\Controller\User;

$router = new AltoRouter();

$router->setBasePath('/super-week');

$router->map('GET', '/', function(){
    echo 'Hello Word';
});

$router->map('GET', '/users', function(){
    echo "<h1>Titre</h1>";
});


$match = $router->match();
var_dump(is_callable($match['target']));
if(is_array($match) && is_callable($match['target']))
{
    call_user_func_array($match['target'], $match['params']);
} else
{
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

// echo '<pre>';
// var_dump($router);
// echo '</pre>';
// $user = new User();