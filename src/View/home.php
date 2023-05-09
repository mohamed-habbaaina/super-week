<?php
$idUser = isset($_GET['idUser']) ?  $_GET['idUser']: 1;
$idBook = isset($_GET['idBook']) ?  $_GET['idBook']: 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./src/View/js/user.js"></script>
    <title>Home | super-week</title>
</head>
<body>
    <main>
        <ul>
            <li><button><a href="./users">Users</a></button></li>
            <li><button><a href="./books">Books</a></button></li>
            <li>
                <form action="./src/View/js/user.js" id="formUser">
                    <input type="number" name="user">
                    <input type="submit" value="User">
                </form>
            </li>
            <li>
                <form action="./src/View/js/user.js" id="formBook">
                    <input type="number" name="book">
                    <input type="submit" value="Book">
                </form>
            </li>
        </ul>
        
        

    </main>
</body>
</html>