<?php

namespace App\Models;

class OperationsModel
{
    public function __construct(
        public \mysqli $mysqli
    )
    {
    }

    /** @throws Exception */
    public function getAll(int $idUser): array
    {
        $sql = "
            SELECT login, sum, name, comment, operations_id
            FROM operations 
                INNER JOIN users ON operations.operations_user_id = users.user_id 
                INNER JOIN types ON operations.operations_type_id = types.type_id 
            WHERE users.user_id='$idUser'
            ORDER BY operations_id DESC LIMIT 6;
            ";
        $arrayData = [];
        $allData = $this->mysqli->query($sql);
        for ($i = 1; $i < $allData->num_rows; $i++) {
            $arrayData[$i] = mysqli_fetch_assoc($allData);
        }

        if (!is_array($arrayData)) {
            throw new Exception('Error with MySQL getting operations');
        }

        return $arrayData;
    }

    public function getUserLoginForIdOperation(int $idOperation)
    {
        $sql = "
            SELECT operations_user_id
            FROM operations 
            WHERE operations_id='$idOperation';
        ";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function getUserLoginForId(string $userLogin)
    {
        $sql = "
            SELECT user_id
            FROM users 
            WHERE login='$userLogin';
        ";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function add(int $sum, int $typeId, int $userId, string $comment): void
    {
        $sql = "
            INSERT INTO operations (sum, operations_type_id, operations_user_id, comment) 
            VALUES ('$sum', '$typeId', '$userId', '$comment');
            ";
        $this->mysqli->query($sql);
    }

    public function delete(int $operationsId): void
    {
        $sql = "
            DELETE FROM operations 
                    WHERE operations_id = '$operationsId';
            ";
        $this->mysqli->query($sql);
    }

    public function edit(int $operationsId, int $sum, int $typeId, int $userId, string $comment): void
    {
        $sql = "
            UPDATE operations 
                    SET sum = '$sum', 
                    operations_type_id = '$typeId', 
                    operations_user_id = '$userId', 
                    comment = '$comment')  
                    WHERE operations_id = '$operationsId';
            ";
        $this->mysqli->query($sql);
    }
}