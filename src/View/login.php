<?php
// session_start();
if(isset($_SESSION['user']))
{
    $email = $_SESSION['user']['email'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./src/View/js/login.js"></script>
    <title>Login | super-week</title>
</head>
<body>
    <main>
        <div class="messageErr"></div>

        <h1>Login</h1>
        
        <form action="" id="formLogin">

            <label for="email">Email</label>
            <input type="email" name="email" 
            <?php
            if(isset($email))
            {
                echo 'value="' .$email . '">';
                } else
                {?>
            placeholder="Entrer Votre Email"><?php } ?>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Entrer Votre password">

            <input type="submit" value="Login">

        </form>
    </main>
</body>
</html>