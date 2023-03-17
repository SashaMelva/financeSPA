<?php

namespace App\Models;

class UsersModel
{
    public function __construct(
        private readonly string  $login,
        private readonly ?string $password,
        public \mysqli           $mysqli
    )
    {
    }

    public function loginVerification(): array
    {
        $sql = "
            SELECT * 
            FROM users 
            WHERE login='$this->login';
            ";
        $result = $this->mysqli->query($sql);

        $userAsArray = mysqli_fetch_assoc($result);

        if (is_null($userAsArray)) {
            return [];
        }

        return $userAsArray;
    }

    public function countLogin(): string
    {
        $sql = "
            SELECT COUNT(*) AS count 
            FROM users 
            WHERE login='$this->login';
            ";

        $result = $this->mysqli->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function add(): void
    {
        $sql = "
            INSERT INTO users (login, password) 
            VALUES('$this->login','$this->password');
            ";
        $this->mysqli->query($sql);
    }
}