<?php

namespace App\Models;
use App\DB\ConnectionDB;
//use App\DB\connection;
class UsersModel
{
    public function __construct(
        private string $login,
        private string $password,
        public $conn
    ){
        $this->login = trim($login);
        $this->password = trim($password);
        $this->conn = (new ConnectionDB())->connection();
    }
    public function selectAllUsers()
    {
        $sql = "SELECT * FROM users;";
        return $this->conn->query($sql);
    }

    public function loginVerification()
    {
        //$conn = mysqli_connect('financespa-mysql-1', 'user', 'user', 'finance');
        //$conn = (new ConnectionDB())->connection();
        $sql = "SELECT * FROM users WHERE login='$this->login';";
        $result = $this->conn->query($sql);
        // $row = $result->fetch_assoc();
        // return $row;
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

    public function countLogin()
    {
        //$conn = mysqli_connect('financespa-mysql-1', 'user', 'user', 'finance');
        //$conn = (new ConnectionDB())->connection();
        $sql = "SELECT COUNT(*) AS count FROM users WHERE login='$this->login';";
        
        $result = $this->conn->query($sql);
        $row = $result->fetch_row();

        // $sql = "SELECT * AS count FROM users WHERE 'login'='user1';";
        // $result = $this->conn->query($sql);
        return $row[0];


        // $sql = "SELECT COUNT(*) AS count FROM users WHERE 'login'='user1'";
        // $result = (new ConnectionDB())->connection()->query($sql);
        // $row = $result->fetch_assoc();
        // return $row['count'];
        //$result = mysql_query($sql, (new ConnectionDB()));
    }
    public function addUser()
    {
        $sql = "INSERT INTO users ('login', 'password') VALUES('$this->login','$this->password');";
        return (new ConnectionDB())->connection()->query($sql);
    }


}