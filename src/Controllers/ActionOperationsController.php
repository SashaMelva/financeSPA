<?php

namespace App\Controllers;

use App\DB\ConnectionDB;
use App\View;
use App\Response;
use App\Models\OperationsModel;

class ActionOperationsController
{
    /*public function __construct(
        private string $login,
        private string $password,
    ){}*/

    public function viewAddOperations(): void
    {
        $html = new View("../views/add_operation.php");
        (new Response('success', $html, null))->echo();
    }

    public function add(int $userId, int $sum, int $typeId, string $comment): void
    {
        if ($this->isValidationAdd($userId, $sum, $typeId)) {
            $mysqli = (new ConnectionDB)->getMysqli();
            (new OperationsModel($mysqli))->store($sum, $typeId, $userId, $comment);
            (new OperationsController)->viewOperations();
        }
    }

    public function isValidationAdd(int $userId, int $sum, int $typeId): bool
    {
        if ($sum == "" || $typeId == "" || $userId == "") {
            return false;
        }
        return true;
    }


    public function delete(int $id): void
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        (new OperationsModel($mysqli))->delete($id);
        (new OperationsController)->viewOperations();
    }

    public function edit(int $id): void
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        (new OperationsModel($mysqli))->edit($id);
        (new OperationsController)->viewOperations();
    }
}