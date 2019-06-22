<?php
require_once('Database.php');
class User
{
    protected $user_id;
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
        if(isset($_SESSION['user'])) {
            $this->user_id = $_SESSION['user']['user_id'];
            $this->login = $_SESSION['user']['login'];
            $this->email = $_SESSION['user']['email'];
            $this->name = $_SESSION['user']['name'];
            $this->surname = $_SESSION['user']['surname'];
            $this->password = $_SESSION['user']['password'];
        }
    }
    public function __destruct()
    {
        unset($this->conect);
    }
    public function login($login, $password)
    {
        $query = "  SELECT * FROM myusers
                    WHERE
                    login = '$login'";
        $result = mysqli_query($this->conect->getHook(), $query) or die(mysql_error());
        if(mysqli_num_rows($result) > 0) {
            $record = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($login == $record['login'] && $password == $record['password']) {
                $this->user_id = $record['user_id'];
                $this->login = $record['login'];
                $this->email = $record['email'];
                $this->name = $record['name'];
                $this->surname = $record['surname'];
                $this->password = $record['password'];
                $this->createInSession();
            }
            else {
                header("Location: index.php");
            }
        }
        else {
            header("Location: index.php");
        }
        
    }
    public function createInSession()
    {
        $_SESSION['user']['user_id'] = $this->user_id;
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
        $query = "  UPDATE myusers SET
                    login = '$login', email = '$email', name = '$name', surname = '$surname'
                    WHERE
                    user_id = $this->user_id";
        mysqli_query($this->conect->getHook(), $query) or die(mysqli_error($this->conect->getHook()));
    }
    public function logout()
    {
        session_destroy();
    }
}
?>