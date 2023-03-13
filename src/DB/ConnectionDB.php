<?php

namespace App\DB;
use mysqli;

class ConnectionDB
{
    public $host = "financespa-mysql-1";
    public $username = "user";
    public $password = "user";
    public $dataBase = "finance";

    public function connection() {

        // $conn = new mysqli('financespa-mysql-1', 'user', 'user', 'finance');

        // if ($conn->connect_error) {
        //     die("Ошибка: " . $conn->connect_error);
        // }
        // return $conn;
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->dataBase);

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