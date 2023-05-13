<?php
// $idUser = isset($_GET['idUser']) ?  $_GET['idUser']: 1;
// $idBook = isset($_GET['idBook']) ?  $_GET['idBook']: 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/View/style/style.css">
    <script defer src="./src/View/js/user.js"></script>
    <title>Home | super-week</title>
</head>
<body>
    <header>
        <ul>
            <li><button class="btn"><a href="./register">Register</a></button></li>
            <li><button class="btn"><a href="./login">Login</a></button></li>
        </ul>
    </header>
    <main>
        <ul>
            <li><button class="btn"><a href="./users">Users</a></button></li>
            <li><button class="btn"><a href="./books">Books</a></button></li>
            <li>
                <form action="./src/View/js/user.js" id="formUser">
                    <input type="number" name="user">
                    <input class="btn" type="submit" value="User">
                </form>
            </li>
            <li>
                <form action="./src/View/js/user.js" id="formBook">
                    <input type="number" name="book">
                    <input class="btn" type="submit" value="Book">
                </form>
            </li>
        </ul>
        
        

    </main>
</body>
</html>