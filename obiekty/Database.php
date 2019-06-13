<?php
class Database
{
    protected $hook;
    public function conect()
    {
        $this->hook = mysqli_connect('localhost', 'root', '', 'pietnascie') or die(mysqli_connect_errno());
        mysqli_set_charset($this->hook, 'utf8') or die(mysqli_error($this->hook));
    }
    public function __destruct()
    {
        mysqli_close($this->hook);
    }
    public function getHook()
    {
        return $this->hook;
    }
}
?>