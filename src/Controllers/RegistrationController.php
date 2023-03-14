<?php

namespace App\Controllers;

use App\DB\ConnectionDB;
use App\View;
use App\Response;
use App\Models\UsersModel;

class RegistrationController
{
    /*public function __construct(
         private string $login,
         private string $password,
     ){}*/
//    public array $message;
//    public array $errorMessage;

    public function viewRegistration(): void
    {
        $html = new View("../views/registration.php");
        (new Response('success', $html, null))->getResponse();
    }

    public function validationRegistration(string $login, string $password, string $repeatPassword): void
    {
        if ($login == "" || $password == "" || $repeatPassword == "" || $password != $repeatPassword) {
            (new Response('fail', "Введите логин или пароль. Введённые вами пароли должны совпадать", null))->getResponse();
        }
        if ($this->registrationUser($login, $password)) {
            (new AuthorizationController)->viewAuthorization();
        }
    }

    public function registrationUser(string $login, string $password): bool
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