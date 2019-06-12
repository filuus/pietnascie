<?php
class User
{
    protected $id_user;
    protected $login;
    protected $email;
    protected $name;
    protected $surname;
    protected $password;
    function login($login, $password)
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
    function createInSession()
    {
        $_SESSION['user']['id_user'] = $this->id_user;
        $_SESSION['user']['login'] = $this->login;
        $_SESSION['user']['email'] = $this->email;
        $_SESSION['user']['name'] = $this->name;
        $_SESSION['user']['surname'] = $this->surname;
        $_SESSION['user']['password'] = $this->password;
    }
}
?>