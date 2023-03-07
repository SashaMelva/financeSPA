<?php
namespace App\Controllers;
use App\View;

class RegistrationController 
{
   /*public function __construct(
        private string $login,
        private string $password,
    ){}*/
    
    public function viewRegistration(): string {
        $view = new View("../views/registration.php");
        return $view->getHtml();
    }

    /*public function signIn() {
        if ($login == "") {

        }
    }*/
}