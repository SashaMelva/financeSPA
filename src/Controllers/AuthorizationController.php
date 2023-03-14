<?php

namespace App\Controllers;

use App\DB\ConnectionDB;
use App\View;
use App\Response;
use App\Models\UsersModel;
use App\Services\Log;

class AuthorizationController
{
    /* public function __construct(
         private string $login,
         private string $password,
     ){
         $this->login = trim($login);
         $this->password = trim($password);
     }*/

    public array $message;

    /** Метод для загрузки страницы авторизации */
    public function viewAuthorization(): void
    {
        $html = new View("../views/authorization.php");
        (new Response('success', $html, null))->getResponse();
    }

    public function validationAuthentication(string $login, string $password): void
    {
        if ($login == "" || $password == "") {
            (new Response('fail', "Введите логин или пароль", null))->getResponse();
        }

        if ($login != "" && $password != "" && $this->authenticationUser($login, $password)) {
            (new OperationsController)->viewOperations();
          //  (new Response('success', "Вы успешно авторизовались"))->getResponse();
        } else {
            (new Response('fail', "Пользователь с таким логином не найден", null))->getResponse();
        }
    }


    public function authenticationUser(string $login, string $password): bool
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        $userModel = new UsersModel($login, $password, $mysqli);

        $userData = ($userModel)->loginVerification();
        $countUserLogin = ($userModel)->countLogin();

        if ($countUserLogin == "1" && $userData['password'] == $password) {
            return true;
        }
        return false;
    }

//    public function authorizationUser(string $login, string $password)
//    {
//        if ($this->validationAuthentication($login, $password) == true) {
//            (new OperationsController())->viewOperations();
//        }
//    }
}










// class View
// {
//     public static function getHtml(string $path): string 
//     {
//         ob_start();
//         include($path);
//         $var = ob_get_contents();
//         ob_end_clean();

//         return $var;
//     }
// }