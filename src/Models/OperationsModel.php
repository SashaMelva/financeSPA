<?php

namespace App\Models;

class OperationsModel
{
    public function __construct(
        public \mysqli $mysqli
    )
    {
    }

    /** @throws \Exception */
    public function getAll(): array
    {
        $sql = "
SELECT login, sum, name, comment, operations_id
FROM operations 
    INNER JOIN users ON operations.operations_user_id = users.user_id 
    INNER JOIN types ON operations.operations_type_id = types.type_id 
ORDER BY operations_id DESC LIMIT 5;
";
        $allData = $this->mysqli->query($sql);
        foreach ($allData as $result) {
            $resultAsArray[] = mysqli_fetch_assoc($result);
        }



        if (!is_array($resultAsArray)) {
            throw new \Exception('Error with MySQL getting operations');
        }

        return $resultAsArray;
    }

    public function store(int $sum, int $typeId, int $userId, string $comment)
    {
        $sql = "INSERT INTO operations (sum, operations_type_id, operations_user_id, comment) 
        VALUES ('$sum', '$typeId', '$userId', '$comment');";
        return $this->mysqli->query($sql);
    }

    public function delete(int $operationsId)
    {
        $sql = "DELETE FROM operations 
        WHERE operations_id = '$operationsId';";
        return $this->mysqli->query($sql);
    }

    public function edit(int $operationsId, int $sum, int $typeId, int $userId, string $comment)
    {
        $sql = "UPDATE operations 
        SET sum = '$sum', 
        operations_type_id = '$typeId', 
        operations_user_id = '$userId', 
        comment = '$comment')  
        WHERE operations_id = '$operationsId';";
        return $this->mysqli->query($sql);
    }

    /*public function selectUserForOperation() {
        $sql = "SELECT * FROM users WHERE ;";
        return (new ConnectionDB())->query($sql);
    }*/
}