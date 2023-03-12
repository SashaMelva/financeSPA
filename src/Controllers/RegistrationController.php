<?php
namespace App\Controllers;
use App\View;
use App\Response;
use App\Controllers\OperationsController;

class RegistrationController 
{
   /*public function __construct(
        private string $login,
        private string $password,
    ){}*/
    public array $message;
    public array $errorMessage;

    public function viewRegistration() 
    {
        $html = new View("../views/registration.php");
        (new Response('success', $html))->getResponse();
    }

    public function validationRegistration(string $login, string $password, string $repeatPassword)
    {
        if ($login == "" || $password == "" || $repeatPassword == "") {
            return $this->errorMessage[] = "Введите логин или пароль";
        } elseif ($password == $repeatPassword) {
            return $this->errorMessage[] = "Введённые вами пароли должны совпадать";
        } else {
            $this->registrationUser($login, $password);
        }
    }


    public function registrationUser(string $login, string $password) 
    {
        $countUserLogin = (new UsersModel($login, $password))->countLogin();
        
        if ($countUserLogin > 0) {
            $this->errorMessage[] = "Пользователь с таким логином ";
            
        } else {
            $this->message[] = "Вы успешно авторизовались";
            (new UsersModel($login, $password))->addUser();
            (new OperationsController())->viewOperations();
        }
        
    }
}