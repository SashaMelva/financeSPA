<?php

namespace App\Models;

class UsersModel
{
    public function __construct(
        private string $login,
        private ?string $password,
        public \mysqli $mysqli
    )
    {
    }

//    public function selectAllUsers()
//    {
//        $sql = "SELECT * FROM users;";
//        return $this->mysqli->query($sql);
//    }

    public function loginVerification(): array
    {
        $sql = "SELECT * FROM users WHERE login='$this->login';";
        $result = $this->mysqli->query($sql);

        $userAsArray = mysqli_fetch_assoc($result);

        if (is_null($userAsArray)) {
            return [];
        }

        return $userAsArray;
    }
//    public  function idUserLogin() {
//        $sql = "SELECT * FROM users WHERE login='$this->login';";
//    }
    public function countLogin(): string
    {
        $sql = "SELECT COUNT(*) AS count FROM users WHERE login='$this->login';";

        $result = $this->mysqli->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function add()
    {
        $sql = "INSERT INTO users (login, password) VALUES('$this->login','$this->password');";
        return $this->mysqli->query($sql);
    }
}