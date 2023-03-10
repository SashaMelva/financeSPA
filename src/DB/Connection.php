<?php

namespace App\DB;

class Connection
{
    public var $conn;
    public function openConnectionDB() {
        $this->conn = new mysqli("financespa-mysql-1", "user", "user", "blog_db");

        if ($this->conn->connect_error) {
            die("Ошибка: " . $this->conn->connect_error);
        }
        return "Подключение успешно установлено";
    }
    public function connection()
    {
        return $this->conn;
    }


    public function closeConnectionDB() {
        $this->conn->close();
        return "Подключение к бд закрыто";
    }
}