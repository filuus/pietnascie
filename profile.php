<?php
    session_start();
    if(isset($_POST['login'])) {
        $user = new User;
        $user->updateUser($_POST['login'], $_POST['email'], $_POST['name'], $_POST['surname']);
        echo "Dane zmienione pomyślnie";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="profile.php">
        <label for="email">Adres email</label>
        <input type="text" id="eamil" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
        <label for="login">Login</label>
        <input type="text" id="login" name="login" value="<?php echo $_SESSION['user']['login'] ?>">
        <label for="name">Imię</label>
        <input type="text" id="name" name="name"  value="<?php echo $_SESSION['user']['name'] ?>">
        <label for="surname">Nazwisko</label>
        <input type="text" id="surname" name="surname"  value="<?php echo $_SESSION['user']['surname'] ?>">
        <input type="submit" value="Zapisz">
    </form>
    <form action="profile.php">
        <label for="password">Hasło</label>
        <input type="password" id="password" name="password">
        <label for="confirm_password">Powtórz hasło</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <input type="submit" value="Zapisz">
    </form>
</body>
</html>