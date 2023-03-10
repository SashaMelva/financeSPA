<?php

namespace App\Models;
use App\DB\Connection;

class UsersModel
{
    public function __construct(
        private string $login,
        private string $password,
    ){
        $this->login = trim($login);
        $this->password = trim($password);
    }
    public function selectAllUsers()
    {
        $sql = "SELECT * FROM users";
        return mysqli_query((new Connection())->connection(), $sql);
    }

    public function loginVerification()
    {
        $sql = "SELECT * FROM users WHERE login = '$this->login'";
        return mysqli_query((new Connection())->connection(), $sql);
    }
    public function addUser()
    {
        $sql = "INSERT INTO users (login, password) VALUES('$this->login','$this->password')";
        return mysqli_query((new Connection())->connection(), $sql);
    }


}