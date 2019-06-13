<?php
require_once('Database.php');
class User
{
    protected $id_user;
    protected $login;
    protected $email;
    protected $name;
    protected $surname;
    protected $password;
    protected $conect;
    public function __construct()
    {
        $this->conect = new Database;
        $this->conect->conect();
    }
    public function __destruct()
    {
        unset($this->conect);
    }
    public function login($login, $password)
    {
        if($login == 'admin' && $password == 'admin') {
            $this->id_user = 1;
            $this->login = 'admin';
            $this->email = 'admin@admin.pl';
            $this->name = 'Jan';
            $this->surname = 'Kowalski';
            $this->password = 'admin';
            $this->createInSession();
        }
    }
    public function createInSession()
    {
        $_SESSION['user']['id_user'] = $this->id_user;
        $_SESSION['user']['login'] = $this->login;
        $_SESSION['user']['email'] = $this->email;
        $_SESSION['user']['name'] = $this->name;
        $_SESSION['user']['surname'] = $this->surname;
        $_SESSION['user']['password'] = $this->password;
    }
    public function createUser($login, $password, $email, $name, $surname)
    {
        $data = "INSERT INTO myusers (login, password, email, name, surname)
        VALUES ('$login', '$password', '$email', '$name', '$surname')";
        mysqli_query($this->conect->getHook(), $data) or die(mysqli_error($this->conect->getHook()));
    }
    public function updateUser($login, $email, $name, $surname)
    {
        $id_user = $_SESSION['user']['id_user'];
        $query = "  UPDATE myusers SET
                    login = '$login', email = '$email', name = '$name', surname = '$surname'
                    WHERE
                    id_user = $id_user";
        mysqli_query($this->conect->getHook(), $query) or die(mysqli_error($this->conect->getHook()));
    }
}
?>