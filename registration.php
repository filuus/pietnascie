<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rejestracja</title>
</head>
<body>
<form action="index.php" method="post">
        <label for="email">Adres email</label>
        <input type="text" id="eamil" name="email">
        <label for="login">Login</label>
        <input type="text" id="login" name="login">
        <label for="name">Imię</label>
        <input type="text" id="name" name="name">
        <label for="surname">Nazwisko</label>
        <input type="text" id="surname" name="surname">
        <label for="password">Hasło</label>
        <input type="password" id="password" name="password">
        <label for="confirm_password">Powtórz hasło</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <input type="submit" value="Zarejestruj się">
    </form>
    <a href="index.php">Zaloguj się</a>
</body>
</html>