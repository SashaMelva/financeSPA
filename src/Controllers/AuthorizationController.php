<?php
namespace App\Controllers;
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
    public array $errorMessage;
    public bool $userAuth = false;
    //Метод для загрузки страницы авторизации
    public function viewAuthorization()
    {
        $html = new View("../views/authorization.php");
        (new Response('success', $html))->getResponse();
    }

    public function validationAuthentication(string $login, string $password)
    {
        if ($login == "" || $password == "") {
            return $this->errorMessage[] = "Введите логин или пароль";
        }
        if ($login != "" && $password != "") {
            $this->authenticationUser($login, $password);
        }
    }


    public function authenticationUser(string $login, string $password) 
    {
        $userData = (new UsersModel($login, $password))->loginVerification();
        $countUserLogin = (new UsersModel($login, $password))->countLogin();
        
        if ($countUserLogin == 1) {
            if ($userData['password'] == $password) {
                $this->message[] = "Вы успешно авторизовались";
                $this->userAuth = true;
                
            } else {
                return $this->errorMessage[] = "Пользователь с таким логином не найден"; 
            }
        } else {
            return $this->errorMessage[] = "Пользователь с таким логином не найден";
        }
        
    }

    public function authorizationUser(string $login, string $password) 
    {
        if($this->validationAuthentication($login, $password) == true) {
            (new OperationsController())->viewOperations();
        }
    }
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