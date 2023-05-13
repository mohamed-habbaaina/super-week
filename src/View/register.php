<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./src/View/js/register.js"></script>
    <title>Register | super-week</title>
</head>
<body>
    <main>
        <div class="messageErr"></div>
        <form action="" method="post" id="formRegister">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Entrer Votre Email">
            <small></small>

            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" placeholder="Entrer Votre nom">

            <label for="last_name">Nom</label>
            <input type="text" name="last_name" placeholder="Entrer Votre prénom">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Entrer Votre password">
            <small></small>

            <label for="c_pass">Confirme Password</label>
            <input type="password" name="c_pass" placeholder="Confermer Votre password">
            <small></small>

            <input type="submit" value="Valid">

        </form>
    </main>
    
</body>
</html>