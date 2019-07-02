<?php
require_once('Database.php');
class Game
{
    protected $conect;
    public function __construct()
    {
        $this->conect = New Database;
        $this->conect->conect();
    }
    public function save($number_of_shift, $time)
    {
        $user_id = $_SESSION['user']['user_id'];
        $data = date("Y.m.d");
        $query =    "INSERT INTO mygames (id_user, number_of_shift, time, data)
                    VALUES ('$user_id', '$number_of_shift', '$time', '$data')";
        mysqli_query($this->conect->getHook(), $query) or die(mysqli_error($this->conect->getHook()));
    }
}
?>