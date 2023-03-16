<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Services\ConnectionDB;
use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;


class AuthorizationController
{
    /** Метод для загрузки страницы авторизации */
    public function viewAuthorization(): void
    {
        $html = new View(ViewPath::Authorization);
        (new Response('success', $html, null))->echo();
    }

    public function validationAuthentication(string $login, string $password): void
    {
        if ($login == "" || $password == "") {
            $html = new View(ViewPath::Authorization, ["Fill in the password and login fields"]);
            (new Response('success', $html, null))->echo(); #TODO
        } elseif ($this->isAuthenticationUser($login, $password)) {
            $userId = $this->getUserId($login, $password);
            (new OperationsController)->viewOperations($userId);
        } else {
            $html = new View(ViewPath::Authorization, ["Authorization failed. This user is not in the system"]);
            (new Response('success', $html, null))->echo();
        }
    }

    public function isAuthenticationUser(string $login, string $password): bool
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        $userModel = new UsersModel($login, $password, $mysqli);

        $userData = $userModel->loginVerification();
        $countUserLogin = $userModel->countLogin();

        if ($countUserLogin == "1" && $userData['password'] == $password) {
            return true;
        }

        return false;
    }
    public function getUserId(string $login, string $password): int
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        $userData = (new UsersModel($login, $password, $mysqli))->loginVerification();
        return  intval($userData["user_id"]);
    }

}
