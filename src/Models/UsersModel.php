<?php

namespace App\Models;
use App\DB\ConnectionDB;

class UsersModel extends ConnectionDB
{
    public function __construct(
        private string $login,
        private string $password
    ){
        $this->login = trim($login);
        $this->password = trim($password);
    }
    public function selectAllUsers()
    {
        $sql = "SELECT * FROM users;";
        return (new ConnectionDB())->query($sql);
    }

    public function loginVerification()
    {
        $sql = "SELECT * FROM users WHERE login='$this->login';";
        return $this->connection()->query($sql);
    }

    public function countLogin()
    {
        $sql = "SELECT COUNT(*) AS count FROM users WHERE 'login'='user1';";
        
        $result = $this->connection()->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];


        // $sql = "SELECT COUNT(*) AS count FROM users WHERE 'login'='user1'";
        // $result = (new ConnectionDB())->connection()->query($sql);
        // $row = $result->fetch_assoc();
        // return $row['count'];
        //$result = mysql_query($sql, (new ConnectionDB()));
    }
    public function addUser()
    {
        $sql = "INSERT INTO users (login, password) VALUES('$this->login','$this->password');";
        return (new ConnectionDB())->connection()->query($sql);
    }


}