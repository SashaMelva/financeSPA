<?php

namespace App\Services;

class ConnectionDB
{
    private \mysqli $mysqli;

    /** @throws \Exception */
    public function __construct(
        public string $host = "financespa-mysql-1",
        public string $username = "user",
        public string $password = "user",
        public string $dataBase = "finance",
    )
    {
        $mysqli = mysqli_connect($this->host, $this->username, $this->password, $this->dataBase);

        if ($mysqli->connect_error) {
            throw new \Exception("Ошибка: " . $mysqli->connect_error);
        }

        $this->mysqli = $mysqli;
    }

    public function getMysqli(): \mysqli
    {
        return $this->mysqli;
    }
}