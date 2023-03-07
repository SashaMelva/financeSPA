<?php
namespace src\DB;

class Connection 
{
    /*public function __construct(
    ){}*/
    
    public function connectionDB() {
        $conn = new mysqli("financespa-mysql-1", "user", "user", "blog_db");

        if ($conn->connect_error) {
            die("Ошибка: " . $conn->connect_error);
        }
        echo "Подключение успешно установлено";
    }

    public function closeConnectionDB() {
        $conn->close();
    }
    
}

