<?php

namespace App\Controllers;

use App\Models\OperationsModel;
use App\Services\ConnectionDB;
use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;

class OperationsController
{

    /** @throws \Exception */
    public function viewOperations(int $userId): void
    {
        if ($userId == null) {
            $html = new View(ViewPath::OperationList);
            (new Response('success', $html))->echo();
        }
        $operations = $this->getAllOperations($userId);
        $html = new View(ViewPath::OperationList, $operations);
        (new Response('success', $html, $operations))->echo();
    }

    /** @throws \Exception */
    public function getAllOperations($idUser): array
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        return (new OperationsModel($mysqli))->getAll($idUser);
    }

}