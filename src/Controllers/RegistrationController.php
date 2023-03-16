<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Services\ConnectionDB;
use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;

class RegistrationController
{
    public function viewRegistration(): void
    {
        $html = new View(ViewPath::Registration);
        (new Response('success', $html, null))->echo();
    }

    public function validationRegistration(string $login, string $password, string $repeatPassword): void
    {
        if ($login == "" || $password == "" || $repeatPassword == "" || $password != $repeatPassword) {
            $html = new View(ViewPath::Registration, ["Fill in the login, password and repeat password fields"]);
            (new Response('success', $html, null))->echo();
        }elseif ($this->isRegistrationUser($login, $password)) {
            (new AuthorizationController)->viewAuthorization();
        } else {
            $html = new View(ViewPath::Registration, ["Registration failed."]);
            (new Response('success', $html, null))->echo();
        }
    }

    public function isRegistrationUser(string $login, string $password): bool
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        $userModel = new UsersModel($login, $password, $mysqli);

        $countUserLogin = ($userModel)->countLogin();

        if ($countUserLogin == "0") {
            ($userModel)->add();
            return true;
        }
        return false;
    }
}