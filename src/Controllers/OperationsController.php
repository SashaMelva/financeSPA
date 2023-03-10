<?php
namespace App\Controllers;
use App\DB\ConnectionDB;
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

    /** @throws \Exception */
    public function viewOperations(): void
    {
        
        $html = new View("../views/operation_list.php", $this->getAllOperations());
        (new Response('success', $html))->getResponse();
    }

    /** @throws \Exception */
    public function getAllOperations(): array
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        return (new OperationsModel($mysqli))->getAll();
    }
    public function addOperation(int $sum, int $typeId, int $userId, string $comment)
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        return (new OperationsModel($mysqli))->store($sum, $typeId, $userId, $comment);
    }
    public function deletOperation(int $id)
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        return (new OperationsModel($mysqli))->delete($id);
    }
}