<?php
namespace App\Controllers;
use App\View;
use App\Response;
use App\Models\UsersModel;
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
        } 
        if ($password != $repeatPassword) {
            return $this->errorMessage[] = "Введённые вами пароли должны совпадать";
        } else if ($this->registrationUser($login, $password)) {
            (new AuthorizationController)->viewAuthorization();
        }
    }


    public function registrationUser(string $login, string $password): bool
    {
        $mysqli = (new ConnectionDB)->getMysqli();
        $countUserLogin = (new UsersModel($login, $password, $mysqli))->countLogin();

        if ($countUserLogin == 0) {
            $this->errorMessage[] = "Пользователь с таким логином ";
            return false;
        } else if ((new UsersModel($login, $password, $mysqli))->add()) {
                $this->message[] = "Вы успешно ";
                return true;
            } 
        return false;
    }
}