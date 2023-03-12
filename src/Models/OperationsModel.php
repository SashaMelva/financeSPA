<?php

namespace App\Models;
use App\DB\ConnectionDB;

class OperationsModel
{
    public function selectAllDataOperations() {
        $sql = "SELECT * 
        FROM operations
        INNER JOIN users
        ON table1.operations_user_id = users.user_id
        INNER JOIN types
        ON table1.operations_type_id = types.type_id
        ORDER BY operations_id DESC LIMIT 5;";
        return (new ConnectionDB())->query($sql);
    }

    public function addOperation(int $sum, int $typeId, int $userId, string $comment) {
        $sql = "INSERT INTO operations (sum, operations_type_id, operations_user_id, comment) 
        VALUES ('$sum', '$typeId', '$userId', '$comment');";
        return (new ConnectionDB())->query($sql);
    }

    public function deletOperation(int $operationsId) {
        $sql = "DELETE FROM operations 
        WHERE operations_id = '$operationsId';";
        return (new ConnectionDB())->query($sql);
    }

    public function changeOperation(int $operationsId, int $sum, int $typeId, int $userId, string $comment) {
        $sql = "UPDATE operations 
        SET sum = '$sum', 
        operations_type_id = '$typeId', 
        operations_user_id = '$userId', 
        comment = '$comment')  
        WHERE operations_id = '$operationsId';";
        return (new ConnectionDB())->query($sql);
    }

    /*public function selectUserForOperation() {
        $sql = "SELECT * FROM users WHERE ;";
        return (new ConnectionDB())->query($sql);
    }*/
}