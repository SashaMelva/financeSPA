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
    public function viewOperations(string $userLogin): void
    {
        if ($userLogin == null) {
            $html = new View(ViewPath::Authorization);
            (new Response('success', $html))->echo();
        }

        $userId = $this->getUserLoginForId($userLogin);
        $operations = $this->getAllOperations($userId);
        $html = new View(ViewPath::OperationList, [$userLogin]);
        (new Response('success', $html, $operations))->echo();
    }

    /** @throws \Exception */
    public function getAllOperations(int $idUser): array
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        return (new OperationsModel($mysqli))->getAll($idUser);
    }
    public function getUserLoginForId(string $userLogin): int
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        return (new OperationsModel($mysqli))->getUserLoginForId($userLogin);
    }
}