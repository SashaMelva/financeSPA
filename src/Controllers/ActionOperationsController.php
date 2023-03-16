<?php

namespace App\Controllers;

use App\Models\OperationsModel;
use App\Models\UsersModel;
use App\Services\ConnectionDB;
use App\Services\Log;
use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;

class ActionOperationsController
{
    /*public function __construct(
        private string $login,
        private string $password,
    ){}*/

    public function viewAddOperations(string $userLogin): void
    {
        $html = new View(ViewPath::OperationAdd);
        (new Response('success', $html, [$userLogin]))->echo();
    }

    public function viewEditOperations() :void
    {
        $html = new View(ViewPath::OperationEdit);
        (new Response('success', $html, null))->echo();
    }

    public function add(string $userLogin, int $sum, int $typeId, string $comment): void
    {
        try {
            $mysqli = (new ConnectionDB)->getMysqli();
            $userData = (new UsersModel($userLogin, null, $mysqli))->loginVerification();
            $userId = $userData["user_id"];

            if ($this->isValidationAdd($userId, $sum, $typeId)) {
                (new OperationsModel($mysqli))->store($sum, $typeId, $userId, $comment);
                (new OperationsController)->viewOperations($userId);
            } else {
                $html = new View(ViewPath::OperationAdd, ["Fill all required fields"]);
                (new Response('success', $html, null))->echo();
            }

        } catch (\Exception $e) {
            Log::error('При добавлении операции exception: ' . $e->getMessage());
            $html = new View(ViewPath::NotFound);
            (new Response('fail', $html, null))->echo();
        }
    }

    public function isValidationAdd(int $userId, int $sum, int $typeId): bool
    {
        if ($sum == "" || $typeId == "" || $userId == "") {
            return false;
        }
        return true;
    }


    public function delete(int $idOperation): void
    {
        $mysqli = (new ConnectionDB)->getMysqli();

        $idUser = (new OperationsModel($mysqli))->getUserIdForLogin($idOperation);
        (new OperationsModel($mysqli))->delete($idOperation);

        (new OperationsController)->viewOperations($idUser);
    }

    public function edit(int $id): void
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        (new OperationsModel($mysqli))->edit($id); #TODO
        (new OperationsController)->viewOperations();
    }
}