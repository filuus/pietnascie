<?php
    require_once('obiekty/User.php');
    if(isset($_POST['login'])){
        $user = new User;
        $user->createUser($_POST['login'], $_POST['password'], $_POST['email'], $_POST['name'], $_POST['surname']);
        echo "zostałeś poprawnie zarejestrowany";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Strona logowania</title>
</head>
<body>
    <form action="game.php" method="post">
        <label for="login">Login</label>
        <input type="text" id="login" name="login">
        <label for="password">Hasło</label>
        <input type="text" id="password" name="password">
        <input type="submit" value="Zaloguj">
    </form>
    <a href="registration.php">Zarejestruj się</a>
</body>
</html>