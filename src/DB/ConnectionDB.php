<?php

namespace App\DB;

class ConnectionDB
{
    private $host = "financespa-mysql-1";
    private $username = "user";
    private $password = "user";
    private $dataBase = "finance";

    protected function connection() {

        $conn = new mysqli($this->host, $this->username, $this->password, $this->dataBase);

        if ($conn->connect_error) {
            die("Ошибка: " . $conn->connect_error);
        }
        return $conn;
    }

    // public function __construct(
    //     public $conn = null
    // ){
    //     $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dataBase);
    //     if ($this->conn->connect_error) {
    //         echo "Ошибка: " . $this->conn->connect_error;
    //     }
    //     echo "Подключение успешно";
    // }

    // public function connection() {
    //     $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dataBase);

    //     if ($conn->connect_error) {
    //         die("Ошибка: " . $conn->connect_error);
    //     }
    //     return $conn;
    // }
    

    // public function closeConnectionDB() {
    //     $this->conn->close();
    //     return "Подключение к бд закрыто";
    // }
}