<?php
namespace App\Controllers;
use App\View;
use App\Response;
use App\Models\OperationsModel;

class OperationsController 
{
   /* public function __construct(
        private string $sum,
        private string $operations_type_id,
        private string $operations_user_id,
        private string $comment
    ){}*/

    public function viewOperations() 
    {
        $html = new View("../views/main_operations.php");
        (new Response('success', $html))->getResponse();
    }
    public function getAllOperations() {
        $operations = (new OperationsModel())->selectAllDataOperations();
        return $operations;
    }
    public function addOperation(int $sum, int $typeId, int $userId, string $comment) {
        (new OperationsModel())->addOperation($sum, $typeId, $userId, $comment);
    }
    public function deletOperation(int $id) {
        (new OperationsModel())->deletOperation($id);
    }
}