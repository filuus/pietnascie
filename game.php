<?php
session_start();
require_once('obiekty/User.php');
if(isset($_POST['login'])){
        $user = new User;
        $user->login($_POST['login'], $_POST['password']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> Title </title>
<link rel="Stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
        <ul>
                <li><a href="profile.php">Profil</a></li>
                <li><a href="index.php">Wyloguj</a></li>
        </ul>
        <?php echo $_SESSION['user']['login']; ?>
        <input id="losuj" type="button">
        <script src="script/main.js"></script>
</body>
</html>
