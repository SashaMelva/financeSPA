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
        $operations = $this->getAllOperations();
        $html = new View("../views/operation_list.php", $operations);
        (new Response('success', $html, $operations))->echo();
    }

    /** @throws \Exception */
    public function getAllOperations(): array
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        return (new OperationsModel($mysqli))->getAll();
    }

}